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