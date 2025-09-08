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
                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>Ver detalles</a>
                        </li>
                        ${hasEditPermission ? `<li><a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Editar</a></li>` : ''}
                        ${hasDeletePermission ? `<li><a href="javascript:ConfirmDeletePaciente(${paciente.id});" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Eliminar</a></li>` : ''}
                    </ul>
                    </div>
                    <div class="text-center mb-3">
                    
                    <a href="patient-details.php" class="d-inline-block mb-1">#PT0025</a>
                    <h6 class="mb-0"><a href="patient-details.php">${paciente.nombre} ${paciente.apellido}</a></h6>
                    </div>
                    <div class="border p-1 rounded mb-3">
                    <div class="row g-0">
                        <div class="col-4 text-center border-end p-1">
                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Última visita</h6>
                        <p class="fs-13 mb-0"></p>
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
                        ${hasDoctorRole ? `<a href="javascript:void(0);" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Iniciar visita</a>` : ''}
                    </div>
                    </div>
                </div>
                </div>
            `;
        container.appendChild(card);
    });
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

function calcularEdad(fechaNacimiento) {
    if (!fechaNacimiento) return null;
    const nacimiento = new Date(fechaNacimiento);
    const hoy = new Date();
    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    const m = hoy.getMonth() - nacimiento.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
        edad--;
    }
    return edad;
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
        numero_seguro_social: document.getElementById('frm_add_paciente_nss').value
    };

    try {
        const newPaciente = await insertPaciente(pacienteData);
        console.log('Patient added successfully:', newPaciente);
        return newPaciente;
    } catch (error) {
        console.log('Error adding patient:', error);
        document.getElementById('error-message').textContent = error.message || 'Error al agregar paciente.';
        document.getElementById('error-message-container').classList.remove('d-none');
        console.error('Error adding patient:', error);
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
        console.log('Patient and medical history added successfully:', newHistorial);
        window.location.href = 'patients.php';
    }catch (error) {
        console.error('Error adding patient or medical history:', error);
        throw error;
    }finally {
        document.getElementById('save-vitals').classList.remove('disabled');
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
            console.log('Patient added successfully:', newPaciente);
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

async function LookForUserByName(){

    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
    const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;

    window.location.href = 'patients.php?registros='+registros+'&pagina='+pagina+'&busqueda='+document.getElementById('searchInput').value;
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

function ConfirmDeletePaciente(id){
    document.getElementById('delete_paciente_id').value = id;
    const deleteModal = new bootstrap.Modal(document.getElementById('delete_paciente_modal'));
    deleteModal.show();
}
async function RemovePaciente(){
    try {
        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('delete_paciente_modal'));
        deleteModal.hide();
        id= document.getElementById('delete_paciente_id').value;
        console.log('Removing patient with ID:', id);
        await DeletePaciente(id);
        const urlParams = new URLSearchParams(window.location.search);
        const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
        const busqueda = urlParams.get('busqueda') || '';
        const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;

        loadPacientesGrid(registros, pagina, busqueda);
    } catch (error) {
        console.error('Error removing patient:', error);
    } finally {
        hideLoading();
    }
}