async function getOrdenesClinicas(perPage = 50, actualPage = 1, searchTerm = '', order='', orderDirection='asc') {
    try {
        const url = new URL(apiHost + apiPath + "/ordenes-clinicas");
        url.searchParams.append('per_page', perPage);
        url.searchParams.append('page', actualPage);
        if (order){
            url.searchParams.append('order', order);
            url.searchParams.append('direction', orderDirection);
        }
       
        if (searchTerm) {
            url.searchParams.append('search', searchTerm);
        }
        const response= await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener las órdenes clínicas:', error);
        throw error;
    }
}

async function insertOrdenClinica(ordenData) {
    try {
        const url = new URL(apiHost + apiPath + "/ordenes-clinicas");
        const response = await fetch(url, {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(ordenData)
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }   
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al insertar la orden clínica:', error);
        throw error;
    }
}

async function getOrdenClinica(ordenId) {
    try {
        const url = new URL(apiHost + apiPath + `/ordenes-clinicas/${ordenId}`);
        const response = await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener la orden clínica:', error);
        throw error;
    }
}

async function insertConsumibleEnOrdenClinica(consumibleData) {
    try {
        const url = new URL(apiHost + apiPath + `/ordenes-clinicas-consumos`);
        const response = await fetch(url, {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(consumibleData)
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al insertar el consumible en la orden clínica:', error);
        throw error;
    }
}

async function deleteConsumibleEnOrdenClinica(consumibleOrdenId) {
    try {
        const url = new URL(apiHost + apiPath + `/ordenes-clinicas-consumos/${consumibleOrdenId}`);
        const response = await fetch(url, {
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al eliminar el consumible de la orden clínica:', error);
        throw error;
    }
}

async function updateConsumibleCantidadEnOrdenClinica(consumibleOrdenId, nuevaCantidad) {
    try {
        const url = new URL(apiHost + apiPath + `/ordenes-clinicas-consumos/${consumibleOrdenId}/cantidad`);
        const response = await fetch(url, {
            method: 'PATCH',
            headers: headersRequest,
            body: JSON.stringify({ cantidad: nuevaCantidad })
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al actualizar la cantidad del consumible en la orden clínica:', error);
        throw error;
    }
}

async function updateEstadoOrdenClinica(ordenId,idusuario, nuevoEstado) {
    try {
        const url = new URL(apiHost + apiPath + `/ordenes-clinicas/${ordenId}/estado`);
        const response = await fetch(url, {
            method: 'PATCH',
            headers: headersRequest,
            body: JSON.stringify({ estado: nuevoEstado, atencion_usuario_id: idusuario })
        }); 
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al actualizar el estado de la orden clínica:', error);
        throw error;
    }
}

function getUserId() {
    const user = JSON.parse(sessionStorage.getItem('user'));
    return user ? user.user.id : null;
}

async function createOrdenClinicaPorConsulta(consultaData) {
    try {
        const fechaDeOrden = new Date().toISOString().split('T')[0];
        const consultaOrdenData = {
            consulta_id: consultaData.id,
            paciente_id: consultaData.paciente_id,
            doctor_id: consultaData.doctor_id,
            estado: 'pendiente',
            servicios_solicitados: consultaData.serviciosSolicitados,
            fecha_orden: fechaDeOrden,
            observaciones: 'Orden clínica generada automáticamente por la consulta #' + consultaData.id,
            user_id: getUserId()
        };
        const nuevaOrden = await insertOrdenClinica(consultaOrdenData);
        console.log('Orden clínica creada:', nuevaOrden);
        return nuevaOrden;
    } catch (error) {
        console.error('Error al crear la orden clínica por consulta:', error);
        throw error;
    }   
}

function renderOrdenesClinicasTable(ordenesData) {
    const tableBody = document.getElementById('ordenes_clinicas_table_body');
    tableBody.innerHTML = '';
    
    const user = JSON.parse(sessionStorage.getItem('user'));
    const userId = user ? user.user.id : null;
    const IsDoctor = user && user.roles.includes('Doctor');
    const isAdmin = user && (user.roles.includes('Main Admin') || user.roles.includes('Admon'));


    ordenesData.forEach(orden => {
        const row = document.createElement('tr');
        const fechaOrden = new Date(orden.fecha_orden).toLocaleDateString('es-MX');
        const badgeClass = orden.estado === 'pendiente' ? 'badge-soft-primary' :
                           orden.estado === 'en_proceso' ? 'badge-soft-warning' :
                           orden.estado === 'cancelada' ? 'badge-soft-danger' :
                           orden.estado === 'completada' ? 'badge-soft-success' : 'badge-soft-secondary';

        const isOpen=orden.estado === 'pendiente';
        const isOnProgress=orden.estado === 'en_proceso' && (orden.atencion_usuario_id === null || orden.atencion_usuario_id === userId);
        const isNotCancelledOrCompleted= orden.estado !== 'cancelada' && orden.estado !== 'completada';
        const isCompleted = orden.estado === 'completada';

        console.log(orden.atencion_usuario_id,userId,isOnProgress);
        row.innerHTML =
            '<td>' + orden.folio_orden + '</td>' +
            '<td>' + renderServiciosSolicitados(orden.servicios_solicitados) + '</td>' +
            '<td>' + fechaOrden + '</td>' +
            '<td>Dr. ' + orden.doctor.nombre_completo + '</td>' +
            '<td>' + orden.paciente.nombre + ' ' + orden.paciente.apellido + '</td>' +
            '<td><span class="badge ' + badgeClass + '">' + (orden.estado.charAt(0).toUpperCase() + orden.estado.slice(1)) + '</span></td>' +
            '<td>' +
                (isCompleted ? '<button onclick="verDetalleOrdenClinica(' + orden.id + ')" class="btn btn-lg btn-info me-1"><i class="ti ti-eye"></i></button>' : '') +
                (isOpen ? '<button onclick="atenderOrden(' + orden.id + ')" class="btn btn-lg btn-primary">Atender Orden</button>' : '') +
                (isOnProgress ? '<a href="orden-clinica.php?p=' + btoa(orden.id) + '" class="btn btn-lg btn-success">Continuar Atención</a>' : '') +
                (isNotCancelledOrCompleted ? '<button onclick="ConfirmCancelarOrden(' + orden.id + ');" class="btn btn-lg btn-danger border me-1"><i class="ti ti-ban" title="Cancelar esta orden"></i></button>' : '') +
                ((isAdmin || IsDoctor) ? '<a href="javascript:void(OpenEditFormConsumible(' + orden.id + '));" class="btn btn-lg btn-danger border me-1"><i class="ti ti-trash" title="Eliminar esta orden"></i></a>' : '') +
            '</td>';
        tableBody.appendChild(row);
    });
}

function renderServiciosSolicitados(servicios) {
    if (!servicios || !Array.isArray(servicios)) return '';
    let html = '<ul class="mb-0">';
    console.log('Servicios solicitados:', servicios);
    servicios.forEach(function(grupo) {
        console.log('Procesando grupo de servicios:', grupo);
        // console.log('Grupo de servicios:', grupo);
        if (Array.isArray(grupo)) {
             grupo.forEach(function(servicio) {
                html += `<li><strong>${servicio.nombre}</strong> <span class='text-muted'>(${servicio.categoria})</span></li>`;
            });
         }else{
            html += `<li><strong>${grupo.nombre}</strong> <span class='text-muted'>(${grupo.categoria})</span></li>`;
         }
    });
    html += '</ul>';
    return html;
}

function renderOdenClinicaContent(ordenData,readonly=false) {
    document.getElementById('paciente_nombre').textContent = ordenData.paciente.nombre + ' ' + ordenData.paciente.apellido;
    document.getElementById('orden_clinica_id').textContent = ordenData.id;
    document.getElementById('orden_clinica_id').value = ordenData.id;
    document.getElementById('estado_orden_clinica').textContent = ordenData.estado.charAt(0).toUpperCase() + ordenData.estado.slice(1);
    document.getElementById('orden_clinica_estatus').value = ordenData.estado;
    document.getElementById('paciente_edad').textContent = calcularEdad(ordenData.paciente.fecha_nacimiento) + ' años';
    document.getElementById('paciente_fecha_nacimiento').textContent = new Date(ordenData.paciente.fecha_nacimiento).toLocaleDateString('es-MX');
    document.getElementById('orden_clinica_fecha').textContent = new Date(ordenData.fecha_orden).toLocaleDateString('es-MX');
    document.getElementById('doctor_solicitante').textContent = 'Dr. ' + ordenData.doctor.nombre_completo;
    document.getElementById('paciente_genero').textContent = ordenData.paciente.sexo.toUpperCase();

    const user = JSON.parse(sessionStorage.getItem('user'));
    const userId = user ? user.user.id : null;

    // Cargar los servicios solicitados en la lista ul
    const serviciosList = document.getElementById('servicios_solicitados_list');
    serviciosList.innerHTML = '';
    ordenData.servicios_solicitados.forEach(function(grupo) {
        if (Array.isArray(grupo)) {
            grupo.forEach(function(servicio) {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'mb-2');
                li.textContent = `${servicio.nombre} (${servicio.categoria})`;
                serviciosList.appendChild(li);
            });
        } else {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'mb-2');
            li.textContent = `${grupo.nombre} (${grupo.categoria})`;
            serviciosList.appendChild(li);
        }
    });
    
    if (ordenData.consumos && Array.isArray(ordenData.consumos)) {
        ordenData.consumos.forEach(consumible => {
           
            consumibleApiObject = {
                orden_clinica_id: ordenId,
                cantidad: consumible.cantidad,
                user_id: userId,
                id: consumible.id,
                atencion_usuario_id: userId
            };

            if (!consumible.kit_id) {
                consumibleApiObject.kit_id = consumible.kit_id;
            } else {
                consumibleApiObject.consumible_id = consumible.id;
            }
            let dataToLog= consumible.kit_id ? consumible.kit : consumible.consumible;
            renderConsumibleEnOrdenClinica(dataToLog, consumibleApiObject,readonly);
        });
    }

    if (readonly){
        document.getElementById('consumible_add_control').classList.add('d-none');
        document.querySelectorAll('button').forEach(button => {
            button.classList.add('d-none');
        });
    }
}

function renderConsumibleEnOrdenClinica(consumibleData,objetForApi = null,readonly=false) {
    
    const tableBody = document.getElementById('consumibles_solicitados_table_body');
    const row = document.createElement('tr');
    row.id = `consumible_row_${consumibleData.id}`;
    row.innerHTML = `
        <td>${consumibleData.nombre ? consumibleData.nombre : consumibleData.kit.nombre}</td>
        <td>
            ${readonly ? `<span>${objetForApi.cantidad}</span>` : `<input type="number" onchange="UpdateConsumibleCantidad(event, ${consumibleData.id})" class="form-control" value="${objetForApi.cantidad}" min="1" >`}
        </td>
        ${readonly ? '' : `<td>

            <input type="hidden" id="consumible_data_${consumibleData.id}" class="text-center consumible_data" value='${objetForApi ? obfuscate(JSON.stringify(objetForApi)) : ''}'>
            ${readonly ? '' : `<button class="btn btn-danger btn-sm" onclick="RemoverConsumibleSolicitado(${consumibleData.id})">Eliminar</button>`}
        </td>`}
    `;
    tableBody.appendChild(row);
}

async function LoadDataTableOrdenesClinicas(per_page = 50, actualPage = 1, searchTerm = '', order='', orderDirection='asc') {
    showLoading();
    try{
        const response = await getOrdenesClinicas(per_page, actualPage, searchTerm, order, orderDirection);
        renderOrdenesClinicasTable(response.data);
        await LoadPagesControl('ordenes-clinicas', response.last_page, per_page, actualPage);
        document.getElementById('ordenes-clinicas-container').classList.remove('d-none');
    }catch(error){
        console.error('Error al cargar las órdenes clínicas:', error);
         renderAlertMessage('Hubo un error al cargar las órdenes clínicas. Error: ' + error.message, 'danger');
    }finally{
        hideLoading();
    }
}

async function LoadOrdenATender(p,readonly=false) {
    ordenId = atob(p);
    showLoading();
    try{
        const ordenData = await getOrdenClinica(ordenId);
        renderOdenClinicaContent(ordenData,readonly);
        document.getElementById('orden-clinica-container').classList.remove('d-none');
    }catch(error){
        console.error('Error al cargar la orden clínica:', error);
         renderAlertMessage('Hubo un error al cargar la orden clínica. Error: ' + error.message, 'danger');
    }finally{
        hideLoading();
    }
}

async function atenderOrden(ordenId) {

    const user = JSON.parse(sessionStorage.getItem('user'));
    const userId = user ? user.user.id : null;

    const ordenStatusChange={
        estado: 'en_proceso',
        atencion_usuario_id: userId
    }

    try{
        await updateEstadoOrdenClinica(ordenId,userId, ordenStatusChange.estado);
        window.location.href = `orden-clinica.php?p=${btoa(ordenId)}`;
    }catch(error){
        console.error('Error al actualizar el estado de la orden clínica:', error);
         renderAlertMessage('Hubo un error al actualizar el estado de la orden clínica. Error: ' + error.message, 'danger');
         return;
    }
}

function verDetalleOrdenClinica(ordenId) {
    // Lógica para ver el detalle de la orden clínica
    window.location.href = `orden-clinica.php?p=${btoa(ordenId)}&r=true`;
}

function ConfirmCancelarOrden(ordenId) {
    const cancelModal = new bootstrap.Modal(document.getElementById('cancel-ordenclinica-header-modal'));
    document.getElementById('orden_clinica_id_cancelar').value = ordenId;
    cancelModal.show();
}

async function CancelarOrden() {

    const idToCancel = document.getElementById('orden_clinica_id_cancelar').value;
    try{
         const user = JSON.parse(sessionStorage.getItem('user'));
        const userId = user ? user.user.id : null;
        await updateEstadoOrdenClinica(idToCancel, userId,'cancelada');
        window.location.reload();
    }catch(error){
        console.error('Error al cancelar la orden clínica:', error);
        renderAlertMessage('Hubo un error al cancelar la orden clínica. Error: ' + error.message, 'danger');
        return;
    }
}

async function AddConsumibleSolicitado(event){
    const inputConsumible = document.getElementById('consumible_seleccionado');
    if(inputConsumible.value.trim() === ""){
        return;
    }
    const dataConsumible = JSON.parse(deobfuscate(inputConsumible.value));
    const cantidadInput = document.getElementById('consumible_cantidad');
    const cantidad = parseInt(cantidadInput.value, 10);
    const ordenId = document.getElementById('orden_clinica_id').value;
    const user = JSON.parse(sessionStorage.getItem('user'));
    const userId = user ? user.user.id : null;

    consumibleApiObject = {
        orden_clinica_id: ordenId,
        cantidad: cantidad,
        user_id: userId
    };

    if (dataConsumible.type ==="kit"){
        consumibleApiObject.kit_id = dataConsumible.id;
    }else{
        consumibleApiObject.consumible_id = dataConsumible.id;
    }

    if (!dataConsumible) {
        console.error('No se pudo obtener el consumible seleccionado.');
        return;
    }

    dataConsumible.cantidad = cantidad;

    try{
        const response = await insertConsumibleEnOrdenClinica(consumibleApiObject);
        consumibleApiObject.id = response.id;
        console.log('Consumible agregado a la orden clínica:', consumibleApiObject);
        renderConsumibleEnOrdenClinica(dataConsumible,consumibleApiObject);
        document.getElementById('consumible_buscar').value = "";
        document.getElementById('consumible_cantidad').value = "1";
    }catch(error){
        console.error('Error al agregar el consumible a la orden clínica:', error);
        renderAlertMessage('Hubo un error al agregar el consumible a la orden clínica. Error: ' + error.message, 'danger');
        return;
    }
}

function UpdateConsumibleCantidad(event, consumibleId){
    const timerforChange = setTimeout(() => {
        const inputElement = event.target;
        const newCantidad = parseInt(inputElement.value, 10);
        const consumibleDataInput = document.getElementById(`consumible_data_${consumibleId}`);
        const consumibleData = JSON.parse(deobfuscate(consumibleDataInput.value));
        consumibleData.cantidad = newCantidad;
        consumibleDataInput.value = obfuscate(JSON.stringify(consumibleData));
        console.log('Cantidad actualizada para el consumible ID ' + consumibleId + ': ' + newCantidad);
        console.log(deobfuscate(consumibleDataInput.value));
        try{
            updateConsumibleCantidadEnOrdenClinica(consumibleData.id, newCantidad);
        }catch(error){
            console.error('Error al actualizar la cantidad del consumible en la orden clínica:', error);
        }
    }, 400);
    event.target.addEventListener('change', () => {
        clearTimeout(timerforChange);
    });
}

async function RemoverConsumibleSolicitado(consumibleId){
    const consumibleDataInput = document.getElementById(`consumible_data_${consumibleId}`);
    const consumibleData = JSON.parse(deobfuscate(consumibleDataInput.value));
    try{
        await deleteConsumibleEnOrdenClinica(consumibleData.id);
        console.log('Consumible eliminado de la orden clínica:', consumibleData);
        const rowToRemove = document.getElementById(`consumible_row_${consumibleId}`);
        if (rowToRemove) {
            rowToRemove.remove();
        }
    }catch(error){
        console.error('Error al eliminar el consumible de la orden clínica:', error);
    }
}

function ConfirmarTerminarOrden(){
    const pacienteNombre = document.getElementById('paciente_nombre').textContent;
    const pacienteId = document.getElementById('orden_clinica_id').value;
    document.getElementById('nombre_paciente_seleccionado').textContent = pacienteNombre;
    document.getElementById('paciente_id_seleccionado').value = pacienteId;
    const confirmarModal = new bootstrap.Modal(document.getElementById('modal_confirmar_terminar_orden'));
    confirmarModal.show();
}

async function TerminarOrden(){
    const ordenId = document.getElementById('orden_clinica_id').value;
    const user = JSON.parse(sessionStorage.getItem('user'));
    const userId = user ? user.user.id : null;

    try {
        await updateEstadoOrdenClinica(ordenId, userId,'completada');
        //TODO: cerrar consulta si aun esta en estado enfermeria
        //TODO: descontar de inventario los consumibles usados
        window.location.href = 'ordenes-clinicas.php';
    } catch (error) {
        console.error('Error al terminar la orden clínica:', error);
        renderAlertMessage('Hubo un error al terminar la orden clínica. Error: ' + error.message, 'danger');
    }
}