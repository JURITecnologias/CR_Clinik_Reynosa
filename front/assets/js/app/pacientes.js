async function getPacientes(perPage = 10, page = 1) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes?per_page=' + perPage + '&page=' + page, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch patients: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching patients:', error);
    }
}

async function searchPatientByEmail(email, nombre, apellido) {
    try {
        // Build query string with nombre and apellido
        const params = new URLSearchParams();
        if (nombre) params.append('nombre', nombre);
        if (apellido) params.append('apellido', apellido);

        const url = apiHost + apiPath + '/pacientes/buscar?' + params.toString();

        const response = await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to search patient by email: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error searching patient by email:', error);
    }
}

async function searchPatientByName(perPage, page, nombre) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes/buscar?nombre=' + nombre + '&per_page=' + perPage + '&page=' + page, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch patients: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching patients:', error);
    }
}

async function insertPaciente(pacienteData) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(pacienteData)
        });
        if (!response.ok) {
            if (response.status === 409) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Paciente ya existente');
            }
            throw new Error('Failed to add patient: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function updatePacienteInfo(id, pacienteData) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes/' + id, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(pacienteData)
        });

        if (!response.ok) {
            throw new Error('Failed to update patient: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error updating patient:', error);
    }
}

async function getPacienteById(id) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes/' + id, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch patient: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching patient:', error);
        throw error;
    }
}

async function DeletePaciente(id) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes/' + id, {
            method: 'DELETE',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to delete patient: ' + response.statusText);
        }

    } catch (error) {
        throw error;
    }
}

