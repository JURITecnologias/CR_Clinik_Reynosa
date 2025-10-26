async function getKitconsumibles(per_page=50, page=1, search='') {
    try {
        const url = search !== '' ? `${apiHost + apiPath}/kits-predefinidos?per_page=${per_page}&page=${page}&search=${encodeURIComponent(search)}` :
                                 `${apiHost + apiPath}/kits-predefinidos?per_page=${per_page}&page=${page}`;
        const response = await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });
        return await response.json();
    } catch (error) {
        console.error('Error fetching kit consumibles:', error);
    }
    if (!response.ok) {
        throw new Error('Failed to fetch kit consumibles: ' + response.statusText);
    }
    
}

async function insertKitconsumible(kitconsumible) {
    try {
        const response = await fetch(apiHost + apiPath + '/kits-predefinidos', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(kitconsumible)
        });
        if (!response.ok) {
            throw new Error('Failed to insert kit consumible: ' + response.statusText);
        }  
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function updateKitconsumible(kitconsumibleId, kitconsumible) {
    try {
        const response = await fetch(apiHost + apiPath + '/kits-predefinidos/' + kitconsumibleId, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(kitconsumible)
        });

        if(response.status === 422){
            const errorData = await response.json();
            throw new Error('Validation error: ' + JSON.stringify(errorData.errors));
        }
        if (!response.ok) {
            throw new Error('Failed to update kit consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function removeKit(kitId){
    try{
        const response = await fetch(apiHost + apiPath + '/kits-predefinidos/' + kitId, {
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to delete kit consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function getKitconsumibleById(kitconsumibleId) {
    try {
        const response = await fetch(apiHost + apiPath + '/kits-predefinidos/' + kitconsumibleId, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to fetch kit consumible: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function insertConsumibleToKit(consumibleData) {
    try {
        const response = await fetch(`${apiHost + apiPath}/kit-consumibles`, {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(consumibleData)
        });

        if(response.status === 422){
            const errorData = await response.json();
            throw new Error('Validation error: ' + JSON.stringify(errorData.errors));
        }

        if(response.status === 409){
            const errorData = await response.json();
            throw new Error('Conflict error: ' + JSON.stringify(errorData.message));
        }

        if (!response.ok) {
            throw new Error('Failed to insert consumible to kit: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function deleteConsumibleFromKit(pivot) {
    try{
        const response = await fetch(`${apiHost + apiPath}/kit-consumibles/${pivot}`, {
            method: 'DELETE',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to delete consumible from kit: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

async function getConsumiblekitRelation(kitId, consumibleId) {
    try {
        const response = await fetch(`${apiHost + apiPath}/kit-consumibles?kit_id=${kitId}&consumible_id=${consumibleId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Failed to fetch consumible-kit relation: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw error;
    }
}

function RenderKitConsumibleAccordionItem(kitconsumible) {

    const user = JSON.parse(sessionStorage.getItem('user'));
    const hasEditPermission = user && user.permissions && user.permissions.includes('modificar');
    const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar') ;
    const isAdmin = user && (user.roles.includes('Main Admin') || user.roles.includes('Admon'));


    const accordionItem = document.createElement('div');
    accordionItem.id = `kitconsumible_item_${kitconsumible.id}`;
    accordionItem.classList.add('accordion-item');
    accordionItem.setAttribute('data-bs-toggle', "collapse");
    accordionItem.setAttribute('data-bs-target', `#kitconsumible_detail_${kitconsumible.id}`);
    accordionItem.setAttribute('aria-expanded', "false");
    accordionItem.setAttribute('aria-controls', `kitconsumible_detail_${kitconsumible.id}`);
    accordionItem.innerHTML = `<h2 class="accordion-header" id="kitconsumible_heading_${kitconsumible.id}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#kitconsumible_detail_${kitconsumible.id}" aria-expanded="false" aria-controls="kitconsumible_detail_${kitconsumible.id}">
                                        <span class="badge bg-light text-dark me-2">KIT-${kitconsumible.id.toString().padStart(5, '0')}</span> ${kitconsumible.nombre}
                                        &nbsp;&nbsp;&nbsp;
                                        <span class="m-1"> 
                                            ${hasEditPermission ? `<a href="javascript:EditarKitConsumible(${kitconsumible.id});" class="btn btn-lg btn-light border me-1 " title="Editar"><i class="ti ti-pencil"></i></a>` : ''}
                                            ${hasDeletePermission ? `<a href="javascript:OpenConfirmDeleteKitModal(${kitconsumible.id});" class="btn btn-lg btn-danger me-1 " title="Eliminar"><i class="ti ti-trash"></i></a>` : ''}
                                        </span>
                                    </button>
                                </h2>`;
    const accordionItemDetail = document.createElement('div');
    accordionItemDetail.id = `kitconsumible_detail_${kitconsumible.id}`;
    accordionItemDetail.classList.add('accordion-collapse', 'collapse');
    accordionItemDetail.setAttribute('aria-labelledby', `BorderedheadingOne`);
    accordionItemDetail.setAttribute('data-bs-parent', `#kits_accordion_info`);
    accordionItemDetail.innerHTML = `<div class="accordion-body">
                                       <div class="row" id="kitconsumible_rows_${kitconsumible.id}">
                                       </div>
                                    </div>`;
    accordionItem.appendChild(accordionItemDetail);
    if(kitconsumible.consumibles && kitconsumible.consumibles.length===0) {
         const consumibleRow = document.createElement('div');
        consumibleRow.classList.add('col-md-4');
        consumibleRow.innerHTML = `No hay consumibles asignados a este kit.`;
        accordionItemDetail.querySelector(`#kitconsumible_rows_${kitconsumible.id}`).appendChild(consumibleRow);
        return accordionItem;
    }

    kitconsumible.consumibles.forEach(consumible => {
        const consumibleRow = document.createElement('div');
        consumibleRow.classList.add('col-md-4');
        consumibleRow.innerHTML = `<div class="card">
                                                    <div class="card-header bg-light">
                                                        ${consumible.codigo_interno} - ${consumible.nombre}
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote mb-0">
                                                            <p>Descripcion : ${consumible.descripcion}</p>
                                                            <p>Unidad medida : ${consumible.unidad_medida}</p>
                                                            <p>Stock minimo: ${consumible.stock_minimo}</p>
                                                            <p>Cantidad en kit: ${consumible.pivot.cantidad}</p>
                                                            <p>Stock actual: ${consumible.stock_actual}</p>

                                                        </blockquote>
                                                    </div> <!-- end card body -->
                                                </div> <!-- end card -->`;
        accordionItemDetail.querySelector(`#kitconsumible_rows_${kitconsumible.id}`).appendChild(consumibleRow);

    });
    return accordionItem;
}

function RenderKitConsumibleInForm(kitconsumible) {
    document.getElementById('kit_nombre').value = kitconsumible.nombre;
    document.getElementById('kit_descripcion').value = kitconsumible.descripcion;

    if(kitconsumible.consumibles && kitconsumible.consumibles.length <= 0) {
        return;
    } 

    RenderKitConsumibleDetailsOnTable(kitconsumible.id, kitconsumible.consumibles);
}

function RenderKitConsumibleDetailsOnTable(kitId,kitconsumibledetails) {
    const detailsKitConsumibleTableBody = document.getElementById('kit_consumibles_rows');
    detailsKitConsumibleTableBody.innerHTML = '';
    kitconsumibledetails.forEach(detail => {
        const pivotData = detail.pivot || null;
        const row = document.createElement('tr');
        row.id = `kit_consumible_row_${detail.id}`;
        row.innerHTML = `
            <td>${detail.codigo_interno}</td>
            <td>${detail.nombre}</td>
            <td>${detail.descripcion}</td>
            <td>${detail.unidad_medida}</td>
            <td>${pivotData.cantidad}</td>
            <td>
                <input type="hidden" name="kit_pivotdata_id" class="kit_consumible_id_${detail.id}" value="">
               <a href="javascript:void(0);" class="btn btn-lg btn-danger me-1 " title="Eliminar" onclick="removeConsumibleFromKit(${detail.id})"><i class="ti ti-trash"></i></a>
            </td>
        `;
        renderPivorIdConsumibleKit(kitId,detail.id);
        detailsKitConsumibleTableBody.appendChild(row);
    });
}

async function renderPivorIdConsumibleKit(kitId,consumibleId){
    try{
        const pivotData = await getConsumiblekitRelation(kitId, consumibleId);
        if(pivotData && pivotData.data){
            const pivotIdInput = document.querySelector(`.kit_consumible_id_${consumibleId}`);
            pivotIdInput.value = pivotData.data[0].id;
        }
    } catch (error) {
        console.error('Error fetching pivot data:', error);
    }
}

function RenderConsumibleOnLKitTable(consumible,cantidad=0,id_pivot=null) {
    const detailsKitConsumibleTableBody = document.getElementById('kit_consumibles_rows');
    const row = document.createElement('tr');
    row.id = `kit_consumible_row_${consumible.id}`;
    row.innerHTML = `
        <td>${consumible.codigo_interno}</td>
        <td>${consumible.nombre}</td>
        <td>${consumible.descripcion}</td>
        <td>${consumible.unidad_medida}</td>
        <td>${cantidad}</td>
        <td>
           ${id_pivot ? `<input type="hidden" name="kit_pivotdata_id" class="kit_consumible_id_${consumible.id}" value="${id_pivot.id}">` : ''}
           <a href="javascript:void(0);" class="btn btn-lg btn-danger me-1 " title="Eliminar" onclick="removeConsumibleFromKit(${consumible.id})"><i class="ti ti-trash"></i></a>
        </td>
    `;
    detailsKitConsumibleTableBody.appendChild(row);
}

function removeConsumibleFromKitTableRow(consumibleId){
    const row = document.getElementById(`kit_consumible_row_${consumibleId}`);
    if (row) {
        row.remove();
    }
}

async function loadDataKits(registros, pagina, busqueda, ordenby) {
    showLoading();
    try {
        const kitconsumiblesData = await getKitconsumibles(registros, pagina, busqueda);
        const kitsAccordionContainer = document.getElementById('kits_container');
        LoadPagesControl('kit-consumibles',kitconsumiblesData.last_page, registros, pagina);
        kitsAccordionContainer.classList.remove('d-none');
        const kitsAccordionInfo = document.getElementById('kits_accordion_info');
        kitsAccordionInfo.innerHTML = '';
        kitconsumiblesData.data.forEach(kitconsumible => {
            if(!kitconsumible.es_activo) return;
            const accordionItem = RenderKitConsumibleAccordionItem(kitconsumible);
            kitsAccordionInfo.appendChild(accordionItem);
        });
    } catch (error) {
        console.error('Error loading kit consumibles:', error);
        renderAlertMessage('Error loading kit consumibles: ' + error.message, 'danger');
    } finally {
        hideLoading();
    }
}

async function ReloadDataKits() {
  const urlParams = new URLSearchParams(window.location.search);
    const per_page = urlParams.get('registros') ? parseInt(urlParams.get('registros')) : 50;
    const page = urlParams.get('pagina') ? parseInt(urlParams.get('pagina')) : 1;
    const busqueda = urlParams.get('busqueda') ? urlParams.get('busqueda') : '';
    await loadDataKits(per_page, page, busqueda);
}

function LookForKitBySearch() {
    const urlParams = new URLSearchParams(window.location.search);
    const registros = urlParams.get('registros') ? parseInt(urlParams.get('registros'), 10) : 50;
    const pagina = urlParams.get('pagina') ? parseInt(urlParams.get('pagina'), 10) : 1;
    const searchInput = document.getElementById('searchInput');
    const busqueda = searchInput.value.trim();
    loadDataTableConsumibles(registros, pagina, busqueda);
}

async function createNewKitPage(){
    try{
        const newKit = {
            "nombre": "Nuevo kit "+new Date().toISOString(),
            "descripcion": "",
            "es_activo": false
        }

        const createdKit = await insertKitconsumible(newKit);
        window.location.href = `agregar-kit.php?p=${btoa(createdKit.id)}`;
    } catch(error){
        console.error('Error creating new kit:', error);
        renderAlertMessage('Error creating new kit: ' + error.message, 'danger');
    }
}

async function LoadFormDataKitConsumible(kitId){
    showLoading();
    if(!kitId){
        hideLoading();
        window.location.href = 'kit-consumibles.php';
        return;
    }

    try {
        const kitIdDecoded = atob(kitId);
        const kitconsumible = await getKitconsumibleById(kitIdDecoded);
        document.getElementById('kit_id').value = kitconsumible.id;
        RenderKitConsumibleInForm(kitconsumible);
        document.getElementById('kit-form_container').classList.remove('d-none');
    } catch (error) {
        console.error('Error loading kit consumible data:', error);
        renderAlertMessage('Error loading kit consumible data: ' + error.message, 'danger');
    }finally {
        hideLoading();
    }
}

function EditarKitConsumible(kitId){
    window.location.href = `agregar-kit.php?p=${btoa(kitId)}&e=enable`;
}

function validateKitForm() {
    const nombre = document.getElementById('kit_nombre').value.trim();
    const descripcion = document.getElementById('kit_descripcion').value.trim();

    if (!nombre) {
        renderAlertMessage('El nombre del kit es obligatorio.', 'danger');
        return false;
    }

    return true;
}

function disableFormButtons(){
    $('.btn').prop('disabled', true);
}

function enableFormButtons(){
    $('.btn').prop('disabled', false);
}

async function GuardarKitConsumible(){
    if (!validateKitForm()) return;

    disableFormButtons();

    const kitId = document.getElementById('kit_id').value;
    const kitData = {
        nombre: document.getElementById('kit_nombre').value.trim(),
        descripcion: document.getElementById('kit_descripcion').value.trim(),
        es_activo: true
    };

    try {
        const result = await updateKitconsumible(kitId, kitData);
        renderAlertMessage('Kit consumible guardado con éxito', 'success');
    } catch (error) {
        console.error('Error guardando kit consumible:', error);
        renderAlertMessage('Error guardando kit consumible: ' + error.message, 'danger');
    } finally {
        enableFormButtons();
    }
}


function getItemFromAwesompleteList(selectedName) {
    const consumibles = document.getElementById("consumible_busqueda")._consumibles || [];
    return consumibles.find(m => m.codigo_interno + " - " + m.nombre === selectedName);
}

async function AgregarConsumibleAlKit() {
    const idKit = document.getElementById("kit_id").value;
    const selectedName = document.getElementById("consumible_busqueda").value;
    const consumible = getItemFromAwesompleteList(selectedName);
    if (!consumible) {
        renderAlertMessage('Consumible no válido seleccionado.', 'danger');
        return;
    }
    const cantidad = parseInt(document.getElementById("consumible_cantidad").value, 10);
    if (isNaN(cantidad) || cantidad <= 0) {
        renderAlertMessage('Cantidad inválida. Debe ser un número mayor que cero.', 'danger');
        return;
    }

    const consumibleData = {
        kit_id: parseInt(idKit, 10),
        consumible_id: consumible.id,
        cantidad: cantidad
    };

    try {
        const response = await insertConsumibleToKit(consumibleData);
        const pivotresponse = await getConsumiblekitRelation(idKit, consumible.id);
        const pivotInfo = pivotresponse.data ? pivotresponse.data[0] : null;
        RenderConsumibleOnLKitTable(consumible,cantidad,response,pivotInfo.id);
    } catch (error) {
        console.error('Error al agregar consumible al kit:', error);
        renderAlertMessage('Error al agregar consumible al kit: ' + error.message, 'danger');
    }
}

async function removeConsumibleFromKit(consumibleId) {
    const pivotId = document.querySelector(`.kit_consumible_id_${consumibleId}`).value;
    try {  
        await deleteConsumibleFromKit(pivotId);
        removeConsumibleFromKitTableRow(consumibleId);
    } catch (error) {
        console.error('Error al eliminar consumible del kit:', error);
        renderAlertMessage('Error al eliminar consumible del kit: ' + error.message, 'danger');
    }
}

function OpenConfirmDeleteKitModal(kitId) {
    const modal = new bootstrap.Modal(document.getElementById('danger-modal-delete-kit'));
    document.getElementById('kit_id_eliminar').value = kitId;
    modal.show();
}

async function ConfirmEliminarKit() {
    const kitId = document.getElementById('kit_id_eliminar').value;
    showLoading();
    try {
        await deleteKit(kitId);

    } catch (error) {
        console.error('Error al eliminar kit:', error);
        renderAlertMessage('Error al eliminar kit: ' + error.message, 'danger');
    } finally {
        hideLoading();
        const modalElement = document.getElementById('danger-modal-delete-kit');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    }
}

async function deleteKit(kitId) {
    try {  
        await removeKit(kitId);
        document.getElementById(`kitconsumible_item_${kitId}`).remove();
        renderAlertMessage('Kit eliminado con éxito', 'success');
    } catch (error) {
        console.error('Error al eliminar kit:', error);
        renderAlertMessage('Error al eliminar kit: ' + error.message, 'danger');
    }
}