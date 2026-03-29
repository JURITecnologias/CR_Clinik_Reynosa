// Obtener movimientos de consumibles
async function getMovimientosConsumibles({ page = 1, perPage = 50, fechaInicio = '', fechaFin = '', busqueda = '' } = {}) {
	const params = new URLSearchParams();
	params.append('per_page', perPage);
	params.append('page', page);
	if (fechaInicio) params.append('fecha_inicio', fechaInicio);
	if (fechaFin) params.append('fecha_fin', fechaFin);
	if (busqueda) params.append('search', busqueda);
	try {
		const response = await fetch(apiHost + apiPath + '/movimientos-consumos?' + params.toString(), {
			method: 'GET',
			headers: headersRequest
		});
		if (!response.ok) {
			throw new Error('Network response was not ok');
		}
		return await response.json();
	} catch (error) {
		console.error('Error fetching movimientos consumibles:', error);
		throw error;
	}
}

async function addMovimientoConsumo(uuid_consumible, tipo_movimiento, cantidad, motivo) {
	try{
		const response = await fetch(apiHost + apiPath + '/consumibles/'+uuid_consumible+"/movimientos", {
			method: 'POST',
			headers: headersRequest,
			body: JSON.stringify({tipo_movimiento: tipo_movimiento, cantidad: cantidad, motivo: motivo,referencia: 'registro_manual',referencia_id:0})
		});
		if (!response.ok) {
			const errorData = await response.json();
			throw new Error(errorData.message || 'Error al agregar movimiento de consumo');
		}		
		return await response.json();
	}catch(error) {
		console.error('Error al agregar movimiento de consumo:', error);
		throw error;
	}
}

async function getMovimientoConsumibleDetail(id) {
	try {
		const response = await fetch(apiHost + apiPath + '/movimientos-consumos/' + id, {
			method: 'GET',
			headers: headersRequest
		});
		if (!response.ok) {
			const errorData = await response.json();
			throw new Error(errorData.message || 'Error al agregar movimiento de consumo');
		}
		return await response.json();
	} catch (error) {
		console.error('Error fetching movimiento consumible detail:', error);
		throw error;
	}
}

// Renderizar la tabla de movimientos
function renderMovimientosTable(movimientos) {
	const tbody = document.getElementById('tablaMovimientos');
	tbody.innerHTML = '';
	movimientos.forEach(mov => {
		const row = document.createElement('tr');
		let badgeClass = '';
		switch (mov.tipo_movimiento) {
			case 'entrada':
				badgeClass = 'badge bg-success';
				break;
			case 'salida':
				badgeClass = 'badge bg-danger';
				break;
			case 'ajuste':
				badgeClass = 'badge bg-warning text-dark';
				break;
			default:
				badgeClass = 'badge bg-secondary';
		}
		row.innerHTML = `
			<td>${mov.consumible?.codigo_interno || ''}</td>
			<td>${mov.consumible?.nombre || ''}</td>
			<td>${mov.consumible?.unidad_medida || ''}</td>
			<td><span class="${badgeClass}">${mov.tipo_movimiento.charAt(0).toUpperCase() + mov.tipo_movimiento.slice(1)}</span></td>
			<td>${mov.cantidad}</td>
			<td>${mov.cantidad_anterior}</td>
			<td>${mov.cantidad_nueva}</td>
			<td>${mov.consumible?.stock_actual ?? ''}</td>
			<td>${formatDateTime(mov.created_at)}</td>
			<td><button class="btn btn-info btn-sm" onclick="verDetalleMovimiento(${mov.id})">Ver detalle</button></td>
		`;
		tbody.appendChild(row);
	});
}

// Actualizar total de registros
function updateTotalRegistros(total) {
	document.getElementById('totalRegistros').textContent = total;
}

// Renderizar paginación
function renderPaginationControl(currentPage, lastPage) {
    LoadPagesControl('inventario-consumibles',lastPage,50,currentPage);
}

