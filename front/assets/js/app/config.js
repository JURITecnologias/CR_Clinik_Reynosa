const defaultApiPath = ['localhost', '127.0.0.1'].includes(window.location.hostname) && !window.location.port
    ? '/backend/api-consulmdregister/public/'
    : '/bkend/public/';
const apiHost = new URL(window.CLINIK_API_HOST || defaultApiPath, window.location.origin).href;
const apiPath="api";

function getDeviceName() {
    return navigator.userAgent;
}

const headersRequest=new Headers({
    'Authorization': 'Basic '+sessionStorage.getItem('token'), 
    'Content-Type': 'application/json',
    'Device-Name': getDeviceName()
});
