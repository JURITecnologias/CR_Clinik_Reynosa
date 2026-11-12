(function () {
    let consumiblesStepInitialized = false;

    function delay(milliseconds) {
        return new Promise(resolve => setTimeout(resolve, milliseconds));
    }

    function getNumericDomValue(id) {
        const elements = document.querySelectorAll(`#${id}`);
        for (const element of elements) {
            let rawValue = '';

            if ('value' in element && typeof element.value === 'string' && element.value.trim() !== '') {
                rawValue = element.value.trim();
            } else if (typeof element.textContent === 'string' && element.textContent.trim() !== '') {
                rawValue = element.textContent.replace(/[^0-9]/g, '').trim();
            }

            if (!rawValue) {
                continue;
            }

            const parsed = parseInt(rawValue, 10);
            if (!Number.isNaN(parsed) && parsed > 0) {
                return parsed;
            }
        }

        return NaN;
    }

    function getUserSession() {
        return sessionStorage.getItem('user') ? JSON.parse(sessionStorage.getItem('user')) : null;
    }

    function getUserId() {
        const user = getUserSession();
        return user && user.user ? user.user.id : null;
    }

    function getConsultaId() {
        return getNumericDomValue('consulta_id');
    }

    function getPacienteId() {
        return getNumericDomValue('paciente_id');
    }

    function getDoctorId() {
        const input = document.getElementById('doctor_id');
        if (!input || !input.value) {
            return null;
        }
        const doctorId = parseInt(input.value, 10);
        return Number.isNaN(doctorId) ? null : doctorId;
    }

    function getServiciosGuardados() {
        const servicios = sessionStorage.getItem('servicios_medicos');
        return servicios ? JSON.parse(servicios) : [];
    }

    async function waitForConsultaContext() {
        for (let attempt = 0; attempt < 10; attempt++) {
            const consultaId = getConsultaId();
            const pacienteId = getPacienteId();
            const userId = getUserId();

            if (consultaId && pacienteId && userId) {
                return {
                    consultaId: consultaId,
                    pacienteId: pacienteId,
                    userId: userId
                };
            }

            await delay(200);
        }

        return null;
    }

    function serializarServiciosSolicitados() {
        return getServiciosGuardados().map(servicio => ({
            id: servicio.id,
            nombre: servicio.nombre,
            categoria: servicio.categoria || null,
            solicitud: servicio.solicitud || null
        }));
    }

    async function fetchOrdenesClinicasByConsultaId(consultaId) {
        const url = new URL(apiHost + apiPath + '/ordenes-clinicas');
        url.searchParams.set('consulta_id', consultaId);
        url.searchParams.set('per_page', '20');
        url.searchParams.set('order', 'created_at');
        url.searchParams.set('direction', 'desc');

        const response = await fetch(url.toString(), {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('No se pudieron consultar las órdenes clínicas.');
        }

        return await response.json();
    }

    async function insertOrdenClinicaEmergencia(ordenData) {
        const response = await fetch(apiHost + apiPath + '/ordenes-clinicas', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(ordenData)
        });

        const text = await response.text();
        const data = text ? JSON.parse(text) : null;

        if (!response.ok) {
            throw new Error(data && data.errors ? JSON.stringify(data.errors) : 'No se pudo crear la orden clínica.');
        }

        return data;
    }

    async function fetchConsumiblesByOrdenClinicaId(ordenClinicaId) {
        const response = await fetch(apiHost + apiPath + `/ordenes-clinicas-consumos/orden-clinica/${ordenClinicaId}`, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('No se pudieron cargar los consumibles solicitados.');
        }

        return await response.json();
    }

    async function insertConsumibleEnOrdenClinicaEmergencia(consumibleData) {
        const response = await fetch(apiHost + apiPath + '/ordenes-clinicas-consumos', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(consumibleData)
        });

        const text = await response.text();
        const data = text ? JSON.parse(text) : null;

        if (!response.ok) {
            throw new Error(data && data.errors ? JSON.stringify(data.errors) : 'No se pudo agregar el consumible a la orden clínica.');
        }

        return data;
    }

    async function updateCantidadConsumibleEnOrdenClinicaEmergencia(consumoId, cantidad) {
        const response = await fetch(apiHost + apiPath + `/ordenes-clinicas-consumos/${consumoId}/cantidad`, {
            method: 'PATCH',
            headers: headersRequest,
            body: JSON.stringify({ cantidad: cantidad })
        });

        const text = await response.text();
        const data = text ? JSON.parse(text) : null;

        if (!response.ok) {
            throw new Error(data && data.errors ? JSON.stringify(data.errors) : 'No se pudo actualizar la cantidad del consumible.');
        }

        return data;
    }

    async function deleteConsumibleEnOrdenClinicaEmergencia(consumoId) {
        const response = await fetch(apiHost + apiPath + `/ordenes-clinicas-consumos/${consumoId}`, {
            method: 'DELETE',
            headers: headersRequest
        });

        const text = await response.text();
        const data = text ? JSON.parse(text) : null;

        if (!response.ok) {
            throw new Error(data && data.errors ? JSON.stringify(data.errors) : 'No se pudo eliminar el consumible de la orden clínica.');
        }

        return data;
    }

    async function ensureOrdenClinicaActiva(createIfMissing) {
        const context = await waitForConsultaContext();
        if (!context) {
            return null;
        }

        const consultaId = context.consultaId;
        const pacienteId = context.pacienteId;
        const userId = context.userId;

        const ordenes = await fetchOrdenesClinicasByConsultaId(consultaId);
        const ordenActiva = (ordenes.data || []).find(orden => orden.estado !== 'cancelada' && orden.estado !== 'completada');

        if (ordenActiva) {
            const ordenInput = document.getElementById('orden_clinica_id_emergencia');
            if (ordenInput) {
                ordenInput.value = ordenActiva.id;
            }
            return ordenActiva;
        }

        if (!createIfMissing) {
            return null;
        }

        const nuevaOrden = await insertOrdenClinicaEmergencia({
            consulta_id: consultaId,
            paciente_id: pacienteId,
            doctor_id: getDoctorId(),
            estado: 'pendiente',
            servicios_solicitados: serializarServiciosSolicitados(),
            fecha_orden: new Date().toISOString().split('T')[0],
            observaciones: 'Orden clínica generada automáticamente desde la consulta de emergencia #' + consultaId,
            user_id: userId
        });

        const ordenInput = document.getElementById('orden_clinica_id_emergencia');
        if (ordenInput) {
            ordenInput.value = nuevaOrden.id;
        }

        return nuevaOrden;
    }

    function renderServiciosSolicitadosEmergencia() {
        const list = document.getElementById('servicios_solicitados_list_emergencia');
        if (!list) {
            return;
        }

        const servicios = getServiciosGuardados();
        list.innerHTML = '';

        if (servicios.length === 0) {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'mb-2');
            li.textContent = 'No hay servicios solicitados.';
            list.appendChild(li);
            return;
        }

        servicios.forEach(servicio => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'mb-2');
            const categoria = servicio.categoria ? ` (${servicio.categoria})` : '';
            const solicitud = servicio.solicitud ? ` - ${servicio.solicitud}` : '';
            li.textContent = `${servicio.nombre}${categoria}${solicitud}`;
            list.appendChild(li);
        });
    }

    function buildSelectedConsumibleDisplay(consumible) {
        return consumible.type === 'kit'
            ? `${consumible.nombre} (Kit)`
            : `${consumible.nombre} (Consumible)`;
    }

    function renderConsumibleRowEmergencia(selectedConsumible, apiData) {
        const tableBody = document.getElementById('consumibles_solicitados_table_body_emergencia');
        if (!tableBody) {
            return;
        }

        const rowId = apiData.id;
        const existingRow = document.getElementById(`consumible_row_emergencia_${rowId}`);
        if (existingRow) {
            existingRow.remove();
        }

        const row = document.createElement('tr');
        row.id = `consumible_row_emergencia_${rowId}`;

        const nameCell = row.insertCell();
        nameCell.textContent = buildSelectedConsumibleDisplay(selectedConsumible);

        const quantityCell = row.insertCell();
        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.className = 'form-control';
        quantityInput.value = apiData.cantidad;
        quantityInput.min = '1';
        quantityInput.addEventListener('change', event => UpdateConsumibleCantidadEmergencia(event, rowId));
        quantityCell.appendChild(quantityInput);

        const actionsCell = row.insertCell();
        const dataInput = document.createElement('input');
        dataInput.type = 'hidden';
        dataInput.id = `consumible_data_emergencia_${rowId}`;
        dataInput.value = obfuscate(JSON.stringify(apiData));
        actionsCell.appendChild(dataInput);

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-danger btn-sm';
        removeButton.textContent = 'Eliminar';
        removeButton.addEventListener('click', () => RemoverConsumibleSolicitadoEmergencia(rowId));
        actionsCell.appendChild(removeButton);
        tableBody.appendChild(row);
    }

    function mapConsumoExistente(consumo) {
        if (consumo.consumible) {
            return {
                selectedConsumible: {
                    id: consumo.consumible.id,
                    nombre: consumo.consumible.nombre,
                    type: 'consumible'
                },
                apiData: {
                    id: consumo.id,
                    orden_clinica_id: consumo.orden_clinica_id,
                    cantidad: consumo.cantidad,
                    user_id: getUserId(),
                    consumible_id: consumo.consumible_id
                }
            };
        }

        if (consumo.kit) {
            const kitNombre = consumo.kit.kit && consumo.kit.kit.nombre ? consumo.kit.kit.nombre : (consumo.kit.nombre || `Kit ${consumo.kit_id}`);
            const kitId = consumo.kit.kit && consumo.kit.kit.id ? consumo.kit.kit.id : consumo.kit_id;
            return {
                selectedConsumible: {
                    id: kitId,
                    nombre: kitNombre,
                    type: 'kit'
                },
                apiData: {
                    id: consumo.id,
                    orden_clinica_id: consumo.orden_clinica_id,
                    cantidad: consumo.cantidad,
                    user_id: getUserId(),
                    kit_id: consumo.kit_id
                }
            };
        }

        return null;
    }

    async function loadConsumiblesSolicitadosEmergencia() {
        const tableBody = document.getElementById('consumibles_solicitados_table_body_emergencia');
        if (!tableBody) {
            return;
        }

        tableBody.innerHTML = '';
        try {
            const ordenActiva = await ensureOrdenClinicaActiva(false);
            if (!ordenActiva) {
                return;
            }

            const consumos = await fetchConsumiblesByOrdenClinicaId(ordenActiva.id);
            consumos.forEach(consumo => {
                const mapped = mapConsumoExistente(consumo);
                if (mapped) {
                    renderConsumibleRowEmergencia(mapped.selectedConsumible, mapped.apiData);
                }
            });
        } catch (error) {
            console.error('Error al cargar consumibles de emergencia:', error);
            renderAlertMessage('No se pudieron cargar los consumibles de la orden clínica.', 'danger');
        }
    }

    async function bindConsumibleAutocomplete() {
        const input = document.getElementById('consumible_buscar_emergencia');
        if (!input || typeof Awesomplete !== 'function') {
            return;
        }

        const awesomplete = new Awesomplete(input, {
            filter: function () {
                return true;
            },
            sort: false,
            list: []
        });

        input.addEventListener('blur', function () {
            if (input.value.trim() === '') {
                document.getElementById('consumible_seleccionado_emergencia').value = '';
            }
        });

        input.addEventListener('input', async function () {
            const term = input.value.trim();
            if (term.length < 2) {
                return;
            }

            const result = await getConsumibles(100, 1, term, true);
            const consumibles = (result.data || []).map(consumible => ({
                id: consumible.id,
                nombre: consumible.nombre,
                type: 'consumible',
                display: `${consumible.nombre} (Consumible)`
            }));

            const resultKits = await getKitconsumibles(100, 1, term, true);
            const kits = (resultKits.data || [])
                .filter(kit => kit.es_activo)
                .map(kit => ({
                    id: kit.id,
                    nombre: kit.nombre,
                    type: 'kit',
                    display: `${kit.nombre} (Kit)`
                }));

            input._consumibles = [...consumibles, ...kits];
            awesomplete.list = input._consumibles.map(item => item.display);
            document.getElementById('consumible_seleccionado_emergencia').value = '';
        });

        input.addEventListener('awesomplete-selectcomplete', function (event) {
            const selectedName = event.text.value;
            const consumibles = input._consumibles || [];
            const selected = consumibles.find(item => item.display === selectedName);

            document.getElementById('consumible_seleccionado_emergencia').value = selected
                ? obfuscate(JSON.stringify(selected))
                : '';
        });
    }

    function wrapServiceActions() {
        if (typeof window.appendServicioMedicoToList === 'function' && !window._appendServicioMedicoToListEmergenciaWrapped) {
            const originalAppend = window.appendServicioMedicoToList;
            window.appendServicioMedicoToList = async function () {
                const result = await originalAppend.apply(this, arguments);
                renderServiciosSolicitadosEmergencia();
                return result;
            };
            window._appendServicioMedicoToListEmergenciaWrapped = true;
        }

        if (typeof window.eliminarServicio === 'function' && !window._eliminarServicioEmergenciaWrapped) {
            const originalDelete = window.eliminarServicio;
            window.eliminarServicio = async function () {
                const result = await originalDelete.apply(this, arguments);
                renderServiciosSolicitadosEmergencia();
                return result;
            };
            window._eliminarServicioEmergenciaWrapped = true;
        }

        if (typeof window.LoadConsulta === 'function' && !window._loadConsultaEmergenciaWrapped) {
            const originalLoadConsulta = window.LoadConsulta;
            window.LoadConsulta = async function () {
                const result = await originalLoadConsulta.apply(this, arguments);
                renderServiciosSolicitadosEmergencia();
                await loadConsumiblesSolicitadosEmergencia();
                return result;
            };
            window._loadConsultaEmergenciaWrapped = true;
        }
    }

    window.AddConsumibleSolicitadoEmergencia = async function () {
        const inputConsumible = document.getElementById('consumible_seleccionado_emergencia');
        if (!inputConsumible || inputConsumible.value.trim() === '') {
            return;
        }

        const selectedConsumible = JSON.parse(deobfuscate(inputConsumible.value));
        const cantidad = parseInt(document.getElementById('consumible_cantidad_emergencia').value, 10);
        if (!Number.isInteger(cantidad) || cantidad < 1) {
            renderAlertMessage('La cantidad debe ser un entero mayor que cero.', 'danger');
            return;
        }

        try {
            const ordenActiva = await ensureOrdenClinicaActiva(true);
            const userId = getUserId();
            if (!ordenActiva || !userId) {
                throw new Error('No fue posible preparar la orden clínica.');
            }

            const payload = {
                orden_clinica_id: ordenActiva.id,
                cantidad: cantidad,
                user_id: userId
            };
            if (selectedConsumible.type === 'kit') {
                payload.kit_id = selectedConsumible.id;
            } else {
                payload.consumible_id = selectedConsumible.id;
            }

            const response = await insertConsumibleEnOrdenClinicaEmergencia(payload);
            const apiData = {
                id: response.id,
                orden_clinica_id: ordenActiva.id,
                cantidad: cantidad,
                user_id: userId
            };

            if (selectedConsumible.type === 'kit') {
                apiData.kit_id = selectedConsumible.id;
            } else {
                apiData.consumible_id = selectedConsumible.id;
            }

            renderConsumibleRowEmergencia(selectedConsumible, apiData);
            document.getElementById('consumible_buscar_emergencia').value = '';
            document.getElementById('consumible_cantidad_emergencia').value = '1';
            document.getElementById('consumible_seleccionado_emergencia').value = '';
        } catch (error) {
            console.error('Error al agregar consumible en emergencia:', error);
            renderAlertMessage('Hubo un error al agregar el consumible. ' + error.message, 'danger');
        }
    };

    window.UpdateConsumibleCantidadEmergencia = async function (event, consumoId) {
        const input = document.getElementById(`consumible_data_emergencia_${consumoId}`);
        if (!input) {
            return;
        }

        const apiData = JSON.parse(deobfuscate(input.value));
        const cantidad = parseInt(event.target.value, 10);
        if (!Number.isInteger(cantidad) || cantidad < 1) {
            event.target.value = apiData.cantidad;
            renderAlertMessage('La cantidad debe ser un entero mayor que cero.', 'danger');
            return;
        }

        try {
            await updateCantidadConsumibleEnOrdenClinicaEmergencia(apiData.id, cantidad);
            apiData.cantidad = cantidad;
            input.value = obfuscate(JSON.stringify(apiData));
        } catch (error) {
            event.target.value = apiData.cantidad;
            console.error('Error al actualizar cantidad de consumible en emergencia:', error);
            renderAlertMessage('Hubo un error al actualizar la cantidad del consumible. ' + error.message, 'danger');
        }
    };

    window.RemoverConsumibleSolicitadoEmergencia = async function (consumoId) {
        const input = document.getElementById(`consumible_data_emergencia_${consumoId}`);
        if (!input) {
            return;
        }

        const apiData = JSON.parse(deobfuscate(input.value));

        try {
            await deleteConsumibleEnOrdenClinicaEmergencia(apiData.id);
            const row = document.getElementById(`consumible_row_emergencia_${consumoId}`);
            if (row) {
                row.remove();
            }
        } catch (error) {
            console.error('Error al eliminar consumible en emergencia:', error);
            renderAlertMessage('Hubo un error al eliminar el consumible. ' + error.message, 'danger');
        }
    };

    window.initConsultaEmergenciaConsumiblesStep = function () {
        if (consumiblesStepInitialized) {
            renderServiciosSolicitadosEmergencia();
            return;
        }

        consumiblesStepInitialized = true;
        wrapServiceActions();
        bindConsumibleAutocomplete();
        renderServiciosSolicitadosEmergencia();

        const step4Tab = document.getElementById('step4-tab');
        if (step4Tab) {
            step4Tab.addEventListener('shown.bs.tab', function () {
                renderServiciosSolicitadosEmergencia();
                loadConsumiblesSolicitadosEmergencia();
            });
        }
    };
})();
