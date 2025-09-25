async function getConsultas(perPage = 50, actualPage = 1, searchTerm = '', order='fecha_consulta', orderDirection='asc') {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas?per_page=${perPage}&page=${actualPage}&search=${encodeURIComponent(searchTerm)}&order_by=${order}&order_direction=${orderDirection}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consultas:', error);
        throw error;
    }
}

async function getConsulta(consultaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/${consultaId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consulta:', error);
        throw error;
    }
}

async function searchConsultas(perPage = 50, actualPage = 1, searchTerm = '', order='fecha_consulta', orderDirection='asc') {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/buscar?per_page=${perPage}&page=${actualPage}&paciente_nombre=${encodeURIComponent(searchTerm)}&order_by=${order}&order_direction=${orderDirection}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error searching consultas:', error);
        throw error;
    }
}

async function updateConsulta(consultaData) {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/${consultaData.id}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(consultaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error updating consulta:', error);
        throw error;
    }
}

async function insertConsulta(consultaData) {
    try {
        const response = await fetch(apiHost + apiPath + '/consultas', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(consultaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error inserting consulta:', error);
        throw error;
    }
}

function renderTableConsultas(consultas) {
    const $tableBody = $('#table_consultas tbody');
    $tableBody.empty();

    consultas.forEach(consulta => {

        const user = JSON.parse(sessionStorage.getItem('user'));
        const hasEditPermission = user && user.permissions && user.permissions.includes('modificar') && consulta.estatus === 'abierta';
        const IsDoctor = user && user.roles.includes('Doctor');   
        //const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

        // fecha consulta format to dd/mm/yyyy hh:mm
        const fechaConsulta = new Date(consulta.created_at);
        const formattedDate = fechaConsulta.toLocaleDateString('es-MX', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).replace(',', '');

        const badgeClass = consulta.estatus === 'abierta' ? 'badge-soft-primary' :
                           consulta.estatus === 'enfermeria' ? 'badge-soft-warning' :
                           consulta.estatus === 'completada' ? 'badge-soft-success' : 'badge-soft-secondary';

        const $row = $('<tr>');
        $row.append($('<td>#CON').text(consulta.id));
        $row.append($('<td>').text(consulta.paciente.nombre + " " + consulta.paciente.apellido));
        $row.append($('<td>').html(`${consulta.doctor.nombre_completo}<br><small>${consulta.doctor.titulo}</small>`));
        $row.append($('<td>').text(formattedDate));
        $row.append($('<td>').html('<span class="badge ' + badgeClass + '" style="font-size: 1rem; font-weight: bold;">' + consulta.estatus.charAt(0).toUpperCase() + consulta.estatus.slice(1) + '</span>'));
        if(hasEditPermission && IsDoctor && consulta.estatus === 'abierta'){
            $row.append($('<td>').html(`
                <a href="nueva-consulta.php?p=${btoa(consulta.id)}" class="btn btn-lg btn-primary me-1" title="Editar Consulta"><i class="ti ti-pencil"></i></a>
            `));
        }else{
            $row.append($('<td>').html(`<a href="view-consulta.php?id=${consulta.id}" class="btn btn-lg btn-info me-1" title="Ver Consulta"><i class="ti ti-eye"></i></a>`));
        }
        
        $tableBody.append($row);
    });
}

function renderPacienteConsultaInfo(paciente) {
    if (!paciente) return;

    const fechaNacimiento = new Date(paciente.fecha_nacimiento);
    const formattedFechaNacimiento = fechaNacimiento.toLocaleDateString('es-MX', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    $('#paciente_fecha_nacimiento').text(formattedFechaNacimiento);

    $('#paciente_nombre').text(paciente.nombre + " " + paciente.apellido);
    $('#paciente_edad').text(paciente.edad);
    $('#paciente_genero').text(paciente.genero);

    $('#paciente_id').val(paciente.id);
}

function renderMedicamentoCard(medicamento) {
    if (!medicamento) return;

    const card = $(`
        <div class="card medicamento_id_${medicamento.id}" style="width: 18rem;">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div class="">
                    <h4 class="card-title text-secondary">${medicamento.nombre.charAt(0).toUpperCase() + medicamento.nombre.slice(1)}</h4>
                    <span class="card-text">Dosis: <strong>${medicamento.dosis}</strong></span><br>
                    <span class="card-text">Duración: <strong>${medicamento.duracion}</strong></span><br>
                    <span class="card-text">Frecuencia: <strong>${medicamento.frecuencia}</strong></span>
                </div>
                <input type="hidden" class="medicamento_id" value="${medicamento.id}">
                <button class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarMedicamento('${medicamento.id}')">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
    `);

    $('#lista_medicamentos').append(card);
}

function appendMedicamentoToList() {

    let medicamentoId = document.getElementById('frm_medicamento_id').value;
    if (!medicamentoId) {
        medicamentoId = crypto.randomUUID(); // Generate a UUID if medicamentoId is empty
    }
    const nombre = document.getElementById('frm_medicamento_nombre').value.trim();
    const dosis = document.getElementById('frm_medicamento_dosis').value.trim();
    const duracion = document.getElementById('frm_medicamento_duracion').value.trim();
    const frecuencia = document.getElementById('frm_medicamento_frecuencia').value.trim();

    const medicamento = {
        id: medicamentoId,
        nombre: nombre,
        dosis: dosis,
        duracion: duracion,
        frecuencia: frecuencia
    };

    const consultaData = ValidaConsulta();
    let medicamentos = sessionStorage.getItem('medicamentos');
    if (!medicamentos) {
        medicamentos = [];
    } else {
        medicamentos = JSON.parse(medicamentos);
    }

    if (!consultaData.medicamentos) {
        consultaData.medicamentos = [];
    }

    medicamentos.push(medicamento);
    consultaData.medicamentos = medicamentos;

    sessionStorage.setItem('medicamentos', JSON.stringify(medicamentos));
    console.log('Medicamento agregado:', medicamento);
    try {
        disableButtons();
        const updatedConsulta = updateConsulta(consultaData);
        renderMedicamentoCard(medicamento);
        // Clear form fields
        document.getElementById('frm_medicamento_id').value = '';
        document.getElementById('frm_medicamento_nombre').value = '';
        document.getElementById('frm_medicamento_dosis').value = '';
        document.getElementById('frm_medicamento_duracion').value = '';
        document.getElementById('frm_medicamento_frecuencia').value = '';
    } catch (error) {
        console.error('Error al agregar medicamento:', error);
        renderAlertMessage('Error al agregar medicamento. Por favor, intente nuevamente.', 'danger');
        
    }finally {  
        enableButtons();
    }
}

function eliminarMedicamento(medicamentoId) {
    if (!medicamentoId) return;

    let medicamentos = sessionStorage.getItem('medicamentos');
    if (!medicamentos) return;
    medicamentos = JSON.parse(medicamentos);
    medicamentos = medicamentos.filter(m => m.id !== medicamentoId);
    const medicamentosJson = JSON.stringify(medicamentos);
    sessionStorage.setItem('medicamentos', medicamentosJson);
    $(`#lista_medicamentos .medicamento_id[value="${medicamentoId}"]`).closest('.card').remove();
    const consultaData = ValidaConsulta();

    if (!consultaData.medicamentos) {
        consultaData.medicamentos = [];
    }
    consultaData.medicamentos = medicamentos;

    try {
        disableButtons();
        const updatedConsulta = updateConsulta(consultaData);
    } catch (error) {
        console.error('Error al eliminar medicamento:', error);
        renderAlertMessage('Error al eliminar medicamento. Por favor, intente nuevamente.', 'danger');
    }finally {
        enableButtons();
    }
}

async function renderConsultaPaciente(consulta){
    if(!consulta || !consulta.id) return;
    // Fetch paciente details
    document.getElementById('consulta_id').innerText = "C#" + consulta.id;
    document.getElementById('consulta_fecha').innerText = new Date(consulta.created_at).toLocaleDateString('es-MX', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });

    document.getElementById('paciente_fecha_nacimiento').innerText = new Date(consulta.paciente.fecha_nacimiento).toLocaleDateString('es-MX', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });

    document.getElementById('paciente_id').value = consulta.paciente.id;
    document.getElementById('paciente_nombre').innerText = consulta.paciente.nombre.charAt(0).toUpperCase() + consulta.paciente.nombre.slice(1).toLowerCase() + " " + consulta.paciente.apellido.charAt(0).toUpperCase() + consulta.paciente.apellido.slice(1).toLowerCase();
    document.getElementById('consulta_id').value = consulta.id;
    document.getElementById('paciente_edad').innerText = calcularEdad(consulta.paciente.fecha_nacimiento);
    const historialMedico= consulta.paciente.historial_medico ? consulta.paciente.historial_medico[0] : 'N/A';
    document.getElementById('paciente_genero').innerText =historialMedico.sexo;
    document.getElementById('frm_motivo_consulta').value = consulta.motivo_consulta || '';
    document.getElementById('frm_sintomas').value = consulta.sintomas || '';
    document.getElementById('frm_diagnostico').value = consulta.diagnostico || '';
    document.getElementById('frm_indicaciones').value = consulta.indicaciones || '';


    document.getElementById('frm_signos_vitales_id').value = consulta.signos_vitales ? consulta.signos_vitales.id : '';
    // Populate signos vitales form if available
    if (consulta.signos_vitales) {
        document.getElementById('frm_signos_vitales_temperatura').value = consulta.signos_vitales.temperatura || '';
        document.getElementById('frm_signos_vitales_frecuencia_cardiaca').value = consulta.signos_vitales.frecuencia_cardiaca || '';
        document.getElementById('frm_signos_vitales_frecuencia_respiratoria').value = consulta.signos_vitales.frecuencia_respiratoria || '';
        document.getElementById('frm_signos_vitales_saturacion_oxigeno').value = consulta.signos_vitales.saturacion_oxigeno || '';
        document.getElementById('frm_signos_vitales_presion_arterial').value = consulta.signos_vitales.presion_arterial || '';
        document.getElementById('frm_signos_vitales_peso').value = consulta.signos_vitales.peso || '';
        document.getElementById('frm_signos_vitales_talla').value = consulta.signos_vitales.talla || '';
        document.getElementById('frm_signos_vitales_estatura').value = consulta.signos_vitales.estatura || '';
    }

    document.getElementById('info_paciente_container').classList.remove('d-none');
}

async function LoadConsultasTable(perPage = 50, actualPage = 1, searchTerm = '',order='fecha_consulta', orderDirection='asc') {
    showLoading();
    try {
        const data = searchTerm === '' ? await getConsultas(perPage, actualPage, searchTerm, order, orderDirection) : await searchConsultas(perPage, actualPage, searchTerm, order, orderDirection);
        renderTableConsultas(data.data);
        $('#consultas_container').removeClass('d-none');
        $('#total-consultas').text(data.total);
        await LoadPagesControl(data.last_page, perPage, actualPage);
    } catch (error) {
        console.error('Error loading consultas table:', error);
    }finally {
        hideLoading();
    }
}

async function LoadConsulta(p) {
    if (!p) {
        renderAlertMessage("ID de consulta no proporcionado.", 'danger');
        return;
    }
    const consultaId = atob(p);
    showLoading();
    disableButtons();
    try {
        const consulta = await getConsulta(consultaId);
        renderConsultaPaciente(consulta);
        if (consulta.medicamentos && consulta.medicamentos.length > 0) {
            sessionStorage.setItem('medicamentos', JSON.stringify(consulta.medicamentos));
            consulta.medicamentos.forEach(medicamento => {
                renderMedicamentoCard(medicamento);
            });
        }

        enableButtons();
    } catch (error) {
        renderAlertMessage("Error al cargar la consulta. Por favor, intente nuevamente.", 'danger',false);
        console.error('Error fetching consulta:', error);
    } finally {
        hideLoading();
    }
}

function ValidaConsulta(){
    //validamos signos vitales
    const motivoConsulta= document.getElementById('frm_motivo_consulta').value.trim();
    const sintomas= document.getElementById('frm_sintomas').value.trim();
    const diagnostico= document.getElementById('frm_diagnostico').value.trim();
    const indicaciones= document.getElementById('frm_indicaciones').value.trim();
    const consultaId = document.getElementById('consulta_id').value;

    isvalid=true;
    error_onComponent = null;

    if(motivoConsulta.length < 10){
        const errorElement = document.getElementById('invalid_frm_motivo_consulta');
        errorElement.textContent = 'Por favor, ingrese un motivo de consulta válido (mínimo 10 caracteres).';
        document.getElementById('frm_motivo_consulta').classList.add('is-invalid');
        isvalid=false;
        error_onComponent = 'frm_motivo_consulta';
    }
    else{
        document.getElementById('frm_motivo_consulta').classList.remove('is-invalid');
    }

    if(sintomas.length < 10){
        const errorElement = document.getElementById('invalid_frm_sintomas');
        errorElement.textContent = 'Por favor, ingrese síntomas válidos (mínimo 10 caracteres).';
        document.getElementById('frm_sintomas').classList.add('is-invalid');
        isvalid=false;
        if(!error_onComponent) error_onComponent = 'frm_sintomas';
    }else{
        document.getElementById('frm_sintomas').classList.remove('is-invalid');
    }

    if(diagnostico.length < 10){
        const errorElement = document.getElementById('invalid_frm_diagnostico');
        errorElement.textContent = 'Por favor, ingrese un diagnóstico válido (mínimo 10 caracteres).';
        document.getElementById('frm_diagnostico').classList.add('is-invalid');
        isvalid=false;
        if(!error_onComponent) error_onComponent = 'frm_diagnostico';
    }else{
        document.getElementById('frm_diagnostico').classList.remove('is-invalid');
    }

    if(indicaciones.length < 10){
        const errorElement = document.getElementById('invalid_frm_indicaciones');
        errorElement.textContent = 'Por favor, ingrese indicaciones válidas (mínimo 10 caracteres).';
        document.getElementById('frm_indicaciones').classList.add('is-invalid');
        isvalid=false;
        if(!error_onComponent) error_onComponent = 'frm_indicaciones';
    }else{
        document.getElementById('frm_indicaciones').classList.remove('is-invalid');
    }

    const consultaData = validarSignosVitales();
    if(!consultaData) {
        isvalid=false;
        if(!error_onComponent) error_onComponent = 'frm_signos_vitales_temperatura';
    }


    if(!isvalid) {
        document.getElementById(error_onComponent).scrollIntoView({ behavior: 'smooth', block: 'center' });
        return false;
    }

    consultaData.motivo_consulta = motivoConsulta;
    consultaData.sintomas = sintomas;
    consultaData.diagnostico = diagnostico;
    consultaData.indicaciones = indicaciones;
    consultaData.id = consultaId;

    return consultaData;

}

async function GuardarConsulta(renderMessages=true){
    const consultaData = ValidaConsulta();
    if(!consultaData) return;
    showLoading();
    disableButtons();
    try {
        const updatedConsulta = await updateConsulta(consultaData);
        if(renderMessages) renderAlertMessage('Consulta actualizada correctamente.', 'success');
    } catch (error) {
        if(renderMessages) renderAlertMessage('Error al actualizar la consulta. Por favor, intente nuevamente.', 'danger');
    } finally {
        enableButtons();
    }

    hideLoading();
}

function BuscarConsulta(){
    const searchInput = document.getElementById('searchInput');
    window.searchTerm = searchInput.value.trim();
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const direccion = urlParams.get('direccion') || 'desc';
    window.location.search = `?registros=${perPage}&pagina=1&direccion=${direccion}&busqueda=${encodeURIComponent(searchTerm)}`;
}

function OrdenarPorReciente(){
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    const busqueda = urlParams.get('busqueda') || '';
    window.location.search = `?registros=${perPage}&pagina=${pagina}&busqueda=${encodeURIComponent(busqueda)}&direccion=desc`;
}

function OrdenarPorAntiguo(){
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    const busqueda = urlParams.get('busqueda') || '';
    window.location.search = `?registros=${perPage}&pagina=${pagina}&busqueda=${encodeURIComponent(busqueda)}&direccion=asc`;
}

function ChangeRecords(){
    const select = document.getElementById('example-select-1');
    const registros = select.value;
    const urlParams = new URLSearchParams(window.location.search);
    const busqueda = urlParams.get('busqueda') || '';
    const direccion = urlParams.get('direccion') || 'desc';
    const pagina = urlParams.get('pagina') || 1;

    window.location.search = `?registros=${registros}&pagina=1&busqueda=${encodeURIComponent(busqueda)}&direccion=${direccion}`;
}

async function LoadPagesControl(totalPages,perPage = 50,actualPage=1){
    if (totalPages <= 1) {
         $('.pagination_control').each(function() {
            $(this).hide();
         });
        return; // No need for pagination if there's only one page
    }
    $('.pagination_control').each(function() {
        const $paginationContainer = $(this);
        $paginationContainer.empty();

        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('busqueda')||'';
        const searchParam = searchTerm ? `&busqueda=${encodeURIComponent(searchTerm)}` : '';
         const direccion = urlParams.get('direccion') || 'desc';

        if (actualPage !== 1) {
            const prevItem = $('<li>', { class: 'page-item' });
            prevItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}&direccion=${direccion}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${i}${searchParam}&direccion=${direccion}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}&direccion=${direccion}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}

function GoToAddPaciente(){
    window.location.href = 'add-patient.php?o=consultas';
}

async function BuscarPacienteParaConsulta(){
    const searchInput = document.getElementById('searchPaciente');
    const searchTerm = searchInput.value.trim();
    if(searchTerm.length < 3){
        alert("Por favor ingrese al menos 3 caracteres para buscar un paciente.");
        return;
    }

    try {
        const pacientes = await searchPatientByName(200,1,searchTerm);
        const $tableBody = $('#table_pacientes_search tbody');
        $tableBody.empty();
        if(pacientes.data.length === 0){
            $tableBody.append($('<tr>').append($('<td colspan="5" class="text-center">').text('No se encontraron pacientes.')));
        }
        pacientes.data.forEach(paciente => {

            // Format fecha_nacimiento to dd/mm/yyyy
            const fechaNacimiento = new Date(paciente.fecha_nacimiento);
            const formattedFechaNacimiento = fechaNacimiento.toLocaleDateString('es-MX', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });

            const $row = $('<tr>');
            $row.append($('<td>').text(paciente.nombre + ' ' + paciente.apellido));
            $row.append($('<td>').text(formattedFechaNacimiento));
            $row.append($('<td>').text(calcularEdad(paciente.fecha_nacimiento) + ' años'));
            $row.append($('<td>').html(`
                <button class="btn btn-lg btn-primary me-1" title="Seleccionar Paciente" onclick="seleccionarPaciente('${paciente.id}', '${paciente.nombre} ${paciente.apellido}')"><i class="ti ti-check"></i></button>
            `));
            $tableBody.append($row);
        });
    } catch (error) {
        console.error("Error al buscar pacientes:", error);
    } finally {
        hideLoading();
    }
}

function seleccionarPaciente(pacienteId, pacienteNombre) {
    // Open the modal to confirm the selection of the patient
    document.getElementById('paciente_id_seleccionado').value = pacienteId;
    document.getElementById('nombre_paciente_seleccionado').innerText = pacienteNombre.charAt(0).toUpperCase() + pacienteNombre.slice(1).toLowerCase();
    const confirmarConsulta = new bootstrap.Modal(document.getElementById('modal_confirmar_consulta'));
    confirmarConsulta.show();
    // Redirect to add-consulta.php with pacienteId as query parameter
    //window.location.href = `add-consulta.php?paciente_id=${pacienteId}`;
}

function CerrarConfirmacionModal () {
    const confirmarConsultaModal = bootstrap.Modal.getInstance(document.getElementById('modal_confirmar_consulta'));
    confirmarConsultaModal.hide();
}

async function CrearConsulta() {
    const pacienteId = document.getElementById('paciente_id_seleccionado').value;
    const offcanvasElement = document.getElementById('offcanvasRight');
    const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
    let PerfilUsuario = null;
    try {
        PerfilUsuario = await getUserProfile();
        console.log("PerfilUsuario:", PerfilUsuario);
        if(!PerfilUsuario || !PerfilUsuario.user.id){
            renderAlertMessage("No se pudo obtener el perfil del usuario. Por favor, inicie sesión nuevamente.", 'danger');
            return; 
        }
        if(!PerfilUsuario.doctor_info || !PerfilUsuario.doctor_info.id){
            renderAlertMessage("Usuario no registrado como doctor. Por favor, complete su registro.", 'danger');
            return;
        }
    } catch (error) {
        console.log("Error al obtener el perfil del usuario:", error);
       renderAlertMessage("Error al obtener el perfil del usuario. Por favor, intente nuevamente.", 'danger');
        return;
    }finally {
        CerrarConfirmacionModal();
        if (offcanvasInstance) {
            offcanvasInstance.hide();
        }
    }

    if (!pacienteId) {
        CerrarConfirmacionModal();
        renderAlertMessage("No se ha seleccionado ningún paciente.", 'danger');
         if (offcanvasInstance) {
            offcanvasInstance.hide();
        }
        return;
    }

    const consultaData = {
        paciente_id: parseInt(pacienteId),
        doctor_id: PerfilUsuario.doctor_info.id,
        fecha_consulta: new Date().toISOString(),
        motivo_consulta: "",
        sintomas: "",
        diagnostico: "",
        indicaciones: "",
        medicamentos: [],
        servicios_medicos: [],
        estatus: "abierta",
        temperatura: null,
        frecuencia_cardiaca: null,
        frecuencia_respiratoria: null,
        presion_arterial: "",
        saturacion_oxigeno: null,
        peso: null,
        talla: null
    };

    let consultaCreada = null;
    try {
        consultaCreada = await insertConsulta(consultaData);
    } catch (error) {
        console.error("Error al crear la consulta:", error);
        renderAlertMessage("Error al crear la consulta. Por favor, intente nuevamente.", 'danger');
        return;
    }
    console.log("Consulta creada:", consultaCreada.consulta.id);
    if(!consultaCreada || !consultaCreada.consulta.id){
        renderAlertMessage("Error al crear la consulta. Por favor, intente nuevamente.", 'danger');
        return;
    }

    window.location.href = `nueva-consulta.php?p=${btoa(consultaCreada.consulta.id)}`;
}

function disableButtons(){ 
    $('.btn').prop('disabled', true);
}
function enableButtons(){
    $('.btn').prop('disabled', false);
}