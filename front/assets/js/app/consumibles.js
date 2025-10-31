async function getConsumibles(per_page = 50, page = 1,busqueda='',activo=false) {
    try {
        const url=(busqueda && busqueda.trim() !=='') ? apiHost + apiPath + `/consumibles?per_page=${per_page}&page=${page}&search=${encodeURIComponent(busqueda)}` : apiHost + apiPath + `/consumibles?per_page=${per_page}&page=${page}`;
        if(activo){
            url.concat('&activo=true');
        }
        const response = await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to fetch consumibles: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consumibles:', error);
        throw error;
    }
}

async function insertConsumible(consumible) {
    try {
        const response = await fetch(apiHost + apiPath + '/consumibles', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(consumible)
        });
        if(response.status === 422){
            responseData=await response.json()
            console.log(responseData.errors);
            const errorMessages = Object.entries(responseData.errors)
                .map(([key, value]) => `${key}: ${value}`)
                .join(', ');
            const error = new Error('Validation error: ' + errorMessages);
            throw error;
        }
        if (!response.ok) {
            throw new Error('Failed to insert consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        console.error('Error inserting consumible:', error);
        throw error;
    }   
}

async function getConsumibleById(consumibleId) {
    try {
        const response = await fetch(apiHost + apiPath + '/consumibles/' + consumibleId, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to fetch consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consumible:', error);
        throw error;
    }
}

async function updateConsumible(id, consumible) {
    try {
        const response = await fetch(apiHost + apiPath +`/consumibles/${id}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(consumible)
        });
        if(response.status === 422){
            responseData=await response.json()
            console.log(responseData.errors);
            const errorMessages = Object.entries(responseData.errors)
                .map(([key, value]) => `${key}: ${value}`)
                .join(', ');
            const error = new Error('Validation error: ' + errorMessages);
            throw error;
        }
        if (!response.ok) {
            throw new Error('Failed to update consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        console.error('Error updating consumible:', error);
        throw error;
    }
}

async function deleteConsumible(id) {
    try {
        const response = await fetch(apiHost + apiPath +`/consumibles/${id}`, {
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to delete consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        console.error('Error deleting consumible:', error);
        throw error;
    }
}

async function renderConsumiblesTable(consumibles) {
    const tableBody = document.getElementById('consumibles_table_body');
    tableBody.innerHTML = '';

    const user = sessionStorage.user ? JSON.parse(sessionStorage.user) : null;
    const hasAdminRole = user && user.roles && ['Admon', 'Main Admin'].some(rol => user.roles.includes(rol));
    const hasEditPermission = (user && user.permissions && user.permissions.includes('modificar'));
    const hasDeletePermission = (user && user.permissions && user.permissions.includes('borrar'));

    try {
        consumibles.forEach(consumible => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${consumible.id}</td>
                <td>${consumible.codigo_interno}</td>
                <td>${consumible.nombre}</td>
                <td>${consumible.descripcion}</td>
                <td>${consumible.stock_actual}</td>
                <td>${consumible.categoria.nombre}</td>
                <td>
                    <a href="javascript:void(viewConsumibleDetails(${consumible.id}));" class="btn btn-lg btn-info me-1" title="Ver Detalle"><i class="ti ti-eye"></i></a>
                    ${hasEditPermission && hasAdminRole ? `<a href="javascript:void(OpenEditFormConsumible(${consumible.id}));" class="btn btn-lg btn-light border me-1"><i class="ti ti-pencil"></i></a>` : ''}
                    ${hasDeletePermission && hasAdminRole ? `<a href="javascript:openConfirmDeleteConsumibleModal(${consumible.id});" class="btn btn-lg btn-danger"><i class="ti ti-trash"></i></a>` : ''}
                </td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error rendering consumibles table:', error);
    }
}

function renderConsumibleInForm(consumible,prefix='') {
    document.getElementById(prefix + 'consumible_id').value = consumible.id;
    document.getElementById(prefix + 'codigo_interno').value = consumible.codigo_interno;
    document.getElementById(prefix + 'nombre').value = consumible.nombre;
    document.getElementById(prefix + 'descripcion').value = consumible.descripcion;
    document.getElementById(prefix + 'unidad_medida').value = consumible.unidad_medida;
    document.getElementById(prefix + 'stock_minimo').value = consumible.stock_minimo;
    document.getElementById(prefix + 'precio_unitario_promedio').value = consumible.precio_unitario_promedio;
    document.getElementById(prefix + 'costo_unitario_promedio').value = consumible.costo_unitario_promedio;
    document.getElementById(prefix + 'categoria_consumible').value = consumible.categoria_id;
    if(consumible.es_activo){
        document.getElementById(prefix + 'es_activo').checked = true;
    } else{
        document.getElementById(prefix + 'es_activo').checked = false;
    }
    if(prefix==='view_'){
        document.getElementById(prefix + 'categoria_consumible').value = consumible.categoria.nombre;
    }

}


async function loadDataTableConsumibles(per_page = 50, page = 1, busqueda='') {
    showLoading();
    try {
        const result= await getConsumibles(per_page, page, busqueda);
        renderConsumiblesTable(result.data);
        await LoadPagesControl('consumibles',result.last_page, per_page, page);
        document.getElementById('consumibles_container').classList.remove('d-none');
    } catch (error) {
        console.error('Error loading consumibles:', error);
    } finally {
        hideLoading();
    }
}

async function loadSelectCategoriasConsumibles() {
    try {
        const categorias = await getCategoriasConsumibles(1,300);
        const data = categorias.data;
        data.sort((a, b) => a.nombre.localeCompare(b.nombre));
        renderSelectCategoriasConsumibles(data, 'categoria_consumible');
        const selectElement = document.getElementById('categoria_consumible');
        if (selectElement && selectElement.options.length > 0) {
            selectElement.selectedIndex = 0;
        }
    } catch (error) {
        renderAlertMessage('Hubo un error al cargar las categorías de consumibles.', 'danger');
        throw error;
    }
}

async function reloadDataTableConsumibles() {
    const urlParams = new URLSearchParams(window.location.search);
    const per_page = urlParams.get('registros') ? parseInt(urlParams.get('registros')) : 50;
    const page = urlParams.get('pagina') ? parseInt(urlParams.get('pagina')) : 1;
    const busqueda = urlParams.get('busqueda') ? urlParams.get('busqueda') : '';
    await loadDataTableConsumibles(per_page, page, busqueda);
}

async function openNewConsumibleModal() {
    const form = document.getElementById('form-consumible');
    if (form) {
        form.reset();
    } else {
        console.error('Form with id "form-consumible" not found.');
    }
    document.getElementById('consumible_id').value = '';
    const modal = new bootstrap.Modal(document.getElementById('form-modal-consumibles-add'));
    modal.show();
}

function validamosFormularioConsumible() {
    const form = document.getElementById('form-consumible');
    if (!form) {
        console.error('Form with id "form-consumible" not found.');
        return false;
    }
    return form.checkValidity();
}

async function agregarConsumible(){

    const invalidInputs = document.querySelectorAll('.is-invalid');
    invalidInputs.forEach(input => input.classList.remove('is-invalid'));

    const form = document.getElementById('form-consumible');
    if(!validamosFormularioConsumible()){
        form.reportValidity();
        return;
    }

    const esActivo = document.getElementById('es_activo').checked ? true : false;
console.log(esActivo);
    const consumible = {
        codigo_interno: document.getElementById('codigo_interno').value,
        nombre: document.getElementById('nombre').value,
        descripcion: document.getElementById('descripcion').value,
        unidad_medida: document.getElementById('unidad_medida').value,
        stock_minimo: parseInt(document.getElementById('stock_minimo').value),
        precio_unitario_promedio: parseFloat(document.getElementById('precio_unitario_promedio').value),
        costo_unitario_promedio: parseFloat(document.getElementById('costo_unitario_promedio').value),
        categoria_id: parseInt(document.getElementById('categoria_consumible').value),
        es_activo: esActivo
    };

    if(consumible.stock_minimo <= 0 || isNaN(consumible.stock_minimo)){
        const stockMinimoInput = document.getElementById('stock_minimo');
        stockMinimoInput.classList.add('is-invalid');
        return;
    }

    if(consumible.precio_unitario_promedio < 0 || isNaN(consumible.precio_unitario_promedio)){
        const precioInput = document.getElementById('precio_unitario_promedio');
        precioInput.classList.add('is-invalid');
        return;
    }

    if(consumible.costo_unitario_promedio < 0 || isNaN(consumible.costo_unitario_promedio)){
        const costoInput = document.getElementById('costo_unitario_promedio');
        costoInput.classList.add('is-invalid');
        return;
    }

    const modalElement = document.getElementById('form-modal-consumibles-add');
    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
    modalInstance.hide();
    showLoading();
    hideContainerInfo();
    try{
        const response= await insertConsumible(consumible);
        if(response && response.id){
            renderAlertMessage('Consumible agregado exitosamente.','success');
            showContainerInfo();
        }else{
            renderAlertMessage('Hubo un error al agregar el consumible.','danger');
        }
    }catch(error){
        renderAlertMessage('Hubo un error al agregar el consumible. Error: ' + error.message,'danger');
    }finally{
        await reloadDataTableConsumibles();
        hideLoading();
    }
}

async function actualizarConsumible(){

    const invalidInputs = document.querySelectorAll('.is-invalid');
    invalidInputs.forEach(input => input.classList.remove('is-invalid'));
    const form = document.getElementById('form-consumible');
    if(!validamosFormularioConsumible()){
        form.reportValidity();
        return;
    }
    const esActivo = document.getElementById('es_activo').checked ? true : false;
    const consumibleId = document.getElementById('consumible_id').value;
    const consumible = {
        codigo_interno: document.getElementById('codigo_interno').value,
        nombre: document.getElementById('nombre').value,
        descripcion: document.getElementById('descripcion').value,
        unidad_medida: document.getElementById('unidad_medida').value,
        stock_minimo: parseInt(document.getElementById('stock_minimo').value),
        precio_unitario_promedio: parseFloat(document.getElementById('precio_unitario_promedio').value),
        costo_unitario_promedio: parseFloat(document.getElementById('costo_unitario_promedio').value),
        categoria_id: parseInt(document.getElementById('categoria_consumible').value),
        es_activo: esActivo
    };

    const modalElement = document.getElementById('form-modal-consumibles-add');
    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
    modalInstance.hide();

    try {
        const response = await updateConsumible(consumibleId, consumible);
        if (response && response.id) {
            renderAlertMessage('Consumible actualizado exitosamente.', 'success');
        } else {
            renderAlertMessage('Hubo un error al actualizar el consumible.', 'danger');
        }
    } catch (error) {
        renderAlertMessage('Hubo un error al actualizar el consumible. Error: ' + error.message, 'danger');
    } finally {
        await reloadDataTableConsumibles();
        hideLoading();
    }
}

function openConfirmDeleteConsumibleModal(consumibleId) {
    document.getElementById('consumible_id_eliminar').value = consumibleId;
    const modal = new bootstrap.Modal(document.getElementById('danger-modal-delete-consumible'));
    modal.show();
}

async function EliminarConsumible() {
    const consumibleId = document.getElementById('consumible_id_eliminar').value;
    const modalElement = document.getElementById('danger-modal-delete-consumible');
    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
    modalInstance.hide();
    showLoading();
    hideContainerInfo();
    try {
        const response = await deleteConsumible(consumibleId);
        if (response) {
            renderAlertMessage('Consumible eliminado exitosamente.', 'success');
            await reloadDataTableConsumibles();
            showContainerInfo();
        } else {
            renderAlertMessage('Hubo un error al eliminar el consumible.', 'danger');
        }
    } catch (error) {
        renderAlertMessage('Hubo un error al eliminar el consumible.', 'danger');
        console.error(error);
    }finally {
        hideLoading();
    }
}

function hideContainerInfo(){
    document.getElementById('consumibles_container').classList.add('d-none');
}

function showContainerInfo(){
    document.getElementById('consumibles_container').classList.remove('d-none');
}

async function OpenEditFormConsumible(consumibleId){
    try {
        const consumible = await getConsumibleById(consumibleId);
        if (consumible) {
            renderConsumibleInForm(consumible);
            document.getElementById('actualizar_btn').classList.remove('d-none');
            document.getElementById('agregar_btn').classList.add('d-none');
            const modal = new bootstrap.Modal(document.getElementById('form-modal-consumibles-add'));
            modal.show();
        }
    } catch (error) {
        console.error(error);
    }
}

async function viewConsumibleDetails(consumibleId){
    try {
        const consumible = await getConsumibleById(consumibleId);
        console.log(consumible);
        if (consumible) {
            renderConsumibleInForm(consumible,'view_');
            const modal = new bootstrap.Modal(document.getElementById('view-modal-consumibles'));
            modal.show();
        }
    } catch (error) {
        console.error(error);
    }
}

function LookForConsumibleByName(){
    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
    const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;
    const searchInput = document.getElementById('searchInput');
    const busqueda = searchInput.value.trim();
    loadDataTableConsumibles(registros, pagina, busqueda);
}