// Formatear fecha y hora
function formatDateTime(dateString) {
	if (!dateString) return '';
	const date = new Date(dateString);
	return date.toLocaleString('es-MX', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' });
}

// Cambiar página
function cambiarPagina(pagina) {
	if (pagina < 1) return;
	cargarMovimientos({ page: pagina });
}

// Cargar movimientos con filtros
async function cargarMovimientos({ perPage = 50, page = 1 , fechaInicio = '', fechaFin = '', busqueda = '' } = {}) {
    showLoading();
    document.getElementById('pagination_control').classList.add('d-none');
	try {
		const data = await getMovimientosConsumibles({ page, perPage, fechaInicio, fechaFin, busqueda });
		renderMovimientosTable(data.data);
		updateTotalRegistros(data.total);
		renderPaginationControl(data.current_page, data.last_page);
        LoadPagesControl('inventario-consumibles',data.last_page,perPage,data.current_page);
        document.getElementById('pagination_control').classList.remove('d-none');
        document.getElementById('tablaMovimientosContainer').classList.remove('d-none');
	} catch (error) {
		// Manejo de error visual
		document.getElementById('tablaMovimientos').innerHTML = '<tr><td colspan="9">Error al cargar movimientos</td></tr>';
	}finally {
        hideLoading();
    }
}

// Evento inicial
document.addEventListener('DOMContentLoaded', function() {

	// obtenemos el nombre de la pagina del query string
	const page = window.location.pathname.split('/').pop();

	if(page=="inventario-consumibles.php"){
		const urlParams = new URLSearchParams(window.location.search);
		const perPage = parseInt(urlParams.get('registros')) || 50;
		const pagina = parseInt(urlParams.get('pagina')) || 1;
		const fechaInicio = urlParams.get('fecha_inicio') || '';
		const fechaFin = urlParams.get('fecha_fin') || '';

		const busqueda = urlParams.get('busqueda') || '';

		cargarMovimientos({ perPage: perPage, page: pagina, fechaInicio: fechaInicio, fechaFin: fechaFin, busqueda: busqueda });
	}
    
});

// Función placeholder para ver detalle
function verDetalleMovimiento(id) {
	// Implementar modal o redirección a detalle
	window.location.href = `detalle-movimiento-consumo.php?p=${obfuscate(btoa(id))}`;
}

searchConsumables = () => {
    const fechaInicio = document.getElementById('fechaInicio').value;
    const fechaFin = document.getElementById('fechaFin').value;
    const busqueda = document.getElementById('searchInput').value.trim();
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    let fechaFiltros = '';
    if(fechaInicio && fechaFin && new Date(fechaFin) >= new Date(fechaInicio)) 
    {
        fechaFiltros=`&fecha_inicio=${encodeURIComponent(fechaInicio)}&fecha_fin=${encodeURIComponent(fechaFin)}`; 
    }
    document.location.href = `inventario-consumibles.php?registros=${perPage}&pagina=${pagina}&busqueda=${encodeURIComponent(busqueda)}${fechaFiltros}`;
}

// funciones de registrar movimiento consumo page.

hideLoadingSearchConsumables = () => {
	document.getElementById('loading_search').classList.add('d-none');
	document.getElementById('table_search_results').classList.remove('d-none');
}

showLoadingSearchConsumables = () => {
	document.getElementById('loading_search').classList.remove('d-none');
	document.getElementById('table_search_results').classList.add('d-none');
}

hideLoadingMovimientos = () => {
	document.getElementById('loading_search_movimientos').classList.add('d-none');
	document.getElementById('table_movimientos_capturados').classList.remove('d-none');
}

showLoadingMovimientos = () => {
	document.getElementById('loading_search_movimientos').classList.remove('d-none');
	document.getElementById('table_movimientos_capturados').classList.add('d-none');
}

async function  searchConsumablesInModal() {
	const search= document.getElementById('input_search_consumables').value.trim();
	showLoadingSearchConsumables();
	try {
		const response = await getConsumibles(50, 1, search);
		renderConsumablesSearchResults(response.data);
		
	} catch (error) {
		
	} finally {
		hideLoadingSearchConsumables();
	}
}

function renderConsumablesSearchResults(consumibles) {
	const tbody = document.querySelector('#table_search_results tbody');
	tbody.innerHTML = '';
	if(consumibles.length === 0) {
		tbody.innerHTML = '<tr><td colspan="5">No se encontraron consumibles</td></tr>';
		return;
	}
	consumibles.forEach(consumible => {
		const row = document.createElement('tr');
		const itemData = JSON.stringify({
			codigo_interno: consumible.codigo_interno,
			nombre: consumible.nombre,
			uuid: consumible.uuid,
			unidad_medida: consumible.unidad_medida,
			stock_actual: consumible.stock_actual,
		});
		const encodedData = obfuscate(btoa(itemData));
		row.innerHTML = `
			<td>${consumible.codigo_interno}</td>
			<td>${consumible.nombre}</td>
			<td>${consumible.unidad_medida}</td>
			<td>${consumible.stock_actual}</td>
			<td><button class="btn btn-primary btn-sm" onclick="seleccionarConsumible('${encodedData}')">Seleccionar</button></td>
		`;
		tbody.appendChild(row);
	});
}

function seleccionarConsumible(encodedData) {
	document.getElementById('input_consumible_uuid').value = encodedData;
	const decodedData = JSON.parse(atob(deobfuscate(encodedData)));
	document.getElementById('input_codigo_interno').value = decodedData.codigo_interno;
	document.getElementById('input_nombre').value = decodedData.nombre;
	// escondemos el modal
	const modal = bootstrap.Modal.getInstance(document.getElementById('modalBuscarConsumible'));
	modal.hide();
}

function ValidaFormularioMovimiento() {
	const codigoInterno = document.getElementById('input_codigo_interno').value.trim();
	const nombre = document.getElementById('input_nombre').value.trim();
	const tipoMovimiento = document.getElementById('select_tipo_movimiento').value;
	const cantidad = document.getElementById('input_cantidad').value;
	const motivo = document.getElementById('input_motivo').value.trim();
	if (!codigoInterno || !nombre ) {
		renderAlertMessage('Revise los campos de codigo interno, nombre de consumible que esten correctos', 'danger');
		return false;
	}
	if(!tipoMovimiento || !['entrada', 'salida', 'ajuste'].includes(tipoMovimiento)) {
		renderAlertMessage('Seleccione un tipo de movimiento válido', 'danger');
		return false;
	}
	if(!cantidad || isNaN(cantidad) || parseInt(cantidad) <= 0) {
		renderAlertMessage('Ingrese una cantidad válida mayor a 0', 'danger');
		return false;
	}
	if(!motivo) {
		renderAlertMessage('Ingrese un motivo para el movimiento', 'danger');
		return false;
	}
	return true;
}

function AgregarItemMovimientoSessionStorage(){

	if(!ValidaFormularioMovimiento()) return;
	const consumible_uuid = document.getElementById('input_consumible_uuid').value;
	const tipo_movimiento = document.getElementById('select_tipo_movimiento').value;
	const cantidad = parseInt(document.getElementById('input_cantidad').value);
	const motivo = document.getElementById('input_motivo').value.trim();
	const decodedData = JSON.parse(atob(deobfuscate(consumible_uuid)));

	const consumible_movimiento = {
		uuid: btoa(decodedData.uuid+decodedData.codigo_interno+Date.now()), //generamos un uuid temporal para identificar el movimiento en la sessionStorage, no es el uuid del consumible.
		data: decodedData,
		tipo_movimiento: tipo_movimiento,
		cantidad: cantidad,
		motivo: motivo
	};

	SaveSelectedConsumible(consumible_movimiento);
	//clean fields:
	document.getElementById('input_consumible_uuid').value = '';
	document.getElementById('input_codigo_interno').value = '';
	document.getElementById('input_nombre').value = '';
	document.getElementById('select_tipo_movimiento').value = '-1';
	document.getElementById('input_cantidad').value = '';
	document.getElementById('input_motivo').value = '';
	
	//TODO: render table de movimientos seleccionados para enviar al backend.
	renderItemsMovimientosCapturados(consumible_movimiento);
}

function renderItemsMovimientosCapturados(consumible_movimiento) {
	const tbody = document.querySelector('#table_movimientos_capturados tbody');
	
	const row = document.createElement('tr');
	row.id = 'row_'+consumible_movimiento.uuid;
	const badge = consumible_movimiento.tipo_movimiento === 'entrada'
		? 'badge bg-success-subtle text-success'
		: (consumible_movimiento.tipo_movimiento === 'salida'
			? 'badge bg-danger-subtle text-danger'
			: 'badge bg-warning text-dark');
	const signoTipoMovimiento = consumible_movimiento.tipo_movimiento === 'entrada' ? '+' : (consumible_movimiento.tipo_movimiento === 'salida' ? '-' : '');
	const warningIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-alert-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>`;
	row.innerHTML = `
			<td>${consumible_movimiento.data.codigo_interno}</td>
			<td>${consumible_movimiento.data.nombre}</td>
			<td>${consumible_movimiento.data.unidad_medida}</td>
			<td>${consumible_movimiento.data.stock_actual}</td>
			<td><span class="${badge}">${consumible_movimiento.tipo_movimiento}</span></td>
			<td>${signoTipoMovimiento}${consumible_movimiento.cantidad}</td>
			<td>${consumible_movimiento.motivo}</td>
			<td>
				<div class="d-flex align-items-center justify-content-center gap-2">
					<div class="spinner-border spinner-border-sm d-none" role="status" id="spinner_remove_${consumible_movimiento.uuid}"></div>
					<div class="text-success d-none flex-shrink-0" id="success_${consumible_movimiento.uuid}"><i class="ti ti-check"></i></div>
					<div class="text-warning d-none flex-shrink-0" id="waring_error_${consumible_movimiento.uuid}">${warningIcon}</div>
					<button class="btn btn-outline-danger btn-sm" type="button" id="btn_remove_${consumible_movimiento.uuid}" onclick="RemoveItemMovimientoCaptura('${consumible_movimiento.uuid}')"><i class="ti ti-trash"></i></button>
				</div>
			</td>
		`;
	tbody.appendChild(row);

}

function SaveSelectedConsumible(consumible_movimiento) {
	items= sessionStorage.getItem('selected_consumible_movimientos');
	if(items) {
		items = JSON.parse(atob(deobfuscate(items)));
		items.push(consumible_movimiento);
		encodeData=obfuscate(btoa(JSON.stringify(items)));
		sessionStorage.setItem('selected_consumible_movimientos', encodeData);
	} else {
		items = [];
		items.push(consumible_movimiento);
		encodeData=obfuscate(btoa(JSON.stringify(items)));
		sessionStorage.setItem('selected_consumible_movimientos', encodeData);
	}
}

function RemoveSelectedConsumible(consumible_uuid) {
	items= sessionStorage.getItem('selected_consumible_movimientos');
	if(items) {
		items = JSON.parse(atob(deobfuscate(items)));
		items = items.filter(item => item.uuid !== consumible_uuid);
		encodeData=obfuscate(btoa(JSON.stringify(items)));
		sessionStorage.setItem('selected_consumible_movimientos', encodeData);
	}
}

function LoadTableMovimientosCapturados() {
	showLoadingMovimientos()
	const tbody = document.querySelector('#table_movimientos_capturados tbody');
	tbody.innerHTML = '';
	items= sessionStorage.getItem('selected_consumible_movimientos');
	if(items) {
		items = JSON.parse(atob(deobfuscate(items)));
		items.forEach(item => {
			renderItemsMovimientosCapturados(item);
		});
	}
	hideLoadingMovimientos();

}

function RemoveItemMovimientoCaptura(consumible_uuid) {
	RemoveSelectedConsumible(consumible_uuid);
	LoadTableMovimientosCapturados();
}

function ShowConfirmacionProcesarMovimientos() {
	//mostrar modal de confirmacion, si el usuario confirma, llamar a la funcion ProcesarMovimientosCapturados()
	const modal= new bootstrap.Modal(document.getElementById('modalProcesarMovimientos'));
	modal.show();
}

async function ProcesarMovimientosCapturados() {
	//necesitamos hacer una funcion por batches que tome los items de la sessionStorage de a 10 o 20 y los envie al backend, para no saturar el servidor si hay muchos movimientos capturados.
	items= sessionStorage.getItem('selected_consumible_movimientos');
	//removemos los botones en cada item mientras se procesa, para evitar que el usuario intente eliminar o procesar de nuevo los items mientras se esta realizando la petición al backend.
	if(items) {
		items = JSON.parse(atob(deobfuscate(items)));
		items.forEach(item=>{
			document.getElementById('btn_remove_'+item.uuid).classList.add('d-none');
		});
		const batchSize = 20;
		for(let i = 0; i < items.length; i += batchSize) {
			const batch = items.slice(i, i + batchSize);
			try {
				await Promise.all(batch.map(async item => { 
					const spinner = document.getElementById('spinner_remove_'+item.uuid);
					const warning = document.getElementById('waring_error_'+item.uuid);
					const removeBtn = document.getElementById('btn_remove_'+item.uuid);
					const success = document.getElementById('success_'+item.uuid);
					spinner.classList.remove('d-none');
					warning.classList.add('d-none');
					try {
						await addMovimientoConsumo(item.data.uuid, item.tipo_movimiento, item.cantidad, item.motivo);
						success.classList.remove('d-none');
						setTimeout(() => {
							document.getElementById('row_'+item.uuid).remove();
							RemoveSelectedConsumible(item.uuid);
						}, 10000);
					} catch (error) {
						warning.classList.remove('d-none');
						//document.getElementById('btn_remove_'+item.uuid).classList.remove('d-none');
						removeBtn.classList.remove('d-none');
						console.error('Error procesando movimiento uuid: '+item.uuid, error);
					} finally {
						spinner.classList.add('d-none');
					}
				}));
				console.log(`Batch ${i/batchSize + 1} procesada correctamente`);
			} catch (error) {
				console.error(`Error procesando batch ${i/batchSize + 1}:`, error);
				renderAlertMessage(`Error procesando algunos movimientos en el batch ${i/batchSize + 1}. Revise la consola para más detalles.`, 'danger');
			}
		}
		//limpiar sessionStorage y recargar pagina
		// sessionStorage.removeItem('selected_consumible_movimientos');
		// document.location.reload();
	}	
}

// funciones pagina detalle-movimiento-consumo

async function LoadDataDetalleContumoDetail(id){
	console.log(id)
	showLoading();
	try{
		const response= await getMovimientoConsumibleDetail(id);
		renderDetalleMovimientoConsumo(response);
		document.getElementById('detalle_movimiento_container').classList.remove('d-none');
	}catch(error) {
		renderAlertMessage('Error al cargar detalle de movimiento de consumo', 'danger');
	}finally{
		hideLoading();
	}
}

function renderDetalleMovimientoConsumo(data) {
	document.getElementById('input_codigo_interno').value = data.consumible?.codigo_interno || '';
	document.getElementById('input_nombre').value = data.consumible?.nombre || '';
	document.getElementById('input_unidad').value = data.consumible?.unidad_medida || '';
	document.getElementById('input_tipo_movimiento').value = data.tipo_movimiento || '';
	document.getElementById('input_cantidad').value = data.cantidad || '';
	document.getElementById('input_cantidad_anterior').value = data.cantidad_anterior || '';
	document.getElementById('input_cantidad_nueva').value = data.cantidad_nueva || '';
	document.getElementById('input_stock_actual').value = data.consumible?.stock_actual ?? '';
	document.getElementById('input_fecha').value = formatDateTime(data.created_at) || '';
	document.getElementById('input_motivo').value = data.motivo || '';
	referencia='Captura Manual en Modulo de Inv. de Consumibles';
	if(data.referencia_id!=0 && !data.referencia) {
		referencia='Referencia Desconocida';
	}
	document.getElementById('input_referencia').value = referencia;

}