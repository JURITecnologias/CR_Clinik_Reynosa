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
	// const pagination = document.getElementById('pagination_control');
	// if (!pagination) return;
	// let html = '<ul class="pagination pagination-sm mb-0">';
	// html += `<li class="page-item${currentPage === 1 ? ' disabled' : ''}"><a class="page-link" href="#" onclick="cambiarPagina(${currentPage - 1})">Anterior</a></li>`;
	// for (let i = 1; i <= lastPage; i++) {
	// 	html += `<li class="page-item${i === currentPage ? ' active' : ''}"><a class="page-link" href="#" onclick="cambiarPagina(${i})">${i}</a></li>`;
	// }
	// html += `<li class="page-item${currentPage === lastPage ? ' disabled' : ''}"><a class="page-link" href="#" onclick="cambiarPagina(${currentPage + 1})">Siguiente</a></li>`;
	// html += '</ul>';
	// pagination.innerHTML = html;
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

    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    const fechaInicio = urlParams.get('fecha_inicio') || '';
    const fechaFin = urlParams.get('fecha_fin') || '';

    const busqueda = urlParams.get('busqueda') || '';

	cargarMovimientos({ perPage: perPage, page: pagina, fechaInicio: fechaInicio, fechaFin: fechaFin, busqueda: busqueda });
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