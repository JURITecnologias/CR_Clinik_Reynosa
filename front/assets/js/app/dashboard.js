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

async function getLastCitasProgramadas(){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/citas/programadas`, {
                method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching last citas programadas:', error);
        throw error;
    }
}

async function getMetrictPacientesConsultarHombreOMujer($month, $year){
    try {
       const response = await fetch(apiHost + apiPath + `/reports/consulta-ext-general-esp?month=${$month}&year=${$year}`, {
                method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching last citas programadas:', error);
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

function updateLastCitasProgramadas() {
    lastcitasprogramadas = getLastCitasProgramadas().then(data => {
        console.log('Last citas programadas data:', data);
        const tableBody = document.getElementById('lastCitasProgramadasTable');
        tableBody.innerHTML = '';
        data.forEach(cita => {
            const row = document.createElement('tr');
            const sexo = (cita.sexo === 'M') ? 'Masculino' : 'Femenino';
            const linkPaciente=`paciente-detalle.php?b=`+btoa(cita.paciente_id);
            const fechaCita = new Date(cita.fecha_cita);
            const opcionesFormato = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            //const fechaFormateada = fechaCita.toLocaleDateString('es-ES', opcionesFormato);
            const fechaFormateada = fechaCita.toLocaleDateString('es-ES', opcionesFormato).charAt(0).toUpperCase() + fechaCita.toLocaleDateString('es-ES', opcionesFormato).slice(1);
            row.innerHTML = `
                <td>
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="fs-14 mb-1 fw-semibold">
                                <a href="${linkPaciente}">${cita.nombre_paciente} - ${sexo}</a>
                            </h6>
                            <div class="d-flex align-items-center gap-1">
                                <p class="mb-0 fs-13 d-inline-flex align-items-center text-body">
                                    <i class="ti ti-calendar me-1"></i>${fechaFormateada}
                                </p>
                                <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                <p class="mb-0 fs-13 d-inline-flex align-items-center text-body">
                                    <i class="ti ti-clock-hour-7 me-1"></i>${cita.hora_cita}
                                </p>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-end border-0">
                    <div class="d-flex align-items-center justify-content-end gap-2">
                        <a href="citas.php" class="btn btn-icon btn-light">
                            <i class="ti ti-eye"></i>
                        </a>
                    </div>
                </td>
            `;
            tableBody.appendChild(row);
        });
        document.getElementById('loadingCitasProgramadas').classList.add('d-none');
        document.getElementById('TableCitasProgramadas')?.classList.remove('d-none');
    }).catch(error => {
        console.error('Error updating last citas programadas:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateTotalPacientes();
    updateTotalCitas();
    updateTotalOrdenesClinicas();
    updateTotalConsultasFueraHorario();
    updateLastCitasProgramadas();
    getChartEstadisticasPacientes();
});

function getChartEstadisticasPacientes(){
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1;
    const currentYear = currentDate.getFullYear();
    document.getElementById('loadingGraficaPacientes').classList.remove('d-none');

    getMetrictPacientesConsultarHombreOMujer(currentMonth, currentYear).then(data => {
        renderPacienteStats(data);
        document.getElementById('loadingGraficaPacientes').classList.add('d-none');
    }).catch(error => {
        console.error('Error fetching metric pacientes consultar hombre o mujer:', error);
    });
}
function renderPacienteStats(apiData) {
    if ($('#chart-pacientes').length > 0) {
        
        // 1. Definimos el orden exacto según tu imagen
        const ordenDeseado = [
            "<1 año",
            "1-5 a",
            "6-12 a",
            "13-19 a",
            "20-29 a",
            "30-49 a",
            "50-59 a",
            "60 >"
        ];

        // 2. Filtramos las categorías para mostrar solo las que tienen datos 
        // o puedes dejar 'ordenDeseado' completo si quieres ver los huecos vacíos.
        const categoriasFinales = ordenDeseado.filter(rango => 
            apiData.some(d => d.rango_edad === rango)
        );

        // 3. Mapeamos las series siguiendo estrictamente el orden filtrado
        const dataMasculino = categoriasFinales.map(edad => {
            const registro = apiData.find(d => d.rango_edad === edad && d.sexo === 'M');
            return registro ? registro.total_consultas : 0;
        });

        const dataFemenino = categoriasFinales.map(edad => {
            const registro = apiData.find(d => d.rango_edad === edad && d.sexo === 'F');
            return registro ? registro.total_consultas : 0;
        });

        // 4. Configuración de ApexCharts (Manteniendo tu estilo de plantilla)
        var sCol = {
            chart: {
                height: 290,
                type: 'bar',
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '60%',
                    borderRadius: 5,
                    endingShape: 'rounded'
                },
            },
            colors: ['#1F6DB2', '#E63946'], 
            series: [
                { name: 'Masculino', data: dataMasculino }, 
                { name: 'Femenino', data: dataFemenino }
            ],
            xaxis: {
                categories: categoriasFinales, // Aquí ya van ordenados
                labels: {
                    style: { colors: '#0C1C29', fontSize: '12px' }
                }
            },
            // ... resto de la configuración de grid, fill y tooltip igual que antes
            tooltip: {
                y: {
                    formatter: function (val) { return val + " consultas"; }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-pacientes"), sCol);
        chart.render();
    }
}