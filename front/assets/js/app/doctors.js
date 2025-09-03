async function getDoctores() {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores', {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch doctors: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching doctors:', error);
    }
}

async function  searchDoctorByEmail(email) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores/buscar/email', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify({ email })
        });

        if (!response.ok) {
            throw new Error('Failed to search doctor by email: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function destroyDoctor(id) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores/' + id, {
            method: 'DELETE',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to delete doctor: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function addDoctor(doctorData) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(doctorData)
        });

        if (!response.ok) {
            throw new Error('Failed to add doctor: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function getDoctorInfo(id) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores/' + id, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch doctor info: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function uploadFirma(id, firmaData) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores/' + id + '/firma', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(firmaData)
        });

        if (!response.ok) {
            throw new Error('Failed to upload signature: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function updateDoctor(id, doctorData) {
    try {
        const response = await fetch(apiHost + apiPath + '/doctores/' + id, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(doctorData)
        });

        if (!response.ok) {
            throw new Error('Failed to update doctor: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function loadDoctoresGrid() {
    showLoading();
    const doctores = await getDoctores();
    RenderDoctoresGrid(doctores);
    hideLoading();
}

async function loadDoctoresList() {
    showLoading();
    const doctores = await getDoctores();
    RenderDoctorList(doctores);
    hideLoading();
    document.getElementById('doctor-list').classList.remove('d-none');
}


async function loadDoctorInfo(id) {
    showLoading();
    const doctor = await getDoctorInfo(id);

    if (doctor.nombre_completo !== undefined && doctor.nombre_completo !== null) {
        const partes = doctor.nombre_completo.trim().split(' ');
        // Si hay más de dos partes, los primeros son nombres, el resto apellidos
        if (partes.length > 2) {
            document.getElementById('frm-add-nombres').value += partes.slice(0, partes.length - 2).join(' ');
            document.getElementById('frm-add-apellidos').value += partes.slice(-2).join(' ');
        } else if (partes.length === 2) {
            document.getElementById('frm-add-nombres').value += partes[0];
            document.getElementById('frm-add-apellidos').value += partes[1];
        } else if (partes.length === 1) {
            document.getElementById('frm-add-nombres').value += partes[0];
        }
    }
    if (doctor.titulo !== undefined && doctor.titulo !== null) document.getElementById('frm-add-titulo').value += doctor.titulo;
    if (doctor.cedula_profesional !== undefined && doctor.cedula_profesional !== null) document.getElementById('frm-add-cedula').value += doctor.cedula_profesional;
    if (doctor.universidad !== undefined && doctor.universidad !== null) document.getElementById('frm-add-universidad').value += doctor.universidad;
    if (doctor.especialista_en !== undefined && doctor.especialista_en !== null) document.getElementById('frm-add-especialidad').value += doctor.especialista_en;
    if (doctor.telefono_personal !== undefined && doctor.telefono_personal !== null) document.getElementById('frm-add-telefono_personal').value += doctor.telefono_personal;
    if (doctor.telefono !== undefined && doctor.telefono !== null) document.getElementById('frm-add-telefono').value += doctor.telefono;
    if (doctor.telefono_emergencia !== undefined && doctor.telefono_emergencia !== null) document.getElementById('frm-add-telefono_emergencia').value += doctor.telefono_emergencia;
    if (doctor.fecha_nacimiento !== undefined && doctor.fecha_nacimiento !== null) {
        const fecha = new Date(doctor.fecha_nacimiento);
        const opciones = { day: '2-digit', month: 'short', year: 'numeric' };
        // Formatea la fecha como "23 Oct, 1998"
        const fechaFormateada = fecha.toLocaleDateString('en-US', opciones).replace(',', ',');
        document.getElementById('frm-add-fecha_nacimiento').value += fechaFormateada;
    }
    if (doctor.experiencia !== undefined && doctor.experiencia !== null) document.getElementById('frm-add-experiencia').value += doctor.experiencia;
    if (doctor.direccion !== undefined && doctor.direccion !== null) document.getElementById('frm-add-direccion').value += doctor.direccion;
    if (doctor.firma !== undefined && doctor.firma !== null) {
        const user = JSON.parse(sessionStorage.getItem('user'));
        if (user && user.roles && user.roles.includes('Enfermera')) {
            document.getElementById('frm-firma-preview').classList.add('d-none');
            hideLoading();
            return;
        }
        document.getElementById('frm-firma-preview').src = doctor.firma;
        document.getElementById('frm-firma-preview').classList.remove('d-none');
        document.getElementById('frm-firma-button-delete').classList.remove('d-none');
    }
    hideLoading();
}

function RenderDoctoresGrid(doctores) {
    const contenedor = document.getElementById('doctor-list');
    contenedor.innerHTML = '';

    const user = JSON.parse(sessionStorage.getItem('user'));

    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin', 'Doctor'].some(rol => user.roles.includes(rol));

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

    doctores.forEach(doctor => {
        const card = document.createElement('div');
        card.className = 'col-xxl-3 col-xl-4 col-lg-6 d-flex';
        card.innerHTML = `
        <div class="card shadow flex-fill w-100 mb-0">
         <div class="card-body">
             <div class="d-flex align-items-center justify-content-between mb-3">
              <span class="badge badge-soft-primary">#${doctor.id}</span>
              <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
              <ul class="dropdown-menu p-2">
              <li>
               <a href="doctor-details.php?b=${btoa(doctor.id)}" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>Ver Detalles</a>
              </li>
              ${(hasAdminRole && hasEditPermission) ? `<li> <a href="edit-doctors.php?b=${btoa(doctor.id)}" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Editar</a></li>` : ''}
              ${(hasAdminRole && hasDeletePermission) ? `<li><a href="javascript:ConfirmDeleteDoctor(${doctor.id});" class="dropdown-item d-flex align-items-center"><i class="ti ti-trash me-1"></i>Eliminar</a></li>` : ''}
              </ul>
             </div>
             <div class="text-center mb-3">
              <h6 class="mt-2 mb-1"><a href="doctor-details.php?b=${btoa(doctor.id)}">${doctor.nombre_completo}</a></h6>
              <span class="fs-14">${doctor.especialista_en}</span>
             </div>
             <div class="border p-1 px-2 rounded mb-3">
              <div class="row">
              <div class="col-6 text-center py-2 border-end px-1">
               <h6 class="fw-semibold fs-14 text-truncate">Experiencia</h6>
               <p class="fs-13 mb-0">${doctor.experiencia} Años</p>
              </div>
              <div class="col-6 text-center py-2 px-1">
               <h6 class="fw-semibold fs-14 text-truncate">Titulo</h6>
               <p class="fs-13 mb-0">${doctor.titulo}</p>
               <p class="fs-13 mb-0">${doctor.cedula_profesional}</p>
              </div>
              </div>
             </div>
             <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>${doctor.user.email}</p>
             <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>${doctor.telefono === null ? 'N/A' : doctor.telefono}</p>
         </div>
        </div>
        `;
        contenedor.appendChild(card);
    });
}

function RenderDoctorList(doctores) {
    const contenedor = document.getElementById('doctor-list');

    const user = JSON.parse(sessionStorage.getItem('user'));

    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin', 'Doctor'].some(rol => user.roles.includes(rol));

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');
    const tbody = document.querySelector('#doctors-table tbody');
    tbody.innerHTML = '';
    doctores.forEach(doctor => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${doctor.id}</td>
            <td><a href="doctor-details.php?b=${btoa(doctor.id)}">${doctor.nombre_completo}</a></td>
            <td>${doctor.titulo}</td>
            <td>${doctor.experiencia} Años</td>
            <td>${doctor.user.email}</td>
            <td>${doctor.telefono === null ? 'N/A' : doctor.telefono}</td>
            <td>
                <div class="dropdown">
                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        ${hasEditPermission ? `<li><a href="edit-doctors.php?b=${btoa(doctor.id)}" class="dropdown-item">Editar</a></li>` : ''}
                        ${hasDeletePermission ? `<li><a href="javascript:void(0);" class="dropdown-item" onclick="ConfirmDeleteDoctor(${doctor.id});">Eliminar</a></li>` : ''}
                    </ul>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    });
    document.getElementById('total-doctors').innerText = doctores.length;
}

async function LookForUser(){
    showLoading();
    document.getElementById('user_not_found_alert').classList.add('d-none');
    const emailInput = document.getElementById('email_user').value;
    try {
        const doctor = await searchDoctorByEmail(emailInput);
        if (doctor) {
            hideLoading();
            document.getElementById('user_not_found_message').innerHTML = `<strong>Error - </strong> Correo electronco ya registrado como doctor`;
            document.getElementById('user_not_found_alert').classList.remove('d-none');
            hideLoading();
            return;
        } 
    } catch (error) {
        if (error instanceof Error && error.message.includes('Failed to search doctor by email: Not Found')) {
            // El email no existe como doctor, es correcto para agregarlo
            // No mostrar alerta de error, continuar con la búsqueda de usuario
            // Opcional: puedes registrar en consola si lo deseas
        } else {
            document.getElementById('user_not_found_message').innerHTML = `<strong>Error - </strong> ${error.message}`;
            document.getElementById('user_not_found_alert').classList.remove('d-none');
            hideLoading();
            console.error('Error searching doctor:', error);
            return;
        }
    }

    try {
        const user = await searchUserByEmail(emailInput);
        if (user) {
            document.getElementById('doctor-id').value = user.id;
            document.getElementById('user-selection').classList.add('d-none');
            document.getElementById('doctor-info').classList.remove('d-none');
            hideLoading();
        } else {
            document.getElementById('user_not_found_message').innerHTML = `<strong>Error - </strong> Correo electrónico no registrado`;
            document.getElementById('user_not_found_alert').classList.remove('d-none');
            hideLoading();
        }
    } catch (error) {
          document.getElementById('user_not_found_message').innerHTML = `<strong>Error - </strong> ${error.message}`;
          document.getElementById('user_not_found_alert').classList.remove('d-none');
          hideLoading();
    } finally {
        
    }
  
}

async function InsertDoctor() {
    showLoading();
    const doctorData = {
        nombre_completo: document.getElementById('frm-add-nombres').value+" "+document.getElementById('frm-add-apellidos').value,
        especialista_en: document.getElementById('frm-add-especialidad').value,
        experiencia: parseInt(document.getElementById('frm-add-experiencia').value) || 0,
        titulo: document.getElementById('frm-add-titulo').value,
        cedula_profesional: document.getElementById('frm-add-cedula').value,
        telefono: document.getElementById('frm-add-telefono').value,
        telefono_emergencias: document.getElementById('frm-add-telefono_emergencia').value,
        telefono_personal: document.getElementById('frm-add-telefono_personal').value,
        direccion: document.getElementById('frm-add-direccion').value,
        user_id: document.getElementById('doctor-id').value,
        universidad: document.getElementById('frm-add-universidad').value
    };

    try {
        await addDoctor(doctorData);

        hideLoading();
        window.location.href = "doctors.php";
    } catch (error) {
        console.error('Error adding doctor:', error);
    }
}

async function DeleteDoctor() {
    const id = document.getElementById('delete_doctor_id').value;
    const modal = bootstrap.Modal.getInstance(document.getElementById('delete_doctor_modal'));
    try {
        await destroyDoctor(id);
        loadDoctoresGrid();
        document.getElementById('delete_doctor_id').value = '';
        modal.hide();
    } catch (error) {
        console.error('Error deleting doctor:', error);
        hideLoading();
    }
}

function ConfirmDeleteDoctor(id) {
    $('#delete_doctor_id').val(id);
    const modal = new bootstrap.Modal(document.getElementById('delete_doctor_modal'));
    modal.show();
}

async function cargarFirmaDoctor() {
    const urlParams = new URLSearchParams(window.location.search);
    const b = urlParams.get('b');
    if (!b || isNaN(parseInt(atob(b)))) {
        return;
    }

    const id = parseInt(atob(b));

    const fileInput = document.getElementById('frm-firma-inputfile');
    if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
        console.error('No file selected for signature upload.');
        return;
    }

    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = async function (e) {
        const base64Data = e.target.result;
        const firmaData = { firma: base64Data };
        try {
            await uploadFirma(id, firmaData);
            // Opcional: mostrar mensaje de éxito o actualizar UI
            document.getElementById('frm-firma-preview').src = base64Data;
            document.getElementById('frm-firma-button-delete').classList.remove('d-none');
            document.getElementById('frm-firma-preview').classList.remove('d-none');
        } catch (error) {
            console.error('Error uploading signature:', error);
        }
    };

    reader.readAsDataURL(file);
}

async function eliminarFirmaDoctor() {
    const urlParams = new URLSearchParams(window.location.search);
    const b = urlParams.get('b');
    if (!b || isNaN(parseInt(atob(b)))) {
        return;
    }

    const id = parseInt(atob(b));

    const firmaData = { firma: null };
    try {
        await uploadFirma(id, firmaData);
        document.getElementById('frm-firma-preview').src = '';
        document.getElementById('frm-firma-preview').classList.add('d-none');
        document.getElementById('frm-firma-button-delete').classList.add('d-none');
    } catch (error) {
        console.error('Error deleting signature:', error);
    }
}

async function EditDoctorInfo() {

    const urlParams = new URLSearchParams(window.location.search);
    const b = urlParams.get('b');
    if (!b || isNaN(parseInt(atob(b)))) {
        return;
    }

    const id = parseInt(atob(b));

    const doctorData = {
        nombre_completo: document.getElementById('frm-add-nombres').value+" "+document.getElementById('frm-add-apellidos').value,
        especialista_en: document.getElementById('frm-add-especialidad').value,
        experiencia: parseInt(document.getElementById('frm-add-experiencia').value) || 0,
        titulo: document.getElementById('frm-add-titulo').value,
        cedula_profesional: document.getElementById('frm-add-cedula').value,
        telefono: document.getElementById('frm-add-telefono').value,
        telefono_emergencias: document.getElementById('frm-add-telefono_emergencia').value,
        telefono_personal: document.getElementById('frm-add-telefono_personal').value,
        direccion: document.getElementById('frm-add-direccion').value,
        universidad: document.getElementById('frm-add-universidad').value
    };

    try {
        await updateDoctor(id, doctorData);
        window.location.href = "doctors.php";
    } catch (error) {
        console.error('Error updating doctor:', error);
    }
}

async function LoadDoctorInfoToView(id) {
    showLoading();
    try {
        const doctor = await getDoctorInfo(id);
        if (doctor) {
            document.getElementById('doctor-id').innerText = '#'+doctor.id;
            document.getElementById('doctor-nombre').innerText = doctor.nombre_completo;
            document.getElementById('doctor-titulo').innerText = doctor.titulo;
            document.getElementById('doctor-cedula').innerText = doctor.cedula_profesional;
            document.getElementById('doctor-universidad').innerText = doctor.universidad;
            document.getElementById('doctor-especialidad').innerText = doctor.especialista_en;
            document.getElementById('doctor-telefono').innerText = doctor.telefono;
            document.getElementById('doctor-telefono-emergencia').innerText = doctor.telefono_emergencias;
            document.getElementById('doctor-telefono-personal').innerText = doctor.telefono_personal;
            document.getElementById('doctor-fecha-nacimiento').innerText = doctor.fecha_nacimiento;
            document.getElementById('doctor-experiencia').innerText = doctor.experiencia;
            document.getElementById('doctor-direccion').innerText = doctor.direccion;
        }
        hideLoading();
        document.getElementById('doctor-info').classList.remove('d-none');
    } catch (error) {
        console.error('Error loading doctor info:', error);
    }
}