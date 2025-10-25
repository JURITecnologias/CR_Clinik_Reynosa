async function getCategoriasConsumibles(pagina = 1, registros = 50, busqueda = '') {
    try {
        const response = await fetch(apiHost + apiPath +`/categoria-consumibles?pagina=${pagina}&registros=${registros}&busqueda=${busqueda}`,{
            method: 'GET',
            headers: headersRequest
        });
        if(!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching categorias consumibles:', error);
        return error;
    }
}

async function getCategoriaConsumibleById(id) {
    try {
        const response = await fetch(apiHost + apiPath +`/categoria-consumibles/${id}`,{
            method: 'GET',
            headers: headersRequest
        });
        if(!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching categoria consumible by ID:', error);
        return error;
    }
}

async function insertCategoriaConsumible(categoriaConsumible) {
    try {
        const response = await fetch(apiHost + apiPath +'/categoria-consumibles', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(categoriaConsumible)
        });
        if(!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error inserting categoria consumible:', error);
        return error;
    }
}

async function updateCategoriaConsumible(id, categoriaConsumible) {
    try {
        const response = await fetch(apiHost + apiPath +`/categoria-consumibles/${id}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(categoriaConsumible)
        });
        if(!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error updating categoria consumible:', error);
        return error;
    }
}
async function deleteCategoriaConsumible(id) {
    try {
        const response = await fetch(apiHost + apiPath +`/categoria-consumibles/${id}`, {
            method: 'DELETE',
            headers: headersRequest
        });
        if(!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error deleting categoria consumible:', error);
        return error;
    }
}

function renderCategoriaConsumibleTable(categoriasConsumibles) {

    const user = JSON.parse(sessionStorage.getItem('user'));
    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin'].some(rol => user.roles.includes(rol));
    const hasDoctorRole = user && user.roles && user.roles.includes('Doctor');
    const hasNurseRole = user && user.roles && user.roles.includes('Enfermera');

    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

    const tableBody = document.getElementById('categorias-consumibles-table-body');
    tableBody.innerHTML = '';
    categoriasConsumibles.forEach(categoria => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${categoria.id}</td>
            <td>${categoria.nombre}</td>
            <td>${categoria.descripcion}</td>
            <td>${(categoria.es_activo) ? 'Activo' : 'Inactivo'}</td>
            <td>
            ${hasAdminRole || hasEditPermission ? `<button class="btn btn-sm btn-primary edit-btn m-2" data-id="${categoria.id}" onclick="loadFormEditCategoriaConsumible(${categoria.id})">Editar</button>` : ''}
            ${hasAdminRole || hasDeletePermission ? `<button class="btn btn-sm btn-danger delete-btn m-2" data-id="${categoria.id}" onclick="openDeleteCategoriaConsumibleModal(${categoria.id})">Eliminar</button>` : ''}
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function renderSelectCategoriasConsumibles(categoriasConsumibles, selectElementId) {
    const selectElement = document.getElementById(selectElementId);
    selectElement.innerHTML = '';

    categoriasConsumibles.forEach(categoria => {
        const option = document.createElement('option');
        option.value = categoria.id;
        option.textContent = categoria.nombre;
        selectElement.appendChild(option);
    });
}

async function loadCategoriasConsumiblesTable() {
    showLoading();
    try {
        const response = await getCategoriasConsumibles();
        if (response && Array.isArray(response.data)) {
            renderCategoriaConsumibleTable(response.data);
            document.getElementById('table_categorias_consumibles_container').classList.remove('d-none');
        } else {
            console.error('Invalid data format for categorias consumibles:', response);
        }
    } catch (error) {
        console.error('Error loading categorias consumibles:', error);
    } finally {
        hideLoading();
    }
}

async function agregarCategoriaConsumible(){
    const modal = document.getElementById('form-modal-categorias-consumibles');
    if (modal) {
        const modalInstance = bootstrap.Modal.getInstance(modal);
        if (modalInstance) {
            modalInstance.hide();
        }
    }

    showLoading();
    document.getElementById('table_categorias_consumibles_container').classList.add('d-none');
    // Implementar la lógica para agregar una nueva categoría de consumibles
    const form = document.getElementById('form-categorias-consumibles');
    const formData = new FormData(form);
    const categoriaConsumible = Object.fromEntries(formData.entries());
    categoriaConsumible.es_activo = formData.get('categoria_estado') === 'Activo' || formData.get('categoria_estado') === '1' ? 1 : 0;

    try {
        const response = await insertCategoriaConsumible(categoriaConsumible);

        if (response) {
            form.reset();
            loadCategoriasConsumiblesTable();
        } else {
            console.error('Error en la respuesta al agregar categoría de consumibles:', response);
            renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
        }
    } catch (error) {
        console.error('Error adding categoria consumible:', error);
        renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
    } finally {
        hideLoading();
    }
}

async function loadFormEditCategoriaConsumible(categoriaId) {
    showLoading();
    try {
        const categoria = await getCategoriaConsumibleById(categoriaId);
        if (categoria) {
            document.getElementById('categoria_id').value = categoriaId;
            document.getElementById('categoria_nombre').value = categoria.nombre;
            document.getElementById('categoria_descripcion').value = categoria.descripcion;
            document.getElementById('categoria_estado').value = categoria.es_activo ? '1' : '0';
            document.getElementById('agregar_btn').classList.add('d-none');
            document.getElementById('actualizar_btn').classList.remove('d-none');
            const modal = new bootstrap.Modal(document.getElementById('form-modal-categorias-consumibles'));
            modal.show();
        }
    } catch (error) {
        console.error('Error loading categoria consumible for edit:', error);
    }
    finally {
        hideLoading();
        
    }
}

async function actualizarCategoriaConsumible(){
    const modal = document.getElementById('form-modal-categorias-consumibles');
    if (modal) {
        const modalInstance = bootstrap.Modal.getInstance(modal);
        if (modalInstance) {
            modalInstance.hide();
        }
    }
    showLoading();
    document.getElementById('table_categorias_consumibles_container').classList.add('d-none');
    // Implementar la lógica para actualizar una categoría de consumibles
    const form = document.getElementById('form-categorias-consumibles');
    const formData = new FormData(form);
    const categoriaConsumible = Object.fromEntries(formData.entries());
    categoriaConsumible.es_activo = formData.get('es_activo') === 'Activo' || formData.get('es_activo') === '1' ? 1 : 0;
    const categoriaId = document.getElementById('categoria_id').value;
    try {
        const response = await updateCategoriaConsumible(categoriaId, categoriaConsumible);
        if (response) {
            form.reset();
            loadCategoriasConsumiblesTable();
        } else {
            console.error('Error en la respuesta al actualizar categoría de consumibles:', response);
            renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
        }
    } catch (error) {
        console.error('Error updating categoria consumible:', error);
        renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
    } finally {
        hideLoading();
    }
}

function openNewCategoriaConsumibleModal() {
    document.getElementById('form-categorias-consumibles').reset();
    document.getElementById('categoria_id').value = '';
    document.getElementById('agregar_btn').classList.remove('d-none');
    document.getElementById('actualizar_btn').classList.add('d-none');
    const modal = new bootstrap.Modal(document.getElementById('form-modal-categorias-consumibles'));
    modal.show();
}

function openDeleteCategoriaConsumibleModal(categoriaId) {
    document.getElementById('categoria_id_eliminar').value = categoriaId;
    const modal = new bootstrap.Modal(document.getElementById('danger-header-modal-delete-categoria'));
    modal.show();
}

async function EliminarCategoria() {
    const categoriaId = document.getElementById('categoria_id_eliminar').value;
    const modal = document.getElementById('danger-header-modal-delete-categoria');
    if (modal) {
        const modalInstance = bootstrap.Modal.getInstance(modal);
        if (modalInstance) {
            modalInstance.hide();
        }
    }
    showLoading();
    document.getElementById('table_categorias_consumibles_container').classList.add('d-none');
    try {
        const response = await deleteCategoriaConsumible(categoriaId);
        if (response) {
            loadCategoriasConsumiblesTable();
        } else {
            console.error('Error en la respuesta al eliminar categoría de consumibles:', response);
            renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
        }
    } catch (error) {
        console.error('Error deleting categoria consumible:', error);
        renderAlertMessage('Hubo un error al procesar la solicitud.', 'danger');
    }
    finally {
        hideLoading();
    }
}