async function UpdatePaciente(id, pacienteData) {
    try {
        const response = await fetch(apiHost + apiPath + '/pacientes/' + id, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(pacienteData)
        });

        if (!response.ok) {
            throw new Error('Failed to update patient: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function renderPacienteInfoCardList(pacientes) {
    const container = document.getElementById('pacientes_container');
    container.innerHTML = ''; // Clear existing content

    if (!pacientes || pacientes.length === 0) {
        container.innerHTML = '<p>No se encontraron pacientes</p>';
        return;
    }

    const user = JSON.parse(sessionStorage.getItem('user'));
    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin', 'Doctor'].some(rol => user.roles.includes(rol));
    const hasDoctorRole = user && user.roles && user.roles.includes('Doctor');

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');


    pacientes.forEach(paciente => {

        const fechaNacimiento = paciente.fecha_nacimiento
            ? new Date(paciente.fecha_nacimiento)
            : null;
        const opcionesFecha = { day: '2-digit', month: 'short', year: 'numeric' };
        const fechaNacimientoFormateada = fechaNacimiento
            ? fechaNacimiento.toLocaleDateString('es-MX', opcionesFecha)
            : '';

        const card = document.createElement('div');
        card.className = 'col-xl-4 col-md-6 d-flex';
        card.innerHTML = `
                <div class="card shadow flex-fill w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="badge badge-soft-orange"></span>
                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                    <ul class="dropdown-menu p-2">
                        <li>
                        <a href="paciente-detalle.php?b=${btoa(paciente.id)}" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>Ver detalles</a>
                        </li>
                        ${hasEditPermission ? `<li><a href="edit-patient.php?b=${btoa(paciente.id)}" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Editar</a></li>` : ''}
                        ${hasDeletePermission ? `<li><a href="javascript:ConfirmDeletePaciente(${paciente.id},'patients.php');" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Eliminar</a></li>` : ''}
                    </ul>
                    </div>
                    <div class="text-center mb-3">

                    <a href="paciente-detalle.php?b=${btoa(paciente.id)}" class="d-inline-block mb-1 badge badge-soft-primary">#PT${paciente.id}</a>
                    <h6 class="mb-0"><a href="paciente-detalle.php?b=${btoa(paciente.id)}">${paciente.nombre} ${paciente.apellido}</a></h6>
                    </div>
                    <div class="border p-1 rounded mb-3">
                    <div class="row g-0">
                        <div class="col-4 text-center border-end p-1">
                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Fecha de nacimiento</h6>
                        <p class="fs-13 mb-0">${fechaNacimientoFormateada}</p>
                        </div>
                        <div class="col-4 text-center border-end p-1">
                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Género</h6>
                        <p class="fs-13 mb-0">${paciente.sexo}</p>
                        </div>
                        <div class="col-4 text-center p-1">
                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Edad</h6>
                        <p class="fs-13 mb-0">${calcularEdad(paciente.fecha_nacimiento)}</p>
                        </div>
                    </div>
                    </div>
                    <div class ="row">
                    <div class="col-6">
                        <a href="javascript:void(0);" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Agendar cita</a>
                    </div>

                    <div class="col-6">
                        ${hasDoctorRole ? `<button class="btn btn-secondary w-100" onclick="seleccionarPaciente(${paciente.id}, '${paciente.nombre} ${paciente.apellido}')">Iniciar Consulta</button>` : ''}
                    </div>
                    </div>
                </div>
                </div>
            `;
        container.appendChild(card);
    });
}

async function renderPacienteInfoTable(pacientes) {
    showLoading();
    // Asegura que el contenedor esté visible antes de buscar la tabla
    document.getElementById('patients_container').classList.remove('d-none');

    const tbody = document.querySelector('#table_pacientes tbody');
    if (!tbody) {
        hideLoading();
        console.error('No se encontró el elemento tbody en #table_pacientes');
        return;
    }
    tbody.innerHTML = ''; // Clear existing rows
    const user = JSON.parse(sessionStorage.getItem('user'));
    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');
    pacientes.forEach(paciente => {
        const fechaNacimiento = paciente.fecha_nacimiento
            ? new Date(paciente.fecha_nacimiento)
            : null;
        const opcionesFecha = { day: '2-digit', month: 'short', year: 'numeric' };
        const fechaNacimientoFormateada = fechaNacimiento
            ? fechaNacimiento.toLocaleDateString('es-MX', opcionesFecha)
            : '';
        const edad = calcularEdad(paciente.fecha_nacimiento);
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>#PT${paciente.id}</td>
            <td>${paciente.nombre} ${paciente.apellido}</td>
            <td>${paciente.sexo}</td>
            <td>${fechaNacimientoFormateada}</td>
            <td>${edad}</td>
            <td>
                <a href="paciente-detalle.php?b=${btoa(paciente.id)}" class="btn btn-sm btn-primary">Ver detalles</a>
                ${hasEditPermission ? `<a href="edit-patient.php?b=${btoa(paciente.id)}" class="btn btn-sm btn-secondary">Editar</a>` : ''}
                ${hasDeletePermission ? `<a href="javascript:ConfirmDeletePaciente(${paciente.id},'all-patients-list.php');" class="btn btn-sm btn-danger">Eliminar</a>` : ''}
            </td>
        `;
        tbody.appendChild(row);
    });
    hideLoading();
    document.getElementById('patients_container').classList.remove('d-none');
    $('#patients_table').DataTable();
}

async function renderPacienteInfoLayout(paciente) {
    if (!paciente) {
        console.error('No patient data provided');
        return;
    }
    const user = JSON.parse(sessionStorage.getItem('user'));
    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');
    const fechaNacimiento = paciente.fecha_nacimiento
        ? new Date(paciente.fecha_nacimiento)
        : null;
    const opcionesFecha = { day: '2-digit', month: 'short', year: 'numeric' };
    const fechaNacimientoFormateada = fechaNacimiento
        ? fechaNacimiento.toLocaleDateString('es-MX', opcionesFecha)
        : '';
    const edad = calcularEdad(paciente.fecha_nacimiento);

    const fechaAgregado = paciente.created_at
        ? new Date(paciente.created_at)
        : null;
    const opcionesFechaAgregado = { day: '2-digit', month: 'short', year: 'numeric' };
    const fechaAgregadoFormateada = fechaAgregado
        ? fechaAgregado.toLocaleDateString('es-MX', opcionesFechaAgregado)
        : '';

    document.getElementById('patient-fecha-agregado-label').textContent = fechaAgregadoFormateada;

    document.getElementById('patient-nombres-label').textContent = `${paciente.nombre} ${paciente.apellido}`;
    document.getElementById('patient-id-label').textContent = `#PT${paciente.id}`;
    document.getElementById('patient-genero-label').textContent = paciente.sexo || '';
    document.getElementById('patient-fecha-nacimiento-label').textContent = fechaNacimientoFormateada;
    document.getElementById('patient-edad-label').textContent = edad ? `${edad} años` : '';
    document.getElementById('patient-telefono-label').textContent = paciente.telefono || '';
    document.getElementById('patient-email-label').textContent = paciente.email || '';
    document.getElementById('patient-direccion-label').textContent = paciente.direccion || '';
    document.getElementById('patient-curp-label').textContent = paciente.curp || '';
    document.getElementById('patient-nss-label').textContent = paciente.numero_seguro || '';
    document.getElementById('patient-contacto-emergencia-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].contacto_emergencia || '' : '';
    document.getElementById('patient-estado-civil-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].estado_civil || '' : '';

    document.getElementById('patient-enfermedades-cronicas-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].enfermedades_cronicas || '' : '';
    document.getElementById('patient-hospitalizaciones-previas-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].hospitalizaciones_previas || '' : '';
    document.getElementById('patient-medicamentos-actuales-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].medicamentos_actuales || '' : '';
    document.getElementById('patient-alergias-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].alergias || '' : '';
    document.getElementById('patient-vacunas-recientes-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].vacunas_recientes || '' : '';
    document.getElementById('patient-antecedentes-familiares-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].antecedentes_familiares || '' : '';

    document.getElementById('patient-transfusiones-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? (paciente.historial_medico[0].transfusiones ? 'Sí' : 'No') : '';
    document.getElementById('patient-fuma-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? (paciente.historial_medico[0].fuma ? 'Sí' : 'No') : '';
    document.getElementById('patient-alcohol-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? (paciente.historial_medico[0].alcohol ? 'Sí' : 'No') : '';
    document.getElementById('patient-apoyo-psicologico-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? (paciente.historial_medico[0].apoyo_psicologico ? 'Sí' : 'No') : '';
    document.getElementById('patient-frecuencia-alcohol-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].frecuencia_alcohol || '' : '';
    document.getElementById('patient-frecuencia-tabaco-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].frecuencia_tabaco || '' : '';
    document.getElementById('patient-sustancias-psicoactivas-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].sustancias_psicoactivas || '' : '';
    document.getElementById('patient-alimentacion-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].alimentacion || '' : '';
    document.getElementById('patient-actividad-fisica-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].actividad_fisica || '' : '';
    document.getElementById('patient-notas-label').textContent = paciente.historial_medico && paciente.historial_medico.length > 0 ? paciente.historial_medico[0].notas || '' : '';

}

async function loadPacientesGrid(registros, pagina,buscar) {
    showLoading();
    if(buscar && buscar.trim()!==''){
        const pacientes = await searchPatientByName(registros, pagina, buscar);
        if(!pacientes || !pacientes.data || pacientes.data.length===0){
            document.getElementById('pacientes_container').innerHTML = '<p>No se encontraron pacientes</p>';
            document.getElementById('controls_row').classList.add('d-none');
            hideLoading();
            document.getElementById('pacientes_grid_section').classList.remove('d-none');
            return;
        }   
        renderPacienteInfoCardList(pacientes.data);
        hideLoading();
        document.getElementById('pacientes_grid_section').classList.remove('d-none');
        LoadPagesControl(pacientes.last_page, registros, pagina);
        return;
    }
    const pacientes = await getPacientes(registros, pagina);
    renderPacienteInfoCardList(pacientes.data);
    LoadPagesControl(pacientes.last_page, registros, pagina);
    hideLoading();
    document.getElementById('pacientes_grid_section').classList.remove('d-none');
}

async function loadPacienteInForm(id) {
    showLoading();
    document.getElementById('save-basic-info').classList.add('d-none');
    try {
        const paciente = await getPacienteById(id);
        if (!paciente) {
            throw new Error('Paciente no encontrado');
            return; 
        }

        if (paciente.fecha_nacimiento) {
            const fecha = new Date(paciente.fecha_nacimiento);
            const opcionesFecha = { day: '2-digit', month: 'short', year: 'numeric' };
            const fechaFormateada = fecha.toLocaleDateString('es-MX', opcionesFecha).replace(/(\d{2}) ([^.]+)\. (\d{4})/, '$1 $2,$3');
            document.getElementById('frm_add_paciente_fecha_nacimiento').value = fechaFormateada;
        }

        let edad=calcularEdad(paciente.fecha_nacimiento);

        document.getElementById('paciente_id').value = paciente.id;
        document.getElementById('frm_add_paciente_nombres').value = paciente.nombre || '';
        document.getElementById('frm_add_paciente_apellidos').value = paciente.apellido || '';
        document.getElementById('frm_add_paciente_sexo').value = paciente.sexo || '';
        document.getElementById('frm_add_paciente_fecha_nacimiento').value = paciente.fecha_nacimiento || '';
        document.getElementById('frm_add_paciente_edad').value = edad;
        document.getElementById('frm_add_paciente_telefono').value = paciente.telefono || '';
        document.getElementById('frm_add_paciente_email').value = paciente.email || '';
        document.getElementById('frm_add_paciente_direccion').value = paciente.direccion || '';
        document.getElementById('frm_add_paciente_curp').value = paciente.curp || '';
        document.getElementById('frm_add_paciente_nss').value = paciente.numero_seguro || '';
        if (paciente.historial_medico) {
            const historial = paciente.historial_medico[0];
            document.getElementById('paciente_historial_id').value = historial.id || '';
            const estadoCivilSelect = document.getElementById('frm_add_paciente_estado_civil');
            if (estadoCivilSelect) {
                const valorHistorial = (historial.estado_civil || '').trim();
                estadoCivilSelect.value = valorHistorial;
                // Dispara el evento change para Select2
                $('#frm_add_paciente_estado_civil').val(valorHistorial).trigger('change');
            }
            document.getElementById('frm_add_paciente_contacto_emergencia').value = historial.contacto_emergencia || '';
            document.getElementById('frm_add_paciente_enfermedades_cronicas').value = historial.enfermedades_cronicas || '';
            document.getElementById('frm_add_paciente_hospitalizaciones_previas').value = historial.hospitalizaciones_previas || '';
            document.getElementById('frm_add_paciente_medicamentos_actuales').value = historial.medicamentos_actuales || '';
            document.getElementById('frm_add_paciente_alergias').value = historial.alergias || '';
            
            document.getElementById('frm_add_paciente_transfusiones').checked = !!historial.transfusiones;
            document.getElementById('frm_add_paciente_fuma').checked = !!historial.fuma;
            document.getElementById('frm_add_paciente_alcohol').checked = !!historial.alcohol;
            document.getElementById('frm_add_paciente_apoyo_psicologico').checked = !!historial.apoyo_psicologico;


            document.getElementById('frm_add_paciente_vacunas_recientes').value = historial.vacunas_recientes || '';
           
            
            document.getElementById('frm_add_paciente_actividad_fisica').value = historial.actividad_fisica || '';
            document.getElementById('frm_add_paciente_alimentacion').value = historial.alimentacion || '';
            document.getElementById('frm_add_paciente_frecuencia_tabaco').value = historial.frecuencia_tabaco || '';
            document.getElementById('frm_add_paciente_frecuencia_alcohol').value = historial.frecuencia_alcohol || '';
            document.getElementById('frm_add_paciente_sustancias_psicoactivas').value = historial.sustancias_psicoactivas || '';
            document.getElementById('frm_add_paciente_antecedentes_familiares').value = historial.antecedentes_familiares || '';
            document.getElementById('frm_add_paciente_notas').value = historial.notas || '';
            document.getElementById('frm_add_paciente_ocupacion').value = historial.ocupacion || '';
        }
        document.getElementById('save-basic-info').classList.remove('d-none');

    } catch (error) {
        console.error('Error loading patient data into form:', error);
    } finally {
        hideLoading();
    }
}

async function loadPacientesTable(registros, pagina,buscar) {
    showLoading();
    document.getElementById('patients_container').classList.add('d-none');
    if(buscar && buscar.trim()!==''){
        const pacientes = await searchPatientByName(registros, pagina, buscar);
        if(!pacientes || !pacientes.data || pacientes.data.length===0){
            document.getElementById('patients_container').innerHTML = '<p>No se encontraron pacientes</p>';
            document.getElementById('controls_row').classList.add('d-none');
        } else {
            renderPacienteInfoTable(pacientes.data);
            document.getElementById('patients_container').classList.remove('d-none');
            LoadPagesControl(pacientes.last_page, registros, pagina);
        }

        document.getElementById('total-pacientes').textContent = pacientes.total || 0;
        hideLoading();
        return;
    }
    const pacientes = await getPacientes(registros, pagina);
    renderPacienteInfoTable(pacientes.data);
     document.getElementById('total-pacientes').textContent = pacientes.total || 0;
    return;
}

async function loadPacienteLayout(id) {
    showLoading();
    try {
        const paciente = await getPacienteById(id);
        if (!paciente) {
            throw new Error('Paciente no encontrado');
            return;
        }
        await renderPacienteInfoLayout(paciente);
        document.getElementById('patient-detail-container').classList.remove('d-none');
        hideLoading();
    } catch (error) {
        console.error('Error loading patient layout:', error);
    }
}

async function AddPacienteBasicInfo(){
    
    document.getElementById('error-message-container').classList.add('d-none');
    // Obtener la fecha de nacimiento y formatearla a yyyy-mm-dd
    let fechaNacimientoInput = document.getElementById('frm_add_paciente_fecha_nacimiento').value;
    let fechaNacimientoFormateada = '';
    let fechaAGuardar = '';
    if (fechaNacimientoInput) {
        const fecha = new Date(fechaNacimientoInput);
        const yyyy = fecha.getFullYear();
        const mm = String(fecha.getMonth() + 1).padStart(2, '0');
        const dd = String(fecha.getDate()).padStart(2, '0');
        fechaNacimientoFormateada = `${yyyy}-${mm}-${dd}`;
        fechaAGuardar = fechaNacimientoFormateada;
    }

    const pacienteData = {
        nombre: document.getElementById('frm_add_paciente_nombres').value,
        apellido: document.getElementById('frm_add_paciente_apellidos').value,
        sexo: document.getElementById('frm_add_paciente_sexo').value,
        fecha_nacimiento: fechaAGuardar,
        telefono: document.getElementById('frm_add_paciente_telefono').value,
        email: document.getElementById('frm_add_paciente_email').value,
        direccion: document.getElementById('frm_add_paciente_direccion').value,
        curp: document.getElementById('frm_add_paciente_curp').value,
        numero_seguro: document.getElementById('frm_add_paciente_nss').value
    };

    try {
        const newPaciente = await insertPaciente(pacienteData);
        return newPaciente;
    } catch (error) {
        console.log('Error adding patient:', error);
        document.getElementById('error-message').textContent = error.message || 'Error al agregar paciente.';
        document.getElementById('error-message-container').classList.remove('d-none');
        console.error('Error adding patient:', error);
        throw error;
    }
}

async function EditPacienteBasicInfo(){
    showLoading();
    document.getElementById('save-basic-info').classList.add('d-none');
    id = document.getElementById('paciente_id').value;
    document.getElementById('error-message-container').classList.add('d-none');

    // Obtener la fecha de nacimiento y formatearla a yyyy-mm-dd
    let fechaNacimientoInput = document.getElementById('frm_add_paciente_fecha_nacimiento').value;
    let fechaNacimientoFormateada = '';
    let fechaAGuardar = '';
    if (fechaNacimientoInput) {
        const fecha = new Date(fechaNacimientoInput);
        const yyyy = fecha.getFullYear();
        const mm = String(fecha.getMonth() + 1).padStart(2, '0');
        const dd = String(fecha.getDate()).padStart(2, '0');
        fechaNacimientoFormateada = `${yyyy}-${mm}-${dd}`;
        fechaAGuardar = fechaNacimientoFormateada;
    }

    const pacienteData = {
        nombre: document.getElementById('frm_add_paciente_nombres').value,
        apellido: document.getElementById('frm_add_paciente_apellidos').value,
        sexo: document.getElementById('frm_add_paciente_sexo').value,
        fecha_nacimiento: fechaAGuardar,
        telefono: document.getElementById('frm_add_paciente_telefono').value,
        email: document.getElementById('frm_add_paciente_email').value,
        direccion: document.getElementById('frm_add_paciente_direccion').value,
        curp: document.getElementById('frm_add_paciente_curp').value,
        numero_seguro: document.getElementById('frm_add_paciente_nss').value
    };

    try {
        await UpdatePaciente(id,pacienteData);
        document.getElementById('save-basic-info').classList.remove('d-none');
        hideLoading();
        nextTab();
    } catch (error) {
        console.log('Error updating patient:', error);
        document.getElementById('error-message').textContent = error.message || 'Error al actualizar paciente.';
        document.getElementById('error-message-container').classList.remove('d-none');
        console.error('Error updating patient:', error);
        throw error;
    }
}

async function AddPacienteAndHistorial() {
    
    if(!idPacienteGlobal){
        return;
    }
    document.getElementById('save-vitals').classList.add('disabled');
    try {
        const newHistorial = await AddHistorialMedico(idPacienteGlobal);
        window.location.href = 'patients.php';
    }catch (error) {
        console.error('Error adding patient or medical history:', error);
        throw error;
    }finally {
        document.getElementById('save-vitals').classList.remove('disabled');
    }
}

async function EditHistorialPaciente() {
    showLoading();
    document.getElementById('save-vitals').classList.add('d-none');
    const idhistorialData = document.getElementById('paciente_historial_id').value;
    if (!idhistorialData) {
        console.error('Medical History ID is missing');
        return;
    }
    try {
        const updatedHistorial = await EditHistorialMedicoPaciente(idhistorialData);
        window.location.href = 'patients.php';
    } catch (error) {
        document.getElementById('save-vitals').classList.remove('d-none');
        hideLoading();
        console.error('Error updating medical history:', error);
    }
}

function validarCamposFormularioPaciente() {
    // revisar si el email sera requerido  'frm_add_paciente_email',
    const campos = [
        'frm_add_paciente_nombres',
        'frm_add_paciente_apellidos',
        'frm_add_paciente_sexo',
        'frm_add_paciente_fecha_nacimiento',
        'frm_add_paciente_edad',
    ];
    let esValido = true;

    campos.forEach(id => {
        const campo = document.getElementById(id);
        if (campo) {
            campo.classList.remove('is-invalid');
        }
    });

    campos.forEach(id => {
        const campo = document.getElementById(id);
        if (campo) {
            if (id === 'frm_add_paciente_sexo') {
                // Validar que el select no tenga valor vacío o solo espacios
                if (!campo.value.trim() || campo.value.trim() === '') {
                    campo.classList.add('is-invalid');
                    esValido = false;
                } else {
                    campo.classList.remove('is-invalid');
                }
            }else if(id==='frm_add_paciente_edad'){
                const edad = parseInt(campo.value, 10);
                if (isNaN(edad) || edad < 0 || edad > 120) {
                    campo.classList.add('is-invalid');
                    esValido = false;
                }
            }else if (id === 'frm_add_paciente_email') {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(campo.value.trim())) {
                    campo.classList.add('is-invalid');
                    esValido = false;
                }
            } else {
                if (!campo.value.trim()) {
                    campo.classList.add('is-invalid');
                    esValido = false;
                } else {
                    campo.classList.remove('is-invalid');
                }
            }
        }
    });

    return esValido;
}

let idPacienteGlobal = null;
async function ValidaYContinuaHistoral() {
    showLoading();
    document.getElementById('save-basic-info').classList.add('d-none');
    if (validarCamposFormularioPaciente()) {
        try {
            if(idPacienteGlobal){
                nextTab();
                return;
            }
            const newPaciente = await AddPacienteBasicInfo();
            idPacienteGlobal = newPaciente.id;
            nextTab();
        } catch (error) {
            console.error('Error adding patient:', error);

            return;
        } finally {
            hideLoading();
            document.getElementById('save-basic-info').classList.remove('d-none');
            return;
        }
    }
    document.getElementById('save-basic-info').classList.remove('d-none');
    hideLoading();
}

function nextTab() {
    const fieldset = document.querySelector('.form-wizard-content.active');
    const nextFieldset = fieldset?.nextElementSibling;
    const progressBar = document.querySelector('.vertical-tab .nav-pills');

    if (fieldset && nextFieldset && progressBar) {
        fieldset.classList.remove('active'); // Hide current step
        nextFieldset.classList.add('active'); // Show next step

        // Optional: fade effect
        nextFieldset.style.opacity = 0;
        nextFieldset.style.transition = 'opacity 0.5s';
        setTimeout(() => {
            nextFieldset.style.opacity = 1;
        }, 10);

        // Update progress bar state
        const active = progressBar.querySelector('.active');
        if (active) {
            active.classList.remove('active');
            active.classList.add('activated');
            const next = active.nextElementSibling;
            if (next) next.classList.add('active');
        }
    }
}

async function LookForUserByName(page='patients.php'){

    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
    const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;

    window.location.href = page+'?registros='+registros+'&pagina='+pagina+'&busqueda='+document.getElementById('searchInput').value;
}

async function LoadPagesControl(totalPages,perPage = 50,actualPage=1){
    if (totalPages <= 1) {
         $('.pagination_pacientes').each(function() {
            $(this).hide();
         });
        return; // No need for pagination if there's only one page
    }
    $('.pagination_pacientes').each(function() {
        const $paginationContainer = $(this);
        $paginationContainer.empty();

        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('busqueda')||'';
        const searchParam = searchTerm ? `&busqueda=${encodeURIComponent(searchTerm)}` : '';

        if (actualPage !== 1) {
            const prevItem = $('<li>', { class: 'page-item' });
            prevItem.html(`<a class="page-link" href="patients.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="patients.php?registros=${perPage}&pagina=${i}${searchParam}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="patients.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}

function ConfirmDeletePaciente(id,refererer='patients.php'){
    document.getElementById('delete_paciente_id').value = id;
    document.getElementById('delete_paciente_referer').value = refererer;
    const deleteModal = new bootstrap.Modal(document.getElementById('delete_paciente_modal'));
    deleteModal.show();
}
async function RemovePaciente(){
    try {
        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('delete_paciente_modal'));
        const refererer = document.getElementById('delete_paciente_referer').value || 'patients.php';
        deleteModal.hide();
        id= document.getElementById('delete_paciente_id').value;
        await DeletePaciente(id);
        const urlParams = new URLSearchParams(window.location.search);
        const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
        const busqueda = urlParams.get('busqueda') || '';
        const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;

        if(refererer && refererer.trim()!==''){
            if(refererer=='patients.php') loadPacientesGrid(registros, pagina, busqueda);
            if(refererer=='all-patients-list.php') loadPacientesTable(registros, pagina, busqueda);
        }
        
    } catch (error) {
        console.error('Error removing patient:', error);
    } finally {
        hideLoading();
    }
}

function seleccionarPaciente(pacienteId, pacienteNombre) {
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
    
    if(!consultaCreada || !consultaCreada.consulta.id){
        renderAlertMessage("Error al crear la consulta. Por favor, intente nuevamente.", 'danger');
        return;
    }

    window.location.href = `nueva-consulta.php?p=${btoa(consultaCreada.consulta.id)}`;
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

async function LoadConsultasPreviasPaciente(pacienteId){
    showLoading();
    if(!pacienteId){
        hideLoading();
        return;
    }

    try {
        const consultas = await getUltimasCincoConsultasPacienteId(pacienteId,per_page=50);
        renderPacienteUltimasConsultas(consultas.data);
        document.getElementById('patient-detail-container').classList.remove('d-none');
        hideLoading();
    } catch (error) {
        renderAlertMessage("Error al cargar consultas previas. Por favor, intente nuevamente.", 'danger');
        console.error("Error al cargar consultas previas:", error);
    }
}
