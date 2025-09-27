const apiHost="http://localhost/backend/api-consulmdregister/public/";
// production
//const apiHost="https://crclinik.juritecnologias.com/bkend/public/";
const apiPath="api";

function getDeviceName() {
    return navigator.userAgent;
}

const headersRequest=new Headers({
    'Authorization': 'Basic '+sessionStorage.getItem('token'), 
    'Content-Type': 'application/json',
    'Device-Name': getDeviceName()
});