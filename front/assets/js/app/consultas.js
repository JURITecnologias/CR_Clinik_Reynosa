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

async function getUltimasCincoConsultasPacienteId(pacienteId,per_page=10) {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/buscar?paciente_id=${pacienteId}&per_page=${per_page}&order_direction=desc`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching ultimas cinco consultas:', error);
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

async function deleteConsulta(consultaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/${consultaId}`, {
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error deleting consulta:', error);
        throw error;
    }
}


function renderTableConsultas(consultas) {
    const $tableBody = $('#table_consultas tbody');
    $tableBody.empty();

    consultas.forEach(consulta => {

        const user = JSON.parse(sessionStorage.getItem('user'));
        const hasEditPermission = user && user.permissions && user.permissions.includes('modificar') && consulta.estatus === 'abierta';
        const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar') && consulta.estatus === 'abierta';
        const IsDoctor = user && user.roles.includes('Doctor');
        const isAdmin = user && (user.roles.includes('Main Admin') || user.roles.includes('Admon'));

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
            $row.append($('<td>').html(`<a href="detalle-consulta.php?p=${btoa(consulta.id)}" class="btn btn-lg btn-info me-1" title="Ver Consulta"><i class="ti ti-eye"></i></a>`));
        }
        if (isAdmin && hasDeletePermission) {
            $row.append($('<td>').html(`
                    <button class="btn btn-lg btn-danger me-1" title="Eliminar Consulta" onclick="ConfirmarEliminarConsulta(${consulta.id})"><i class="ti ti-trash"></i></button>
                `));
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

function renderMedicamentoCard(medicamento, showDeleteButton = true) {
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
                ${showDeleteButton ? `
                    <button class="btn btn-save btn-danger btn-sm" title="Eliminar" onclick="eliminarMedicamento('${medicamento.id}')">
                        <i class="ti ti-trash"></i>
                    </button>
                ` : ''}
            </div>
        </div>
    `);

    $('#lista_medicamentos').append(card);
}

function renderServicioMedicoCard(servicio, showDeleteButton = true) {
    if (!servicio) return;

    const card = $(`
        <div class="card servicio_id_${servicio.id}" style="width: 18rem;">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div class="">
                    <h4 class="card-title text-secondary">${servicio.nombre.charAt(0).toUpperCase() + servicio.nombre.slice(1)}</h4>
                    <span class="card-text">Descripción: <strong>${servicio.solicitud}</strong></span><br>
                </div>
                <input type="hidden" class="servicio_id" value="${servicio.id}">
                ${showDeleteButton ? `
                    <button class="btn btn-save btn-danger btn-sm" title="Eliminar" onclick="eliminarServicio('${servicio.id}')">
                        <i class="ti ti-trash"></i>
                    </button>
                ` : ''}
            </div>
        </div>
    `);

    $('#lista_servicios').append(card);
}

function renderPacienteBasicInfo(paciente) {
    if (!paciente) return;
    document.getElementById('paciente-id-label').innerText = `#PT${paciente.id}`;
    document.getElementById('paciente-nombres-label').innerText = `${paciente.nombre.charAt(0).toUpperCase() + paciente.nombre.slice(1).toLowerCase()} ${paciente.apellido.charAt(0).toUpperCase() + paciente.apellido.slice(1).toLowerCase()}`;
    document.getElementById('paciente-fecha-agregado-label').innerText = new Date(paciente.created_at).toLocaleDateString('es-MX', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    document.getElementById('paciente-fecha-nacimiento-label').innerText = new Date(paciente.fecha_nacimiento).toLocaleDateString('es-MX', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    const historialMedico = paciente.historial_medico ? paciente.historial_medico[0] : null;
    document.getElementById('paciente-telefono-label').innerText = paciente.telefono || 'N/A';
    document.getElementById('paciente-email-label').innerText = paciente.email || 'N/A';
    document.getElementById('paciente-genero-label').innerText =paciente.sexo || 'N/A';
    document.getElementById('paciente-edad-label').innerText = calcularEdad(paciente.fecha_nacimiento);
    document.getElementById('paciente-curp-label').innerText = paciente.curp || 'N/A';
    document.getElementById('paciente-nss-label').innerText = paciente.nss || 'N/A';
    document.getElementById('paciente-estado-civil-label').innerText = historialMedico ? historialMedico.estado_civil : 'N/A';
    document.getElementById('paciente-direccion-label').innerText = paciente.direccion || 'N/A';
    document.getElementById('paciente-contacto-emergencia-label').innerText = paciente.contacto_emergencia || 'N/A';
}

function renderPacienteHistorialMedico(historialMedico) {
    if (!historialMedico) return;

    document.getElementById('paciente-enfermedades-cronicas-label').innerText = historialMedico.enfermedades_cronicas || 'N/A';
    document.getElementById('paciente-hospitalizaciones-previas-label').innerText = historialMedico.hospitalizaciones_previas || 'N/A';
    document.getElementById('paciente-medicamentos-actuales-label').innerText = historialMedico.medicamentos_actuales || 'N/A';
    document.getElementById('paciente-alergias-label').innerText = historialMedico.alergias || 'N/A';
    document.getElementById('paciente-vacunas-recientes-label').innerText = historialMedico.vacunas_recientes || 'N/A';
    document.getElementById('paciente-antecedentes-familiares-label').innerText = historialMedico.antecedentes_familiares || 'N/A';
    document.getElementById('paciente-transfusiones-label').innerText = historialMedico.transfusiones || 'N/A';
    document.getElementById('paciente-fuma-label').innerText = historialMedico.fuma ? 'Sí' : 'No';
    document.getElementById('paciente-alcohol-label').innerText = historialMedico.alcohol ? 'Sí' : 'No';
    document.getElementById('paciente-apoyo-psicologico-label').innerText = historialMedico.apoyo_psicologico ? 'Sí' : 'No';
    document.getElementById('paciente-frecuencia-alcohol-label').innerText = historialMedico.frecuencia_alcohol || 'N/A';
    document.getElementById('paciente-frecuencia-tabaco-label').innerText = historialMedico.frecuencia_tabaco || 'N/A';
    document.getElementById('paciente-sustancias-psicoactivas-label').innerText = historialMedico.sustancias_psicoactivas || 'N/A';
    document.getElementById('paciente-alimentacion-label').innerText = historialMedico.alimentacion || 'N/A';
    document.getElementById('paciente-actividad-fisica-label').innerText = historialMedico.actividad_fisica || 'N/A';
    document.getElementById('paciente-notas-label').innerText = historialMedico.notas || 'N/A';
}

function renderPacienteUltimasConsultas(consultas) {
    if (!consultas || consultas.length === 0) {
        document.getElementById('ultimas-consultas-container').innerHTML = '<p>No hay consultas previas.</p>';
        return;
    }
    const container = document.getElementById('ultimas-consultas-accordion');
    container.innerHTML = '';
    consultas.forEach((consulta, index) => {
        const fechaConsulta = new Date(consulta.created_at);
        const formattedDate = fechaConsulta.toLocaleDateString('es-MX', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    });
    const htmlContent = consultas.map((consulta, index) => {
        const fechaConsulta = new Date(consulta.created_at);
        const formattedDate = fechaConsulta.toLocaleDateString('es-MX', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        const datosDoctor= consulta.doctor ? `${consulta.doctor.nombre_completo} (${consulta.doctor.titulo})` : 'N/A';
        const motivosConsulta = consulta.motivos_consulta && Array.isArray(consulta.motivos_consulta) ? consulta.motivos_consulta.join(', ') : (consulta.motivo_consulta || 'N/A');
        return `
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading${index}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                   Consulta dia ${formattedDate} <span class="badge badge-soft-primary" id="consulta-id-${index}">#PT${consulta.id}</span>
                </button>
            </h2>
            <div id="collapse${index}" class="accordion-collapse collapse" aria-labelledby="heading${index}" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                    <p><strong>Doctor que atendio:</strong> ${datosDoctor}</p>
                    <p><strong>Motivo de Consulta:</strong> ${consulta.motivo_consulta || 'N/A'}</p>
                    <p><strong>Tipo de Motivo de consulta :</strong> ${motivosConsulta.toUpperCase() || 'N/A'}</p>
                    <p><strong>Síntomas:</strong> ${consulta.sintomas || 'N/A'}</p>
                    <p><strong>Diagnóstico:</strong> ${consulta.diagnostico || 'N/A'}</p>
                    <p><strong>Indicaciones:</strong> ${consulta.indicaciones || 'N/A'}</p>
                    <p><strong>Medicamentos:</strong></p>
                    <ul id="medicamentos-list-${index}">
                        ${consulta.medicamentos && consulta.medicamentos.length > 0 ? consulta.medicamentos.map(med => `<li>${med.nombre} - ${med.dosis} (${med.frecuencia})</li>`).join('') : '<li>No hay medicamentos prescritos.</li>'}
                    </ul>
                    <p><strong>Servicios Médicos Solicitados:</strong></p>
                    <ul id="servicios-list-${index}">
                        ${consulta.servicios_medicos && consulta.servicios_medicos.length > 0 ? consulta.servicios_medicos.map(serv => `<li>${serv.nombre} - ${serv.solicitud}</li>`).join('') : '<li>No hay servicios médicos solicitados.</li>'}
                    </ul>

                </div>
            </div>
        </div>`
    }).join('');

    container.innerHTML = htmlContent;
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

    const consultaData = SaveConsultaData(medicamento);
    
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

async function appendServicioMedicoToList() {
    let servicioId = document.getElementById('frm_servicio_id').value;
    
    if (!servicioId) servicioId = crypto.randomUUID(); // Generate a UUID if servicioId is empty

    const nombre = document.getElementById('frm_servicio_nombre').value.trim();
    const solicitud = document.getElementById('frm_servicio_solicitud').value.trim();
    const categoria = document.getElementById('frm_servicio_categoria').value.trim();

    if (nombre.length < 3) {
        alert('Por favor, ingrese un nombre válido para el servicio médico (mínimo 3 caracteres).');
        return;
    }
    if (solicitud.length < 3) {
        alert('Por favor, ingrese una solicitud válida para el servicio médico (mínimo 5 caracteres).');
        return;
    }
    const servicio = {
        id: servicioId,
        nombre: nombre,
        solicitud: solicitud,
        categoria: categoria
    };
    const consultaData = SaveConsultaData(null,servicio);
    try {
        disableButtons();
        const updatedConsulta = updateConsulta(consultaData);
        renderServicioMedicoCard(servicio);
        // Clear form fields
        document.getElementById('frm_servicio_id').value = '';
        document.getElementById('frm_servicio_nombre').value = '';
        document.getElementById('frm_servicio_solicitud').value = '';
    } catch (error) {
        console.error('Error al agregar servicio médico:', error);
        renderAlertMessage('Error al agregar servicio médico. Por favor, intente nuevamente.', 'danger');
    }finally {
        enableButtons();
    }
}

function SaveConsultaData(medicamento=null,serviciomedico=null) { 
    if(!medicamento && !serviciomedico) return;
    const consultaData = ValidaConsulta();
    let medicamentos = sessionStorage.getItem('medicamentos');
    let servicios_medicos = sessionStorage.getItem('servicios_medicos');
    if (!medicamentos) {
        medicamentos = [];
    } else {
        medicamentos = JSON.parse(medicamentos);
    }

    if (!servicios_medicos) {
        servicios_medicos = [];
    } else {
        servicios_medicos = JSON.parse(servicios_medicos);
    }

    if (!consultaData.medicamentos) {
        consultaData.medicamentos = [];
    }

    if(medicamento) {
        medicamentos.push(medicamento);
    }
    consultaData.medicamentos = medicamentos;
    sessionStorage.setItem('medicamentos', JSON.stringify(medicamentos));

    if (!consultaData.servicios_medicos) {
        consultaData.servicios_medicos = [];
    }

    if(serviciomedico) {
        servicios_medicos.push(serviciomedico);
    }
    consultaData.servicios_medicos = servicios_medicos;
    sessionStorage.setItem('servicios_medicos', JSON.stringify(servicios_medicos));

    return consultaData;
}

// function eliminarMedicamento(medicamentoId) {
//     if (!medicamentoId) return;

//     let medicamentos = sessionStorage.getItem('medicamentos');
//     if (!medicamentos) return;
//     medicamentos = JSON.parse(medicamentos);
    
//     return consultaData;
// }

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

function eliminarServicio(servicioId) {
    if (!servicioId) return;
    let servicios = sessionStorage.getItem('servicios_medicos');
    if (!servicios) return;
    servicios = JSON.parse(servicios);
    servicios = servicios.filter(s => s.id !== servicioId);
    const serviciosJson = JSON.stringify(servicios);
    sessionStorage.setItem('servicios_medicos', serviciosJson);
    $(`#lista_servicios .servicio_id[value="${servicioId}"]`).closest('.card').remove();
    const consultaData = ValidaConsulta();
    if (!consultaData.servicios_medicos) {
        consultaData.servicios_medicos = [];
    }
    consultaData.servicios_medicos = servicios;
    try {
        disableButtons();
        const updatedConsulta = updateConsulta(consultaData);
    } catch (error) {
        console.error('Error al eliminar servicio médico:', error);
        renderAlertMessage('Error al eliminar servicio médico. Por favor, intente nuevamente.', 'danger');
    }finally {
        enableButtons();
    }
}

async function renderConsultaPaciente(consulta){
    if(!consulta || !consulta.id) return;
    // Fetch paciente details
    document.getElementById('consulta_id').innerText = "C#" + consulta.id;
    document.getElementById('doctor_id').value = consulta.doctor.id;
    document.getElementById('consulta_estatus').value = consulta.estatus;
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
    //document.getElementById('frm_sintomas').value = consulta.sintomas || '';
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
        //document.getElementById('frm_signos_vitales_talla').value = consulta.signos_vitales.talla || '';
        document.getElementById('frm_signos_vitales_estatura').value = consulta.signos_vitales.estatura || '';
    }

    document.getElementById('info_paciente_container').classList.remove('d-none');
    document.getElementById('doc_info').value =  obfuscate(JSON.stringify(consulta.doctor));
    document.getElementById('paciente_info').value = obfuscate(JSON.stringify(consulta.paciente));
    if (consulta.motivos_consulta && Array.isArray(consulta.motivos_consulta)) {
        consulta.motivos_consulta.forEach(motivo => {
            const checkbox = document.getElementById(motivo);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    }

}

function renderCitaSeguimientoInfo(cita){
    if(!cita || !cita.id) {
        return;
    }

    const fechaCita = new Date(cita.fecha_cita);

    document.getElementById('frm_cita_fecha').value = cita.fecha_cita;
    document.getElementById('frm_cita_hora').value = cita.hora_cita;
    document.getElementById('cita_id').value = cita.id;
}


async function LoadConsultasTable(perPage = 50, actualPage = 1, searchTerm = '',order='fecha_consulta', orderDirection='asc') {
    showLoading();
    try {
        const data = searchTerm === '' ? await getConsultas(perPage, actualPage, searchTerm, order, orderDirection) : await searchConsultas(perPage, actualPage, searchTerm, order, orderDirection);
        renderTableConsultas(data.data);
        $('#consultas_container').removeClass('d-none');
        $('#total-consultas').text(data.total);
        await LoadPagesControl('consultas',data.last_page, perPage, actualPage);
    } catch (error) {
        console.error('Error loading consultas table:', error);
    }finally {
        hideLoading();
    }
}

async function LoadConsulta(p, showDeleteButton = true) {
    if (!p) {
        renderAlertMessage("ID de consulta no proporcionado.", 'danger');
        return;
    }
    //limpia listas de medicamentos y servicios medicos
    sessionStorage.removeItem('medicamentos');
    sessionStorage.removeItem('servicios_medicos');

    const user = JSON.parse(sessionStorage.getItem('user'));

    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin'].some(rol => user.roles.includes(rol));
    const hasDoctorRole = user && user.roles && user.roles.includes('Doctor');

    const consultaId = atob(p);
    showLoading();
    disableButtons();
    try {
        const consulta = await getConsulta(consultaId);
        const cita= await searchCitaByConsulta(consultaId);
       
        renderConsultaPaciente(consulta);
        if(cita && cita.data && cita.data.length > 0) renderCitaSeguimientoInfo(cita.data[0]);
        if (consulta.medicamentos && consulta.medicamentos.length > 0) {
            sessionStorage.setItem('medicamentos', JSON.stringify(consulta.medicamentos));
            consulta.medicamentos.forEach(medicamento => {
                renderMedicamentoCard(medicamento, showDeleteButton);
            });
        }
        if(consulta.servicios_medicos && consulta.servicios_medicos.length > 0){
            sessionStorage.setItem('servicios_medicos', JSON.stringify(consulta.servicios_medicos));
            consulta.servicios_medicos.forEach(servicio => {
                renderServicioMedicoCard(servicio, showDeleteButton);
            });
        }

        renderPacienteBasicInfo(consulta.paciente);
        renderPacienteHistorialMedico(consulta.paciente.historial_medico ? consulta.paciente.historial_medico[0] : null);
        const ultimasConsultas = await getUltimasCincoConsultasPacienteId(consulta.paciente.id);
        const filteredConsultas = ultimasConsultas.data.filter(ultimaConsulta => {
            const consultaFecha = new Date(consulta.created_at);
            const ultimaConsultaFecha = new Date(ultimaConsulta.created_at);
            return ultimaConsultaFecha < consultaFecha;
        });
        if (filteredConsultas.length > 0) {
            renderPacienteUltimasConsultas(filteredConsultas);
        }

        try {
            const receta = await getRecetaByConsultaId(consultaId);
            if (receta && receta.uuid) {
                document.getElementById('receta').value = obfuscate(receta.uuid);
            }
        } catch (error) {
            if (error.response && error.response.status !== 404) {
                renderAlertMessage("Error al obtener la receta. Por favor, intente nuevamente.", 'danger');
            }
            console.error('Error fetching receta:', error);

        }

        enableButtons();

        if(consulta.estatus !== 'abierta' ){
            hideSaveButtons();
            const servicioMedicoEntryForm = document.getElementById('servicio_medico_entry_form');
            const medicamentoEntryForm = document.getElementById('medicamento_entry_form');
            const medicamentoEntryFormName = document.getElementById('medicamento_entry_form_name');
            if(servicioMedicoEntryForm) {
                servicioMedicoEntryForm.classList.add('d-none');
            }
            if(medicamentoEntryForm) {
                medicamentoEntryForm.classList.add('d-none');
            }
            if(medicamentoEntryFormName) {
                medicamentoEntryFormName.classList.add('d-none');
            }
        }

        if(!hasAdminRole && !hasDoctorRole){
            document.getElementById('btn_imprimir_receta').classList.add('d-none');
        }
        
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
    const sintomas= '';
    //const sintomas= document.getElementById('frm_sintomas').value.trim();
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

    // if(sintomas.length < 10){
    //     const errorElement = document.getElementById('invalid_frm_sintomas');
    //     errorElement.textContent = 'Por favor, ingrese síntomas válidos (mínimo 10 caracteres).';
    //     document.getElementById('frm_sintomas').classList.add('is-invalid');
    //     isvalid=false;
    //     if(!error_onComponent) error_onComponent = 'frm_sintomas';
    // }else{
    //     document.getElementById('frm_sintomas').classList.remove('is-invalid');
    // }

    if(diagnostico.length < 10){
        const errorElement = document.getElementById('invalid_frm_diagnostico');
        errorElement.textContent = 'Por favor, ingrese un diagnóstico válido (mínimo 10 caracteres).';
        document.getElementById('frm_diagnostico').classList.add('is-invalid');
        isvalid=false;
        if(!error_onComponent) error_onComponent = 'frm_diagnostico';
    }else{
        document.getElementById('frm_diagnostico').classList.remove('is-invalid');
    }

    // if(indicaciones.length < 10){
    //     const errorElement = document.getElementById('invalid_frm_indicaciones');
    //     errorElement.textContent = 'Por favor, ingrese indicaciones válidas (mínimo 10 caracteres).';
    //     document.getElementById('frm_indicaciones').classList.add('is-invalid');
    //     isvalid=false;
    //     if(!error_onComponent) error_onComponent = 'frm_indicaciones';
    // }else{
    //     document.getElementById('frm_indicaciones').classList.remove('is-invalid');
    // }

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

    const motivosConsulta = [];
    document.querySelectorAll('.motivos_consulta_checkbox').forEach(checkbox => {
        if (checkbox.checked) {
            motivosConsulta.push(checkbox.value);
        }
    });
    consultaData.motivos_consulta = motivosConsulta;

    return consultaData;

}

async function GuardarConsulta(renderMessages=true){
    const consultaData = ValidaConsulta();
    const citaId = document.getElementById('cita_id').value;

    const pacienteId = document.getElementById('paciente_id').value;
    const doctorId = document.getElementById('doctor_id').value;
    const fechaCita = document.getElementById('frm_cita_fecha').value;
    const horaCita = document.getElementById('frm_cita_hora').value;
    const consultaId = document.getElementById('consulta_id').value;
    const citaData = {
        paciente_id: pacienteId,
        doctor_id: doctorId || null,
        fecha_cita: fechaCita,
        hora_cita: horaCita,
        consulta_id: consultaId || null
    };

    if(!consultaData) return;
    showLoading();
    disableButtons();
    try {
        const updatedConsulta = await updateConsulta(consultaData);
        if(citaId){
            await updateCita(citaId, citaData);
        }else{
            if(citaData.fecha_cita && citaData.hora_cita) {
                const newCita = await addCita(citaData);
                document.getElementById('cita_id').value = newCita.id;
            }
        }
        if(renderMessages) renderAlertMessage('Consulta actualizada correctamente.', 'success');
    } catch (error) {
        console.error('Error al actualizar la consulta:', error);
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
        talla: null,
        motivos_consulta: null
    };

    let consultaCreada = null;
    try {
        consultaCreada = await insertConsulta(consultaData);
    } catch (error) {
        console.error("Error al crear la consulta:", error);
        renderAlertMessage("Error al crear la consulta. Por favor, intente nuevamente.", 'danger');
        return;
    }
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

function hideSaveButtons(){
    $('.btn-save').addClass('d-none');
}
function showSaveButtons(){
    $('.btn-save').removeClass('d-none');
}

function ConfirmarEliminarConsulta(consultaId){
    if(!consultaId) return;
    document.getElementById('consulta_id_eliminar').value = consultaId;
    const eliminarConsultaModal = new bootstrap.Modal(document.getElementById('danger-header-modal-delete-consulta'));
    eliminarConsultaModal.show();
}

function eliminarConsulta(){
    const consultaId = document.getElementById('consulta_id_eliminar').value;
    if(!consultaId) return;
    showLoading();
    try {
        deleteConsulta(consultaId);
    } catch (error) {
        console.error('Error al eliminar la consulta:', error);
        renderAlertMessage('Error al eliminar la consulta. Por favor, intente nuevamente.', 'danger', false);
    }finally {
        hideLoading();
        const eliminarConsultaModal = bootstrap.Modal.getInstance(document.getElementById('danger-header-modal-delete-consulta'));
        eliminarConsultaModal.hide();
        // Recargar la tabla de consultas
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = parseInt(urlParams.get('registros')) || 50;
        const actualPage = parseInt(urlParams.get('pagina')) || 1;
        const searchTerm = urlParams.get('busqueda') || '';
        const direccion = urlParams.get('direccion') || 'desc';
        window.location.search = `?registros=${perPage}&pagina=${actualPage}&busqueda=${encodeURIComponent(searchTerm)}&direccion=${direccion}`;
    }
}

async function ImprimirReceta(){

    if(document.getElementById('consulta_estatus').value.toLowerCase() !== 'abierta'){
        //la consulta ya fue guardada, solo imprimimos
        downloadRecetaPdf(document.getElementById('receta').value ? deobfuscate( document.getElementById('receta').value) : null);
        return;
    }


    hideSaveButtons();
    document.getElementById('servicio_medico_entry_form').classList.add('d-none');
    document.getElementById('medicamento_entry_form').classList.add('d-none');
    document.getElementById('medicamento_entry_form_name').classList.add('d-none');
    try {
        const consultaData = ValidaConsulta();
        if (!consultaData) return;
        disableButtons();
        try {
            const response = await ProcesaReceta();
            if (!response) return;
           
            document.getElementById('receta').value = obfuscate(response.uuid);

            consultaData.estatus = 'completada';
            const servicios = sessionStorage.getItem('servicios_medicos');
            let createOrdenClinica = false;
            let serviciosSolicitadosOrdenClinica = [];
            consultaData.servicios_medicos = servicios ? JSON.parse(servicios) : [];
            if(consultaData.servicios_medicos && consultaData.servicios_medicos.length > 0){
                consultaData.servicios_medicos.forEach(servicio => {
                    if (servicio.categoria && servicio.categoria.toLowerCase() === 'enfermeria') {
                        consultaData.estatus = 'enfermeria';
                        createOrdenClinica = true;
                        serviciosSolicitadosOrdenClinica.push(servicio);
                    }
                });
            }
            document.getElementById('consulta_estatus').value= consultaData.estatus;
            console.log(consultaData);
            const updatedConsulta = await updateConsulta(consultaData);
            if(createOrdenClinica) {
                consultaData.serviciosSolicitados= serviciosSolicitadosOrdenClinica;
                consultaData.paciente_id = parseInt(document.getElementById('paciente_id').value, 10);
                consultaData.doctor_id = parseInt(document.getElementById('doctor_id').value, 10);
                await createOrdenClinicaPorConsulta(consultaData);
            }
            enableButtons();
            downloadRecetaPdf(response.uuid);
        } catch (error) {
            console.error(error);
            renderAlertMessage('Error al actualizar la consulta. Por favor, intente nuevamente.', 'danger');
            showSaveButtons();
            enableButtons();
        }

    } catch (error) {
        console.error("Error al guardar la consulta:", error);
        renderAlertMessage("Error al guardar la consulta. Por favor, intente nuevamente.", 'danger');
        showSaveButtons();
        enableButtons();
    }
}

async function ProcesaReceta() {
    const pacienteId = document.getElementById('paciente_id').value;
    const consultaId = document.getElementById('consulta_id').value;
    const doctorId = document.getElementById('doctor_id').value;
    const fechaConsulta = document.getElementById('consulta_fecha').innerText;
    const presionArterial = document.getElementById('frm_signos_vitales_presion_arterial').value;
    const temperatura = document.getElementById('frm_signos_vitales_temperatura').value;
    const pulso = document.getElementById('frm_signos_vitales_frecuencia_cardiaca').value;
    const frecuenciaRespiratoria = document.getElementById('frm_signos_vitales_frecuencia_respiratoria').value;
    const saturacionOxigeno = document.getElementById('frm_signos_vitales_saturacion_oxigeno').value;
    const peso = document.getElementById('frm_signos_vitales_peso').value;
    const estatura = document.getElementById('frm_signos_vitales_estatura').value;
    //const talla = document.getElementById('frm_signos_vitales_talla').value;
    const diagnostico = document.getElementById('frm_diagnostico').value;


    // Validate pacienteId, consultaId, and doctorId
    if (!pacienteId) {
        renderAlertMessage("Error al crear la receta. El ID del paciente es obligatorio. Por favor, verifique.", 'danger');
        return;
    }
    if (!consultaId) {
        renderAlertMessage("Error al crear la receta. El ID de la consulta es obligatorio. Por favor, verifique.", 'danger');
        return;
    }
    if (!doctorId) {
        renderAlertMessage("Error al crear la receta. El ID del doctor es obligatorio. Por favor, verifique.", 'danger');
        return;
    }

    const doctorData = document.getElementById('doc_info').value ? JSON.parse(deobfuscate(document.getElementById('doc_info').value)) : null;
    if (!doctorData || !doctorData.id) {
        renderAlertMessage("Error al crear la receta. No se pudo obtener el perfil del doctor. Por favor, inicie sesión nuevamente.", 'danger');
        return;
    }

    const pacienteData = document.getElementById('paciente_info').value ? JSON.parse(deobfuscate(document.getElementById('paciente_info').value)) : null;
    if (!pacienteData || !pacienteData.id) {
        renderAlertMessage("Error al crear la receta. No se pudo obtener la información del paciente. Por favor, verifique.", 'danger');
        return;
    }

    medicamentos = sessionStorage.getItem('medicamentos');
    medicamentos = medicamentos ? JSON.parse(medicamentos) : [];

    servicios_medicos = sessionStorage.getItem('servicios_medicos');
    servicios_medicos = servicios_medicos ? JSON.parse(servicios_medicos) : [];

    const user = JSON.parse(sessionStorage.getItem('user'));
    if (!user) {
        renderAlertMessage("Error al crear la receta. No se pudo obtener el perfil del usuario. Por favor, inicie sesión nuevamente.", 'danger');
        return;
    }

    let fechaConsultaObj = new Date(fechaConsulta);
    if (isNaN(fechaConsultaObj.getTime())) {
       let fconsulta= fechaConsulta.split(' ')[0];
       const partesFecha = fconsulta.split('/');
       if (partesFecha.length === 3) {
              const dia = parseInt(partesFecha[0], 10);
              const mes = parseInt(partesFecha[1], 10) - 1; // Los meses en JavaScript son 0-indexados
              const anio = parseInt(partesFecha[2], 10);
              fechaConsultaObj = new Date(anio, mes, dia);
       }     
    }

    const recetaPayload = {
        paciente_id: pacienteId,
        consulta_id: consultaId,
        doctor_id: doctorId,
        medicamentos: medicamentos,
        fecha_emision: new Date().toISOString(),
        fecha_consulta: fechaConsultaObj.toISOString(),
        nombre_doctor: doctorData.nombre_completo,
        titulo_doctor: doctorData.titulo,
        numero_cedula: doctorData.cedula_profesional,
        telefono_doctor: doctorData.telefono,
        nombre_completo_paciente: pacienteData.nombre+" "+pacienteData.apellido,
        fecha_nacimiento_paciente: pacienteData.fecha_nacimiento,
        edad_paciente: ""+calcularEdad(pacienteData.fecha_nacimiento)+"",
        signos_vitales: {
            presion: presionArterial,
            temperatura: temperatura,
            pulso: pulso,
            frecuencia: frecuenciaRespiratoria,
            saturacion: saturacionOxigeno,
            peso: peso,
            estatura: estatura
        },
        diagnostico: diagnostico,
        servicios_medicos: servicios_medicos,
        created_by: user.user.name
    };

    try {
        const response=await processReceta(recetaPayload);
        return response;
    } catch (error) {
        console.error("Error al generar la receta PDF:", error);
        throw error;
    }
}