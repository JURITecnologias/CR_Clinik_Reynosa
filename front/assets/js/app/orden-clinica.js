async function getOrdenesClinicas(perPage = 50, actualPage = 1, searchTerm = '', order='', orderDirection='asc') {
    try {
        const url = new URL(apiHost + apiPath + "/ordenes-clinicas");
        url.searchParams.append('per_page', perPage);
        url.searchParams.append('page', actualPage);
        if (order){
            url.searchParams.append('order', order);
             url.searchParams.append('direction', orderDirection);
        }
       
        if (searchTerm) {
            url.searchParams.append('search', searchTerm);
        }
        const response= await fetch(url, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener las órdenes clínicas:', error);
        throw error;
    }
}

async function insertOrdenClinica(ordenData) {
    try {
        const url = new URL(apiHost + apiPath + "/ordenes-clinicas");
        const response = await fetch(url, {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(ordenData)
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }   
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al insertar la orden clínica:', error);
        throw error;
    }
}

function getUserId() {
    const user = JSON.parse(sessionStorage.getItem('user'));
    return user ? user.user.id : null;
}

async function createOrdenClinicaPorConsulta(consultaData) {
    try {
        const fechaDeOrden = new Date().toISOString().split('T')[0];
        const consultaOrdenData = {
            consulta_id: consultaData.id,
            paciente_id: consultaData.paciente_id,
            doctor_id: consultaData.doctor_id,
            estado: 'pendiente',
            servicios_solicitados: consultaData.serviciosSolicitados,
            fecha_orden: fechaDeOrden,
            observaciones: 'Orden clínica generada automáticamente por la consulta #' + consultaData.id,
            user_id: getUserId()
        };
        const nuevaOrden = await insertOrdenClinica(consultaOrdenData);
        console.log('Orden clínica creada:', nuevaOrden);
        return nuevaOrden;
    } catch (error) {
        console.error('Error al crear la orden clínica por consulta:', error);
        throw error;
    }   
}