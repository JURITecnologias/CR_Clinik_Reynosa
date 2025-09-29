async function getCitas(pagina = 1, registros = 50, busqueda = '', direccion = 'desc') {
    console.log('Fetching citas with params:', { pagina, registros, busqueda, direccion });
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

function renderCitasTable(citas) {
    const tableBody =  $('#citas_info_table tbody')[0];
    tableBody.innerHTML = '';

     const user = JSON.parse(sessionStorage.getItem('user'));

    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin'].some(rol => user.roles.includes(rol));

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

    citas.forEach(cita => {
        const CitaAunNoIniciada = new Date(cita.fecha_cita) < new Date();
        const CitaTieneMasDe3Dias = (new Date() - new Date(cita.fecha_cita)) / (1000 * 60 * 60 * 24) > 3;
        console.log( 'CitaAunNoIniciada:', CitaAunNoIniciada);
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>#CT${cita.id}</td>
            <td>${cita.paciente.nombre + ' ' + cita.paciente.apellido}</td>
            <td>${cita.doctor ? cita.doctor.nombre_completo : 'Sin asignar'}</td>
            <td>${formatDate(cita.fecha_cita)}</td>
            <td>${cita.hora_cita}</td>
            <td>
            ${!CitaAunNoIniciada ? '<span class="badge bg-info">Cita programada</span>' : `
            <span class="badge bg-${cita.atendio_cita ? 'success' : 'danger'}">${cita.atendio_cita ? 'Sí' : 'No'}</span>
            `}
            </td>
            <td>
            ${!CitaAunNoIniciada || CitaTieneMasDe3Dias? '' : `
            ${cita.atendio_cita ? '' : `<button class="btn btn-sm btn-primary" onclick="CrearConsulta(${cita.id})">Entrar a Consulta</button>`}
            ${hasAdminRole && hasEditPermission ? `<button class="btn btn-sm btn-secondary" onclick="EditarCita(${cita.id})">Editar</button>` : ''}
            ${hasAdminRole && hasDeletePermission ? `<button class="btn btn-sm btn-danger" onclick="EliminarCita(${cita.id})">Eliminar</button>` : ''}
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
        await LoadPagesControl(data.last_page, registros, data.current_page);
        showInfoContainer(true);
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
            prevItem.html(`<a class="page-link" href="citas.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}&direccion=${direccion}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="citas.php?registros=${perPage}&pagina=${i}${searchParam}&direccion=${direccion}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="citas.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}&direccion=${direccion}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}


async function CrearCita() {
    const pacienteId = document.getElementById('frm_paciente_id').value;
    const doctorId = document.getElementById('frm_doctor_id').value;
    const fechaCita = document.getElementById('frm_fecha_cita').value;
    const horaCita = document.getElementById('frm_hora_cita').value;

    if (!pacienteId || !fechaCita || !horaCita) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    const citaData = {
        paciente_id: pacienteId,
        doctor_id: doctorId || null,
        fecha_cita: fechaCita,
        hora_cita: horaCita
    };
    console.log('Creating cita with data:', citaData);

    try {
        const result = await addCita(citaData);
        if (result instanceof Error) {
            renderAlertMessage('Error al crear la cita. Inténtalo de nuevo más tarde.', 'danger');
            return;
        }
        $('#modalCrearCita').modal('hide');
        renderAlertMessage('Cita creada exitosamente.', 'success');
        await ReloadCitasTable();
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