async function getServiciosMedicos() {
    const response = await fetch(apiHost+apiPath+'/servicios-medicos', {
        method: 'GET',
        headers: headersRequest,
    });

    if (!response.ok) {
        throw new Error('failed to fetch: ' + response.statusText);
    }

    return await response.json();
}

async function addServicioMedico(servicioData) {
    const response = await fetch(apiHost+apiPath+'/servicios-medicos', {
        method: 'POST',
        headers: headersRequest,
        body: JSON.stringify(servicioData)
    });

    if (!response.ok) {
        throw new Error('failed to add: ' + response.statusText);
    }

    return await response.json();
}

async function updateServicioMedico(id, servicioData) {
    const response = await fetch(apiHost+apiPath+'/servicios-medicos/' + id, {
        method: 'PUT',
        headers: headersRequest,
        body: JSON.stringify(servicioData)
    });

    if (!response.ok) {
        throw new Error('failed to update: ' + response.statusText);
    }

    return await response.json();
}

async function deleteServicioMedico(id) {
    const response = await fetch(apiHost+apiPath+'/servicios-medicos/' + id, {
        method: 'DELETE',
        headers: headersRequest
    });

    if (!response.ok) {
        throw new Error('failed to delete: ' + response.statusText);
    }

    return await response.json();
}

async function searchServiciosMedicosByName(name) {
    try {
        const response = await fetch(apiHost+apiPath+'/servicios-medicos/buscar?nombre=' + encodeURIComponent(name), {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('failed to fetch: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function getServicioMedico(id) {
    const response = await fetch(apiHost+apiPath+'/servicios-medicos/' + id, {
        method: 'GET',
        headers: headersRequest
    });

    if (!response.ok) {
        throw new Error('failed to fetch: ' + response.statusText);
    }

    return await response.json();
}

async function LoadServiciosMedicos() {
    showLoading();
    //document.getElementById('servicios_medicos_section').classList.add('d-none');
    const servicios = await getServiciosMedicos();
    const tableBody = document.querySelector('#servicios_medicos_table tbody');
    tableBody.innerHTML = '';
    

    servicios.forEach(servicio => {
        const row = document.createElement('tr');
        const userSession = sessionStorage.user ? JSON.parse(sessionStorage.user) : null;
        row.innerHTML = `
            <td>${servicio.id}</td>
            <td>${servicio.nombre}</td>
            <td>${servicio.categoria}</td>
            <td>
                ${userSession.permissions.includes('modificar') ? `<button class="btn btn-primary btn-sm" onclick="LoadServicioMedico(${servicio.id})">Editar</button>`:''}
                ${userSession.permissions.includes('borrar') ? `<button class="btn btn-danger btn-sm" onclick="RemoveServicioMedico(${servicio.id})">Eliminar</button>`:''}
            </td>
        `;
        tableBody.appendChild(row);
    });
    document.getElementById('total_servicios').innerText = servicios.length;
    hideLoading();
    showTable();
}

async function InsertServicioMedico(){
    if(!document.getElementById('servicio_id') || document.getElementById('servicio_id').value!=''){
        EditServicioMedico();
        return;
    }
    const nombre = document.getElementById('nombre').value;
    const categoria = document.getElementById('categoria').value;

    const servicioData = {
        nombre,
        categoria
    };

    try {
        const newServicio = await addServicioMedico(servicioData);
        LoadServiciosMedicos();
        cleanForm();
        $('#add_servicio').modal('hide');
    } catch (error) {
        console.error('Error al agregar servicio:', error);
    }
}

async function LoadServicioMedico(id) {
    const servicio = await getServicioMedico(id);
    if (servicio) {
        document.getElementById('nombre').value = servicio.nombre;
        document.getElementById('servicio_id').value = servicio.id;
        // Si el valor existe en el select, se selecciona automáticamente
        const categoriaSelect = document.getElementById('categoria');
        const categoriaLower = servicio.categoria ? servicio.categoria.toLowerCase() : '';
        for (let i = 0; i < categoriaSelect.options.length; i++) {
            if (categoriaSelect.options[i].value === categoriaLower) {
            categoriaSelect.selectedIndex = i;
            break;
            }
        }
        document.getElementById('servicio_id').value = servicio.id;
        $('#add_servicio').modal('show');
    }
}

async function EditServicioMedico() {
    const id = document.getElementById('servicio_id').value;
    const nombre = document.getElementById('nombre').value;
    const categoria = document.getElementById('categoria').value;

    const servicioData = {
        nombre,
        categoria
    };

    try {
        await updateServicioMedico(id, servicioData);
        LoadServiciosMedicos();
        cleanForm();
        $('#add_servicio').modal('hide');
    } catch (error) {
        console.error('Error al editar servicio:', error);
    }
}

async function RemoveServicioMedico(id) {

    try {
        await deleteServicioMedico(id);
        LoadServiciosMedicos();
    } catch (error) {
        console.error('Error al eliminar servicio:', error);
    }
}

function hideTable() {
    document.getElementById('servicios_medicos_section').classList.add('d-none');
}

function showTable() {
    document.getElementById('servicios_medicos_section').classList.remove('d-none');
}

function cleanForm(){
    document.getElementById('nombre').value = '';
    document.getElementById('categoria').value = 'medico';
    document.getElementById('servicio_id').value = '';
}

function showAddServicioModal() {
    cleanForm();
    $('#add_servicio').modal('show');
}