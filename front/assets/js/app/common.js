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