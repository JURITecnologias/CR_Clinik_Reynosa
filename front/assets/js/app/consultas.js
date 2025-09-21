async function getConsultas(perPage = 50, actualPage = 1, searchTerm = '', order='fecha_consulta', orderDirection='asc') {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas?per_page=${perPage}&page=${actualPage}&search=${encodeURIComponent(searchTerm)}&order_by=${order}&order_direction=${orderDirection}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consultas:', error);
        throw error;
    }
}

async function searchConsultas(perPage = 50, actualPage = 1, searchTerm = '', order='fecha_consulta', orderDirection='asc') {
    try {
        const response = await fetch(apiHost + apiPath + `/consultas/buscar?per_page=${perPage}&page=${actualPage}&paciente_nombre=${encodeURIComponent(searchTerm)}&order_by=${order}&order_direction=${orderDirection}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error searching consultas:', error);
        throw error;
    }
}

function renderTableConsultas(consultas) {
    const $tableBody = $('#table_consultas tbody');
    $tableBody.empty();

    consultas.forEach(consulta => {

        const user = JSON.parse(sessionStorage.getItem('user'));
        const hasEditPermission = user && user.permissions && user.permissions.includes('modificar') && consulta.estatus === 'abierta';
        const IsDoctor = user && user.roles.includes('Doctor');
        console.log("IsDoctor:", IsDoctor);
        console.log("hasEditPermission:", hasEditPermission);
        //const hasDeletePermission = user && user.permissions && user.permissions.includes('borrar');

        // fecha consulta format to dd/mm/yyyy hh:mm
        const fechaConsulta = new Date(consulta.fecha_consulta);
        const formattedDate = fechaConsulta.toLocaleDateString('es-MX', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).replace(',', '');

        const badgeClass = consulta.estatus === 'abierta' ? 'badge-soft-primary' :
                           consulta.estatus === 'enfermeria' ? 'badge-soft-warning' :
                           consulta.estatus === 'completada' ? 'badge-soft-success' : 'badge-soft-secondary';

        const $row = $('<tr>');
        $row.append($('<td>#CON').text(consulta.id));
        $row.append($('<td>').text(consulta.paciente.nombre + " " + consulta.paciente.apellido));
        $row.append($('<td>').html(`${consulta.doctor.nombre_completo}<br><small>${consulta.doctor.titulo}</small>`));
        $row.append($('<td>').text(formattedDate));
        $row.append($('<td>').html('<span class="badge ' + badgeClass + '" style="font-size: 1rem; font-weight: bold;">' + consulta.estatus.charAt(0).toUpperCase() + consulta.estatus.slice(1) + '</span>'));
        if(hasEditPermission && IsDoctor){
            $row.append($('<td>').html(`
                <a href="edit-consulta.php?id=${consulta.id}" class="btn btn-lg btn-primary me-1" title="Editar Consulta"><i class="ti ti-pencil"></i></a>
            `));
        }else{
            $row.append($('<td>').html(`<a href="view-consulta.php?id=${consulta.id}" class="btn btn-lg btn-info me-1" title="Ver Consulta"><i class="ti ti-eye"></i></a>`));
        }
        
        $tableBody.append($row);
    });
}


async function LoadConsultasTable(perPage = 50, actualPage = 1, searchTerm = '',order='fecha_consulta', orderDirection='asc') {
    showLoading();
    try {
        const data = searchTerm === '' ? await getConsultas(perPage, actualPage, searchTerm, order, orderDirection) : await searchConsultas(perPage, actualPage, searchTerm, order, orderDirection);
        renderTableConsultas(data.data);
        $('#consultas_container').removeClass('d-none');
        $('#total-consultas').text(data.total);
        await LoadPagesControl(data.last_page, perPage, actualPage);
    } catch (error) {
        console.error('Error loading consultas table:', error);
    }finally {
        hideLoading();
    }
}

function BuscarConsulta(){
    const searchInput = document.getElementById('searchInput');
    window.searchTerm = searchInput.value.trim();
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const direccion = urlParams.get('direccion') || 'desc';
    window.location.search = `?registros=${perPage}&pagina=1&direccion=${direccion}&busqueda=${encodeURIComponent(searchTerm)}`;
}

function OrdenarPorReciente(){
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    const busqueda = urlParams.get('busqueda') || '';
    window.location.search = `?registros=${perPage}&pagina=${pagina}&busqueda=${encodeURIComponent(busqueda)}&direccion=desc`;
}

function OrdenarPorAntiguo(){
    const urlParams = new URLSearchParams(window.location.search);
    const perPage = parseInt(urlParams.get('registros')) || 50;
    const pagina = parseInt(urlParams.get('pagina')) || 1;
    const busqueda = urlParams.get('busqueda') || '';
    window.location.search = `?registros=${perPage}&pagina=${pagina}&busqueda=${encodeURIComponent(busqueda)}&direccion=asc`;
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
            prevItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}&direccion=${direccion}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${i}${searchParam}&direccion=${direccion}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="consultas.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}&direccion=${direccion}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}