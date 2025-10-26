async function getCitas(pagina = 1, registros = 50, busqueda = '', direccion = 'desc') {
    try {
        let response;
        if(busqueda){
            response = await fetch(apiHost + apiPath + `/citas-pacientes/buscar?nombre_paciente=${encodeURIComponent(busqueda)}&page=${pagina}&per_page=${registros}&direccion=${direccion}`, {
                method: 'GET',
                headers: headersRequest
            });
        } else {
            response = await fetch(apiHost + apiPath + `/citas-pacientes?page=${pagina}&per_page=${registros}&direccion=${direccion}`, {
                method: 'GET',
                headers: headersRequest
            });
        }
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function getCitaById(citaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/${citaId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function addCita(citaData) {
    try {
        const response = await fetch(apiHost + apiPath + '/citas-pacientes', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(citaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function updateCita(citaId, citaData) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/${citaId}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(citaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function removeCita(citaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/${citaId}`, { 
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function searchCitaByConsulta(consultaId,per_page=50,page=1) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/buscar?per_page=${per_page}&page=${page}&consulta_id=${consultaId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function searchCitaByPaciente(pacienteId,per_page=20,page=1) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/buscar?per_page=${per_page}&page=${page}&paciente_id=${pacienteId}&direccion=desc`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

async function updateCita(citaId, citaData) {
    try {
        const response = await fetch(apiHost + apiPath + `/citas-pacientes/${citaId}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(citaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
        return error;
    }
}

function renderCitasTable(citas,showActions=true) {
    const tableBody =  $('#citas_info_table tbody')[0];
    tableBody.innerHTML = '';

    const user = JSON.parse(sessionStorage.getItem('user'));

    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin'].some(rol => user.roles.includes(rol));
    const hasDoctorRole = user && user.roles && user.roles.includes('Doctor');
    const hasNurseRole = user && user.roles && user.roles.includes('Enfermera');

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

    citas.forEach(cita => {
        const CitaAunNoIniciada = new Date(cita.fecha_cita) <= new Date();
        //const CitaAunNoIniciada =true;
        const CitaTieneMasDe3Dias = (new Date() - new Date(cita.fecha_cita)) / (1000 * 60 * 60 * 24) > 3;
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>#CT${cita.id}</td>
            <td>${cita.paciente.nombre + ' ' + cita.paciente.apellido}</td>
            <td>${cita.doctor ? "Dr. " + cita.doctor.nombre_completo : 'Sin asignar'}</td>
            <td>${formatDate(cita.fecha_cita)}</td>
            <td>${cita.hora_cita}</td>
            <td>
            ${!CitaAunNoIniciada ? '<span class="badge bg-info">Cita programada</span>' : `
            <span class="badge bg-${cita.atendio_cita ? 'success' : 'danger'}">${cita.atendio_cita ? 'Sí' : 'No'}</span>
            `}
            </td>
            <td>
            ${CitaTieneMasDe3Dias && showActions ? '' : `
            ${CitaAunNoIniciada && hasDoctorRole &&  showActions ? `<button class="btn btn-sm btn-primary" onclick="CrearConsultaDeCita(${cita.id},${cita.paciente_id},${cita.doctor_id})">Entrar a Consulta</button>` : ''}
            ${(hasEditPermission || hasNurseRole) && showActions ? `<button class="btn btn-sm btn-secondary" onclick="showEditCitaModal(${cita.id})">Editar</button>` : ''}
            ${hasAdminRole && hasDeletePermission && showActions ? `<button class="btn btn-sm btn-danger" onclick="showDeleteCitaModal(${cita.id})">Eliminar</button>` : ''}
            `}
            </td>
        `;
        tableBody.appendChild(row);
    });
}

async function LoadCitasTable(pagina = 1, registros = 50, busqueda = '', direccion = 'desc') {
    showLoading();
    showInfoContainer(false);
    try {
        const data = await getCitas(pagina, registros, busqueda, direccion);
        if (data instanceof Error) {
            showAlert('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        renderCitasTable(data.data);
        await LoadPagesControl('citas',data.last_page, registros, data.current_page);
        showInfoContainer(true);
    } catch (error) {
        console.error('Error loading citas:', error);
        renderAlertMessage('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
    } finally {
        hideLoading();
    }
}

async function LoadCitasTablePacienteView(pacienteId, pagina = 1, registros = 50) {
    showLoading();
    try {
        const data = await searchCitaByPaciente(pacienteId, registros, pagina);
        if (data instanceof Error) {
            showAlert('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }   
        renderCitasTable(data.data,false);
        document.getElementById('patient-detail-container').classList.remove('d-none');
    } catch (error) {
        console.error('Error loading citas:', error);
        renderAlertMessage('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
    } finally {
        hideLoading();
    }
}

async function ReloadCitasTable() {
    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') || 50;
    const busqueda = urlParams.get('busqueda') || '';
    const direccion = urlParams.get('direccion') || 'desc';
    const pagina = urlParams.get('pagina') || 1;
    await LoadCitasTable(pagina, registros, busqueda, direccion);
}

async function RenderCitasModalForEdit(cita) {
    document.getElementById('edit_cita_id').value = cita.id;
    document.getElementById('edit_paciente_id').value = cita.paciente_id;
    document.getElementById('edit_doctor_id').value = cita.doctor_id || '';
    document.getElementById('edit_consulta_id').value = cita.consulta_id || '';
    document.getElementById('edit_nota_cita').value = cita.notas || '';

    document.getElementById('edit_fecha_cita').value = cita.fecha_cita;
    document.getElementById('edit_hora_cita').value = cita.hora_cita;
    document.getElementById('edit_paciente_nombre').value = cita.paciente.nombre.charAt(0).toUpperCase() + cita.paciente.nombre.slice(1) + ' ' + cita.paciente.apellido.charAt(0).toUpperCase() + cita.paciente.apellido.slice(1);
    document.getElementById('edit_doctor_nombre').value = cita.doctor ? "Dr. " + cita.doctor.nombre_completo : '';
}

async function BuscarPacienteCitas() {
    const searchInput = document.getElementById('searchPaciente');
    const busqueda = searchInput.value.trim();
    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') || 50;
    const direccion = urlParams.get('direccion') || 'desc';
    window.location.search = `?registros=${registros}&pagina=1&busqueda=${encodeURIComponent(busqueda)}&direccion=${direccion}`;
}

function formatDate(dateString) {
    const dateParts = dateString.match(/^(\d{4})-(\d{2})-(\d{2})/);
    if (!dateParts) {
        console.error('Invalid date format:', dateString);
        return 'Invalid date';
    }
    const [_, year, month, day] = dateParts;
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const monthName = monthNames[parseInt(month, 10) - 1];
    return `${day} ${monthName} ${year}`;
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

async function CrearCita(modalName='add-modal',reloadCitasTable=true) {
    const pacienteId = document.getElementById('frm_paciente_id').value;
    const doctorId = document.getElementById('frm_doctor_id').value;
    const fechaCita = document.getElementById('frm_fecha_cita').value;
    const horaCita = document.getElementById('frm_hora_cita').value;

    if (!pacienteId || !fechaCita || !horaCita) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    if (new Date(fechaCita) <= new Date().setHours(0, 0, 0, 0)) {
        alert('La fecha de la cita no puede ser menor a la fecha actual.');
        return;
    }

    const citaData = {
        paciente_id: pacienteId,
        doctor_id: doctorId || null,
        fecha_cita: fechaCita,
        hora_cita: horaCita
    };

    try {
        const result = await addCita(citaData);
        if (result instanceof Error) {
            renderAlertMessage('Error al crear la cita. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        $(`#${modalName}`).modal('hide');
        renderAlertMessage('Cita creada exitosamente.', 'success');
        if(reloadCitasTable) await ReloadCitasTable();
        document.getElementById('frm_paciente_id').value = '';
        document.getElementById('frm_doctor_id').value = '';
        document.getElementById('frm_fecha_cita').value = '';
        document.getElementById('frm_hora_cita').value = '';
        document.getElementById('frm_paciente_id').value = '';
        document.getElementById('frm_doctor_id').value = '';
    } catch (error) {
        console.error('Error creating cita:', error);
        renderAlertMessage('Error al crear la cita. Inténtalo de nuevo más tarde.', 'danger');
    }
    $('#add-modal').modal('hide');


}

showInfoContainer=function(show) {
    const infoContainer = document.getElementById('citas_info_container');
    if (show) {
        infoContainer.classList.remove('d-none');
    } else {
        infoContainer.classList.add('d-none');
    }
}

async function showEditCitaModal(idCita) {
    document.getElementById('edit_cita_id').value = '';
    document.getElementById('edit_paciente_id').value = '';
    document.getElementById('edit_doctor_id').value = '';
    document.getElementById('edit_consulta_id').value = '';
    try {
        const cita  = await getCitaById(idCita);
        RenderCitasModalForEdit(cita);
        const editModal = new bootstrap.Modal(document.getElementById('edit-modal'));
        editModal.show();
    } catch (error) {
        renderAlertMessage('Error al cargar la cita. Inténtalo de nuevo más tarde.', 'danger');
        console.error('Error fetching cita by ID:', error);
        return;
    }
   
}

async function EditarCita() {
    const citaId = document.getElementById('edit_cita_id').value;
    const pacienteId = document.getElementById('edit_paciente_id').value;
    const doctorId = document.getElementById('edit_doctor_id').value;
    const fechaCita = document.getElementById('edit_fecha_cita').value;
    const horaCita = document.getElementById('edit_hora_cita').value;
    const consultaId = document.getElementById('edit_consulta_id').value;
    const notas = document.getElementById('edit_nota_cita').value;

    if (!pacienteId || !fechaCita || !horaCita) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    if (new Date(fechaCita) < new Date().setHours(0, 0, 0, 0)) {
        alert('La fecha de la cita no puede ser menor a la fecha actual.');
        return;
    }
    const citaData = {
        paciente_id: pacienteId,
        doctor_id: doctorId || null,
        fecha_cita: fechaCita,
        hora_cita: horaCita,
        consulta_id: consultaId || null,
        notas: notas || null
    };
    try {
        const result = await updateCita(citaId, citaData);
        if (result instanceof Error) {
            renderAlertMessage('Error al actualizar la cita. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        $('#edit-modal').modal('hide');
        //renderAlertMessage('Cita actualizada exitosamente.', 'success');
        await ReloadCitasTable();
    } catch (error) {
        console.error('Error updating cita:', error);
        renderAlertMessage('Error al actualizar la cita. Inténtalo de nuevo más tarde.', 'danger');
    }
}

function showDeleteCitaModal(idCita) {
    document.getElementById('cita_id_eliminar').value = idCita;
    const deleteModal = new bootstrap.Modal(document.getElementById('danger-header-modal-delete-cita'));
    deleteModal.show();
}

async function EliminarCita() {
    const citaId = document.getElementById('cita_id_eliminar').value;
    try {
        const result = await removeCita(citaId);
        if (result instanceof Error) {
            renderAlertMessage('Error al eliminar la cita. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        renderAlertMessage('Cita eliminada exitosamente.', 'success');
        await ReloadCitasTable();
    } catch (error) {
        console.error('Error deleting cita:', error);
        renderAlertMessage('Error al eliminar la cita. Inténtalo de nuevo más tarde.', 'danger');
    }finally {
       $('#danger-header-modal-delete-cita').modal('hide');
    }
}

async function CrearConsultaDeCita(citaId,pacienteId,doctorId) {
    if (!doctorId) {
        alert('El doctor es obligatorio para crear una consulta.');
        return;
    }

    const consultaData = {
        paciente_id: parseInt(pacienteId),
        doctor_id: parseInt(doctorId),
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
    try {
            
        //actualizamos la cita para marcar que se atendió
        await updateCita(citaId,{atendio_cita:true});
        
        const result = await insertConsulta(consultaData);
        if (result instanceof Error) {
            renderAlertMessage('Error al crear la consulta. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        window.location.href = `nueva-consulta.php?p=${btoa(result.consulta.id)}&from=cita&cita_id=${btoa(citaId)}`;
    } catch (error) {
        console.error('Error creating consulta:', error);
        renderAlertMessage('Error al crear la consulta. Inténtalo de nuevo más tarde.', 'danger');
    }
}