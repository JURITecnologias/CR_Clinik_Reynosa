function showLoading() {
    document.getElementById('loading').classList.remove('d-none');
}

function hideLoading() {
    document.getElementById('loading').classList.add('d-none');
}

function showLoadingDiv(divId) {
    document.getElementById(divId).classList.remove('d-none');
}

function hideLoadingDiv(divId) {
    document.getElementById(divId).classList.add('d-none');
}

function renderAlertMessage(message, type = 'success', setTimeoutAlert = true) {
    const alertContainer = document.getElementById('alert_placeholder');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} text-bg-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    alertContainer.appendChild(alertDiv);
    if (setTimeoutAlert) {
        setTimeout(() => {
            const alert = bootstrap.Alert.getOrCreateInstance(alertDiv);
            alert.close();
        }, 10000);
    }
    // Scroll to top to ensure the user sees the alert
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function calcularEdad(fechaNacimiento) {
    if (!fechaNacimiento) return null;
    const nacimiento = new Date(fechaNacimiento);
    const hoy = new Date();
    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    const m = hoy.getMonth() - nacimiento.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
        edad--;
    }
    return edad;
}

function obfuscate(str) {
    return str.split('').map(c => String.fromCharCode(c.charCodeAt(0) + 1)).join('');
}

function deobfuscate(str) {
    return str.split('').map(c => String.fromCharCode(c.charCodeAt(0) - 1)).join('');
}

async function LoadPagesControl(referedPage,totalPages,perPage = 50,actualPage=1){
    if (totalPages <= 1) {
         $('.pagination_control').each(function() {
            $(this).hide();
         });
        return; // No need for pagination if there's only one page
    }
    console.log(actualPage,totalPages,perPage,referedPage);
    $('.pagination_control').each(function() {
        const $paginationContainer = $(this);
        $paginationContainer.empty();

        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('busqueda')||'';
        const searchParam = searchTerm ? `&busqueda=${encodeURIComponent(searchTerm)}` : '';

        if (actualPage !== 1) {
            const prevItem = $('<li>', { class: 'page-item' });
            prevItem.html(`<a class="page-link" href="${referedPage}.php?registros=${perPage}&pagina=${actualPage - 1}${searchParam}" data-page="prev">Anterior</a>`);
            $paginationContainer.append(prevItem);
        }

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $('<li>', { class: 'page-item' + (i === actualPage ? ' active' : '') });
            pageItem.html(`<a class="page-link" href="${referedPage}.php?registros=${perPage}&pagina=${i}${searchParam}" data-page="${i}">${i}</a>`);
            $paginationContainer.append(pageItem);
        }

        if (totalPages !== actualPage) {
            const nextItem = $('<li>', { class: 'page-item' });
            nextItem.html(`<a class="page-link" href="${referedPage}.php?registros=${perPage}&pagina=${actualPage + 1}${searchParam}" data-page="next">Siguiente</a>`);
            $paginationContainer.append(nextItem);
        }
    });
}