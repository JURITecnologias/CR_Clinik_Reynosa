async function getHorariosByDoctorId(doctorId) {
    try {
        const response = await fetch(apiHost + apiPath + '/horarios-doctores/doctor/' + doctorId, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Failed to fetch horarios: ' + response.statusText);
        }

        return await response.json();
    } catch (error) {
        console.error('Error fetching horarios:', error);
        throw error;
    }
}

async function insertHorariosDoctor(horarios) {
    try {
        const response = await fetch(apiHost + apiPath + '/horarios-doctores', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(horarios)
        });
        if (!response.ok) {
            throw new Error('Failed to insert horarios: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        let errorMessage =   'Ya existe un horario para este doctor en el día y horario especificado';
        renderAlert('Error al guardar horario: ' + horarios.dia_semana+" horario: "+horarios.hora_inicio+" a "+horarios.hora_fin+" "+errorMessage, 'danger');
        console.error('Error inserting horario:', error);
        throw error;
    }
}

async function deleteHorario(horarioId){
    try{
        const response = await fetch(apiHost + apiPath + '/horarios-doctores/' + horarioId, {
            method: 'DELETE',
            headers: headersRequest,
        });
        if (!response.ok) {
            throw new Error('Failed to delete horario: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        let errorMessage =   'Error en las comunicaciones intente mas tarde.';
        renderAlert('Error al eliminar horario: ' + horarioId + " " + errorMessage, 'danger');
        console.error('Error inserting horario:', error);
        throw error;
    }
}

async function renderHorariosTable(doctorId) {
    const tableBody = document.getElementById('horarios_table_body');
    tableBody.innerHTML = '';
    try {
        const horarios = await getHorariosByDoctorId(doctorId);

        const user = JSON.parse(sessionStorage.getItem('user'));

        const hasAdminRole = user && user.roles && ['Admon', 'Main Admin', 'Doctor'].some(rol => user.roles.includes(rol));

        const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
        const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');


        if (!horarios || horarios.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="4">No hay horarios configurados</td>`;
            tableBody.appendChild(row);
            return;
        }

        horarios.forEach(horario => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${horario.id}</td>
            <td>${horario.dia_semana}</td>
            <td>${horario.hora_inicio}</td>
            <td>${horario.hora_fin}</td>
            ${hasDeletePermission ? `<td><button class="btn btn-danger btn-sm" onclick="removeHorario(${horario.id})">Eliminar</button></td>` : ''}
        `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        const row = document.createElement('tr');
        row.innerHTML = `<td colspan="4">No hay horarios configurados</td>`;
        tableBody.appendChild(row);
    }
   
}

document.getElementById('frm_doctor_select').addEventListener('change', function() {
    const doctorId = this.value;
    renderHorariosTable(doctorId);
});

async function loadDoctoresSelect() {
    showLoading();
    try {
        const response = await getDoctores();
        const select = document.getElementById('frm_doctor_select');
        response.forEach(doctor => {
            const option = document.createElement('option');
            option.value = doctor.id;
            option.textContent = `Dr. ${doctor.nombre_completo}`;
            select.appendChild(option);
        });
        if(response.length > 0) {
            await renderHorariosTable(response[0].id);
        }
        hideLoading();
        document.getElementById('horarios_doctores_container').classList.remove('d-none');
    } catch (error) {
        console.error('Error loading doctors:', error);
    }
}

function validaHorariosModalForm() {
    const doctorId = document.getElementById('frm_doctor_select').value;
    const diasSeleccionados = Array.from(document.querySelectorAll('input[name="dias[]"]:checked')).map(cb => cb.value);
    const horarios = [];

    for (const dia of diasSeleccionados) {
        const horarioInicioDia = document.querySelector(`input[name="horario_inicial_${dia}"]`).value;
        const horarioFinDia = document.querySelector(`input[name="horario_final_${dia}"]`).value;

        if (!horarioInicioDia || !horarioFinDia) {
            alert(`Por favor, completa los horarios para ${dia}.`);
            return false;
        }

        //validar que el horario final sea mayor al inicial
        // if (horarioFinDia <= horarioInicioDia) {
        //     alert(`El horario final para ${dia} no puede ser menor o igual al horario inicial.`);
        //     return false;
        // }

        horarios.push({
            doctor_id: doctorId,
            dia_semana: dia,
            hora_inicio: horarioInicioDia,
            hora_fin: horarioFinDia
        });
    }

    return horarios;
}

async function modalSubmitHandler() {
    const doctorId = document.getElementById('frm_doctor_select').value;
    const horarios = validaHorariosModalForm();
    cleanAlerts();
    if (horarios.length === 0) {
        alert('No se han seleccionado días o hay errores en el formulario.');
        return;
    }

    try {
        showLoading();
        await Promise.all(horarios.map(h => insertHorariosDoctor(h)));
    } catch (error) {
        console.error('Error inserting horarios:', error);
    }finally {
        hideLoading();
        const modal = bootstrap.Modal.getInstance(document.getElementById('add_horario_modal'));
        modal.hide();
        renderHorariosTable(doctorId);
    }
}

async function removeHorario(horarioId) {
    const doctorId = document.getElementById('frm_doctor_select').value;
    cleanAlerts();
    showLoading();
    document.getElementById('horarios_doctores_container').classList.add('d-none');
    try {
        await deleteHorario(horarioId);
        await renderHorariosTable(doctorId);
        document.getElementById('horarios_doctores_container').classList.remove('d-none');
    } catch (error) {
        console.error('Error deleting horario:', error);
        renderAlert('Error al eliminar horario: ' + error.message, 'danger');
    }   finally {
        hideLoading();
    }
}

function renderAlert(message, type = 'success') {
    const alertPlaceholder = document.getElementById('alerts_container');
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert alert-${type} alert-dismissible" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    alertPlaceholder.append(wrapper);
    alertPlaceholder.classList.remove('d-none');
}


function cleanAlerts() {
    const alertPlaceholder = document.getElementById('alerts_container');
    alertPlaceholder.innerHTML = '';
}
