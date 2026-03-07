const monthsES = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
];

intervalRefresh = null;
pendingItemsToRefresh=false;
async function getReportesGenerados($month, $year) {
    try {
        const response = await fetch(apiHost + apiPath + `/reports/queue/list?year=${$year}&month=${$month}`, {
            method: 'GET',
            headers: headersRequest
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

async function dispatchReporteInformeMedico($month, $year) {
    try {
        const response = await fetch(apiHost + apiPath + '/reports/queue/generar-reporte-medico', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify({ month: $month, year: $year })
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error dispatching reporte:', error);
        throw error;
    }
}

async  function downloadReportePdf(uuid) {
    try {
        const response = await fetch(apiHost + apiPath + `/reports/queue/download/${uuid}`, {
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
        a.download = `reporte-medico-${uuid}.xlsx`;
        document.body.appendChild(a);
        a.click();
        a.remove();
        window.URL.revokeObjectURL(url);
    }catch (error) {
        console.error('Error downloading reporte PDF:', error);
        throw error;
    }

}

function RenderReportesGeneradosTable(reportesData) {
    const tableBody = $('#reportes_table tbody')[0];
    tableBody.innerHTML = '';
    reportesData.forEach(reporte => {
        const row = document.createElement('tr');

        classBadge = "bg-secondary";
        statusDiplay = "Completado"
        switch (reporte.status) {
            case 'pending':
                classBadge = "bg-warning";
                statusDiplay = "Pendiente";
                break;
            case 'completed':
                classBadge = "bg-success";
                break;
            case 'failed':
                classBadge = "bg-danger";
                statusDiplay = "Fallido";
                break;
        }
        const fecha = new Date(reporte.created_at);
        const dia = fecha.getDate();
        const mes = monthsES[fecha.getMonth()];
        const año = fecha.getFullYear();
        const hora = fecha.getHours();
        const minutos = fecha.getMinutes().toString().padStart(2, '0');
        const fechaFormateada = `${mes} ${dia}, ${año} ${hora}:${minutos}`;

        row.innerHTML = `
            <td>Informe Médico - ${monthsES[reporte.month - 1]} ${reporte.year}</td>
            <td><span class="badge ${classBadge}">${statusDiplay}</span></td>
            <td>${fechaFormateada}</td>
            <td>
                ${reporte.status === 'completed' ? `<button class="btn btn-sm btn-primary download-btn" data-uuid="${reporte.uuid}">Descargar</button>` : ''}
                ${reporte.status === 'pending' ? `<button class="btn btn-primary download-pending-btn" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span></button>` : ''}
            </td>
        `;
        tableBody.appendChild(row);
    });
}

async function LoadDataForReportesGenerados($month, $year) {
    showLoading();
    showInfoContainer(false);
    try {
        const data = await getReportesGenerados($month, $year);
        pendingItemsToRefresh = data.some(item => item.status === 'pending');
        RenderReportesGeneradosTable(data);
        showInfoContainer(true);
        if (intervalRefresh !== null) {
            clearInterval(intervalRefresh);
            intervalRefresh = null;
        }
        refreshTable();
    } catch (error) {
        console.error('Error loading reportes generados:', error);
        renderAlertMessage('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
        if (intervalRefresh !== null) {
            clearInterval(intervalRefresh);
            intervalRefresh = null;
        }
    } finally {
        hideLoading();
    }

}

function showInfoContainer(show) {
    const infoContainer = document.getElementById('reporte-section');
    if (show) {
        infoContainer.style.display = 'block';
    } else {
        infoContainer.style.display = 'none';
    }
}

async function solicitarReporte() {
    const mesSelect = document.getElementById('mesSelect');
    const anioSelect = document.getElementById('anioSelect');

    const month = mesSelect.value;
    const year = anioSelect.value;
    if (!month || !year) {
        renderAlertMessage('Por favor selecciona un mes y año válidos.', 'warning');
        return;
    }

    try {
        await dispatchReporteInformeMedico(month, year);
        renderAlertMessage('Reporte solicitado exitosamente. Por favor espera unos momentos y recarga la página para ver el reporte generado.', 'success');
        LoadDataForReportesGenerados(month, year);

    } catch (error) {
        console.error('Error solicitando reporte:', error);
    }
}

function refreshTable() {

    if(!pendingItemsToRefresh){
        return;
    }

    intervalRefresh = setInterval(async () => {
        const mesSelect = document.getElementById('mesSelect');
        const anioSelect = document.getElementById('anioSelect');

        const month = mesSelect.value;
        const year = anioSelect.value;
        try {
            const data = await getReportesGenerados(month, year);
            pendingItemsToRefresh = data.some(item => item.status === 'pending');
            RenderReportesGeneradosTable(data);
            showInfoContainer(true);
            if (intervalRefresh !== null) {
                clearInterval(intervalRefresh);
                intervalRefresh = null;
            }
            refreshTable();
        } catch (error) {
            console.error('Error loading reportes generados:', error);
            renderAlertMessage('Error al cargar las citas. Inténtalo de nuevo más tarde.', 'danger');
            if (intervalRefresh !== null) {
                clearInterval(intervalRefresh);
                intervalRefresh = null;
            }
        } finally {
            hideLoading();
        }
    }, 5000);
}

async function VerReportes() {
    const mesSelect = document.getElementById('mesSelect');
    const anioSelect = document.getElementById('anioSelect');
    const month = mesSelect.value;
    const year = anioSelect.value;
    if (!month || !year) {
        renderAlertMessage('Por favor selecciona un mes y año válidos.', 'warning');
        return;
    }
    LoadDataForReportesGenerados(month, year);
}

document.addEventListener('click', async function (event) {
    if (event.target.classList.contains('download-btn')) {
        const uuid = event.target.getAttribute('data-uuid');
        try {
            await downloadReportePdf(uuid);
        } catch (error) {
            console.error('Error downloading reporte PDF:', error);
            renderAlertMessage('Error al descargar el reporte. Inténtalo de nuevo más tarde.', 'danger');
        }
    }
});