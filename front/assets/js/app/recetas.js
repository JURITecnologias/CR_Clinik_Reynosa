async function processReceta(recetaData) {
    try {
        const response = await fetch(apiHost + apiPath + '/receta-medica', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(recetaData)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error processing receta:', error);
        throw error;
    }
}

async function getRecetaByConsultaId(consultaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/receta-medica/consulta/${consultaId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching receta by consulta ID:', error);
        throw error;
    }
}

async function downloadRecetaPdf(recetaId) {
    try {
        const response = await fetch(apiHost + apiPath + `/pdf/receta?p=${recetaId}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${recetaId}.pdf`;
        document.body.appendChild(a);
        a.click();
        a.remove();
        window.URL.revokeObjectURL(url);
    } catch (error) {
        console.error('Error downloading receta PDF:', error);
        throw error;
    }
}
