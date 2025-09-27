async function getMedicamentos(perPage = 10, page = 1, search = '') {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos?per_page='+perPage+'&page='+page+'&nombre='+search, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching medicamentos:', error);
        return null;
    }
    
}

async function addMedicamento(medicamentoData) {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(medicamentoData)
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Network response was not ok');
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error adding medicamento:', error);
        return null;
    }
}

async function getMedicamento(id) {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos/'+id, {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching medicamento:', error);
        return null;
    }
}

async function updateMedicamento(id, medicamentoData) {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos/'+id, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(medicamentoData)
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Network response was not ok');
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error editing medicamento:', error);
        return null;
    }
}

async function deleteMedicamento(id) {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos/'+id, {
            method: 'DELETE',
            headers: headersRequest
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Network response was not ok');
        }

        return true;
    } catch (error) {
        console.error('Error deleting medicamento:', error);
        return false;
    }
}

async function searchMedicamentosByName(name) {
    try {
        const response = await fetch(apiHost+apiPath+'/medicamentos/buscar?query='+encodeURIComponent(name), {
            method: 'GET',
            headers: headersRequest
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching medicamentos:', error);
        return null;
    }
}

async function LoadPagesControl(totalPages,perPage = 50,actualPage=1){
    if (totalPages <= 1) {
         $('.pagination_medicamentos').each(function() {
            $(this).hide();
         });
        return; // No need for pagination if there's only one page
    }
    $('.pagination_medicamentos').each(function() {
        const $paginationContainer = $(this);
        $paginationContainer.empty();

        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('busqueda')||'';
        const searchParam = searchTerm ? `&busqueda=${encodeURIComponent(searchTerm)}` : '';

        if (actualPage !== 1) {
            const prevItem = $('<li>', { class: 'page-item' });
            prevItem.html(`<a class="page-link" href="medicamentos-catalog.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="medicamentos-catalog.php?registros=${perPage}&pagina=${i}${searchParam}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="medicamentos-catalog.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}

async function renderMedicamentosTable(perPage = 50, page = 1, search = '') {
    showLoading();

    const medicamentos = await getMedicamentos(perPage, page, search);
    if (!medicamentos) {
        console.error('No se pudieron obtener los medicamentos');
        return;
    }

    const tableBody = document.querySelector('#user_table tbody');
    tableBody.innerHTML = '';

    medicamentos.data.forEach((medicamento, index) => {
        const row = document.createElement('tr');
        const user = sessionStorage.user ? JSON.parse(sessionStorage.user) : null;
        row.innerHTML = `
            <td>${(page - 1) * perPage + index + 1}</td>
            <td> <a href="javascript:void(0);" class="text-primary" onclick="LoadMedicamentoToView(${medicamento.id});">${medicamento.nombre}</a></td>
            <td>${medicamento.nombre_generico}</td>
            <td>${medicamento.presentacion}</td>
            <td>${medicamento.controlado ? 'Sí' : 'No'}</td>
            <td>
             ${(user && user.permissions && user.permissions.includes('modificar')) ?
                `<a href="javascript:LoadMedicamentoToEdit(${medicamento.id});" class="btn btn-sm btn-primary">Editar</a>` : '&nbsp;'
            }
            ${(user && user.permissions && user.permissions.includes('borrar')) ? 
                `<a href="javascript:DeleteMedicamento(${medicamento.id});" class="btn btn-sm btn-danger">Eliminar</a>` : '&nbsp;'
            }
            </td>
        `;
        tableBody.appendChild(row);
    });

    LoadPagesControl(medicamentos.last_page, perPage, page);
    hideLoading();
    document.querySelector('.info').classList.remove('d-none');
    document.getElementById('total_medicamentos').textContent = medicamentos.total;
}

function BuscarMedicamento(){
    const searchInput = document.getElementById('searchInput');
    window.searchTerm = searchInput.value.trim();
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    //const page = parseInt(urlParams.get('pagina')) || 1;
    //renderMedicamentosTable(perPage, 1, searchTerm);
    window.location.search = `?registros=${perPage}&pagina=1&busqueda=${encodeURIComponent(searchTerm)}`;
}

async function InsertMedicamento(){
    if(document.getElementById('edit_medicamento_id').value){
        EditMedicamento(document.getElementById('edit_medicamento_id').value);
        return;
    }
    const medicamentoData = {
        nombre: document.getElementById('nombre').value,
        nombre_generico: document.getElementById('nombre_generico').value,
        presentacion: document.getElementById('presentacion').value,
        via_administracion: document.getElementById('via_administracion').value,
        concentracion: document.getElementById('concentracion').value,
        unidad: document.getElementById('unidad').value,
        controlado: document.getElementById('controlado').value,
        descripcion: document.getElementById('descripcion').value
    };

    const result = await addMedicamento(medicamentoData);
    if (result) {
        // Aquí puedes agregar lógica adicional, como cerrar el modal o actualizar la tabla
        $('#add_medicamento').modal('hide');
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = parseInt(urlParams.get('registros')) || 50;
        const page = parseInt(urlParams.get('pagina')) || 1;
        const buscar = urlParams.get('busqueda') || '';
        cleanForm();
        renderMedicamentosTable(perPage, page, buscar);
    } else {
        console.error('Error al agregar medicamento');
    }
}

async function LoadMedicamentoToEdit(id) {
    const medicamento = await getMedicamento(id);
    if (!medicamento) {
        console.error('Medicamento no encontrado');
        return;
    }

    // Rellenar el formulario de edición con los datos del medicamento
    document.getElementById('nombre').value = medicamento.nombre;
    document.getElementById('nombre_generico').value = medicamento.nombre_generico;
    document.getElementById('presentacion').value = medicamento.presentacion;
    document.getElementById('via_administracion').value = medicamento.via_administracion;
    document.getElementById('concentracion').value = medicamento.concentracion;
    document.getElementById('unidad').value = medicamento.unidad;
    document.getElementById('controlado').value = medicamento.controlado ? '1' : '0';
    document.getElementById('descripcion').value = medicamento.descripcion;
    document.getElementById('edit_medicamento_id').value = medicamento.id;

    // Mostrar el modal de edición
    $('#add_medicamento').modal('show');
}

async function EditMedicamento(id) {
    const medicamentoData = {
        nombre: document.getElementById('nombre').value,
        nombre_generico: document.getElementById('nombre_generico').value,
        presentacion: document.getElementById('presentacion').value,
        via_administracion: document.getElementById('via_administracion').value,
        concentracion: document.getElementById('concentracion').value,
        unidad: document.getElementById('unidad').value,
        controlado: document.getElementById('controlado').value,
        descripcion: document.getElementById('descripcion').value
    };

    const result = await updateMedicamento(id, medicamentoData);
    if (result) {
        // Aquí puedes agregar lógica adicional, como cerrar el modal o actualizar la tabla
        $('#add_medicamento').modal('hide');
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = parseInt(urlParams.get('registros')) || 50;
        const page = parseInt(urlParams.get('pagina')) || 1;
        const buscar = urlParams.get('busqueda') || '';
        cleanForm();
        renderMedicamentosTable(perPage, page, buscar);
    } else {
        console.error('Error al editar medicamento');
    }
}

async function DeleteMedicamento(id){
    const result = await deleteMedicamento(id);
    if (result) {
        // Aquí puedes agregar lógica adicional, como actualizar la tabla
        const urlParams = new URLSearchParams(window.location.search);
        const perPage = parseInt(urlParams.get('registros')) || 50;
        const page = parseInt(urlParams.get('pagina')) || 1;
        const buscar = urlParams.get('busqueda') || '';
        renderMedicamentosTable(perPage, page, buscar);
    } else {
        console.error('Error al eliminar medicamento');
    }
}

async function LoadMedicamentoToView(id) {
    const medicamento = await getMedicamento(id);
    if (!medicamento) {
        console.error('Medicamento no encontrado');
        return;
    }

    // Rellenar el formulario de vista con los datos del medicamento
    document.getElementById('view_nombre').textContent = medicamento.nombre;
    document.getElementById('view_nombre_generico').textContent = medicamento.nombre_generico;
    document.getElementById('view_presentacion').textContent = medicamento.presentacion;
    document.getElementById('view_via_administracion').textContent = medicamento.via_administracion;
    document.getElementById('view_concentracion').textContent = medicamento.concentracion;
    document.getElementById('view_unidad').textContent = medicamento.unidad;
    document.getElementById('view_controlado').textContent = medicamento.controlado ? 'Sí' : 'No';
    document.getElementById('view_descripcion').textContent = medicamento.descripcion;

    // Mostrar el modal de vista
    $('#view_medicamento').modal('show');
}

function cleanForm() {
    document.getElementById('nombre').value = '';
    document.getElementById('nombre_generico').value = '';
    document.getElementById('presentacion').value = '';
    document.getElementById('via_administracion').value = '';
    document.getElementById('concentracion').value = '';
    document.getElementById('unidad').value = '';
    document.getElementById('controlado').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('edit_medicamento_id').value = '';
}