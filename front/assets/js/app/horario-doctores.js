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
    }
}

async function renderHorariosTable(doctorId) {
    const horarios = await getHorariosByDoctorId(doctorId);
    const tableBody = document.getElementById('horarios_table_body');
    tableBody.innerHTML = '';

    horarios.forEach(horario => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${horario.id}</td>
            <td>${horario.dia_semana}</td>
            <td>${horario.hora_inicio}</td>
            <td>${horario.hora_fin}</td>
        `;
        tableBody.appendChild(row);
    });
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