async function getTotalPacientes(){
     try {
        const response = await fetch(apiHost + apiPath + `/dashboard/pacientes/total`, {
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

async function getTotalCitas(){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/citas/ultimos-60-dias`, {
           method: 'GET',
           headers: headersRequest
       });
       if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching citas:', error);
        throw error;
    }
}

async function getTotalOrdenesClinicas(){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/ordenes-clinicas/ultimos-60-dias`, {
              method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching ordenes clinicas:', error);
        throw error;
    }
}

async function getTotalConsultasFueraHorario(){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/consultas/fuera-horario/ultimos-60-dias`, {
                method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching consultas fuera horario:', error);
        throw error;
    }
}

function updateTotalPacientes() {
    totalpacientes=getTotalPacientes().then(data => {
        document.getElementById('totalPacientes').innerHTML = data.total_pacientes;
        document.getElementById('loadingTotalPacientes').classList.add('d-none');
        document.getElementById('totalPacientesInfoContainer').classList.remove('d-none');
        document.getElementById('totalPacientesInfoContainer').classList.add('d-flex');
        
    }).catch(error => {
        console.error('Error updating total pacientes:', error);
    });
}

function updateTotalCitas() {
    totalcitas=getTotalCitas().then(data => {
        document.getElementById('totalCitas').innerHTML = data.total_citas_ultimos_30_dias;
        document.getElementById('loadingTotalCitas').classList.add('d-none');
        document.getElementById('totalCitasInfoContainer').classList.remove('d-none');
        document.getElementById('totalCitasInfoContainer').classList.add('d-flex');
    }).catch(error => {
        console.error('Error updating total citas:', error);
    });
}

function updateTotalOrdenesClinicas() {
    totalordenesclinicas=getTotalOrdenesClinicas().then(data => {
        document.getElementById('totalOrdenesClinicasCompletas').innerHTML = data.total_ordenes_clinicas_ultimos_60_dias;
        document.getElementById('totalOrdenesClinicasPendientes').innerHTML = data.total_ordenes_clinicas_pendientes_ultimos_60_dias;
        document.getElementById('loadingTotalOrdenesClinicas').classList.add('d-none');
        document.getElementById('totalOrdenesClinicasInfoContainer').classList.remove('d-none');
        document.getElementById('totalOrdenesClinicasInfoContainer').classList.add('d-flex');
    }).catch(error => {
        console.error('Error updating total ordenes clinicas:', error);
    });
}

function updateTotalConsultasFueraHorario() {
    totalconsultasfuerahorario=getTotalConsultasFueraHorario().then(data => {
        document.getElementById('totalFuerHorario').innerHTML = data.total_consultas_fuera_de_horario_ultimos_60_dias;
        document.getElementById('totalConsultas').innerHTML = data.total_consultas_ultimos_60_dias;
        document.getElementById('loadingTotalFuerHorario').classList.add('d-none');
        document.getElementById('totalFuerHorarioInfoContainer').classList.remove('d-none');
        document.getElementById('totalFuerHorarioInfoContainer').classList.add('d-flex');
    }).catch(error => {
        console.error('Error updating total consultas fuera horario:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateTotalPacientes();
    updateTotalCitas();
    updateTotalOrdenesClinicas();
    updateTotalConsultasFueraHorario();
});