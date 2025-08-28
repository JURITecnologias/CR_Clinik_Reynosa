const apiHost="http://localhost/backend/api-consulmdregister/public/";
const apiPath="api";

const headersRequest=new Headers({
    'Authorization': 'Basic '+sessionStorage.getItem('token'), 
    'Content-Type': 'application/json'
});