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

async function getTotalPacientesPorSexo($month, $year){
    try {
       const response = await fetch(apiHost + apiPath + `/reports/pacientes/total-por-sexo?month=${$month}&year=${$year}`, {
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

async function getHorarioDoctores($diaSemana){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/doctores/horarios?dia_semana=${$diaSemana}`, {
                method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching horario doctores:', error);
        throw error;
    }
}

async function getUltimosPacientesRegistrados(){
    try {
       const response = await fetch(apiHost + apiPath + `/dashboard/pacientes/ultimos-registrados`, {
                method: 'GET',
                headers: headersRequest
            });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching last pacientes registrados:', error);
        throw error;
    }
}

async function getUltimasDiezConsultas() {
    try {
        const response = await fetch(apiHost + apiPath + `/dashboard/consultas/ultimas-diez`, {
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

function updateUltimosPacientesRegistrados() {
    ultimospacientesregistrados = getUltimosPacientesRegistrados().then(data => {
       
        const divBody = document.getElementById('ListUltimosPacientesContainer');
        divBody.innerHTML = '';
        data.forEach(paciente => {
            const row = document.createElement('tr');
            const sexo = (paciente.sexo === 'M') ? 'Masculino' : 'Femenino';
            const linkPaciente=`paciente-detalle.php?b=`+btoa(paciente.paciente_id);
            const fechaRegistro = new Date(paciente.created_at);
            const opcionesFormato = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const fechaFormateada = fechaRegistro.toLocaleDateString('es-ES', opcionesFormato).charAt(0).toUpperCase() + fechaRegistro.toLocaleDateString('es-ES', opcionesFormato).slice(1);
            const edad= calcularEdad(paciente.fecha_nacimiento);
            row.innerHTML = `
                <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0);" class="avatar me-2 badge-soft-success rounded-circle">
                                    <i class="ti ti-user fs-20"></i>
                                </a>
                                <div>
                                    <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="${linkPaciente}">${paciente.nombre_completo} - ${sexo}</a></h6>
                                    <p class="mb-0 fs-13">Reg.: ${fechaFormateada}</p>
                                    <p class="mb-0 fs-13">Edad: ${edad}  Género: ${sexo}</p>
                                    
                                </div>
                            </div>
                            <a href="paciente-detalle.php?b=${btoa(paciente.id)}" class="btn btn-icon btn-light me-1"><i class="ti ti-eye"></i></a>
                        </div>
            `;
            divBody.appendChild(row);
        });
        document.getElementById('loadingUltimosPacientes').classList.add('d-none');
        document.getElementById('ListUltimosPacientesContainer')?.classList.remove('d-none');
    }).catch(error => {
        console.error('Error updating last pacientes registrados:', error);
    });
}

function updateLastConsultas() {
    ultimasconsultas = getUltimasDiezConsultas().then(data => {
        const tableBody = document.getElementById('ultimasConsultasTable');
        tableBody.innerHTML = '';
        data.forEach(consulta => {
            const row = document.createElement('tr');
            const linkPaciente=`paciente-detalle.php?b=`+btoa(consulta.paciente_id);
            const fechaConsulta = new Date(consulta.created_at);
            const opcionesFormato = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const fechaFormateada = fechaConsulta.toLocaleDateString('es-ES', opcionesFormato).charAt(0).toUpperCase() + fechaConsulta.toLocaleDateString('es-ES', opcionesFormato).slice(1);
            const badgeClass = consulta.estatus === 'abierta' ? 'badge-soft-primary' :
                           consulta.estatus === 'enfermeria' ? 'badge-soft-warning' :
                           consulta.estatus === 'completada' ? 'badge-soft-success' : 'badge-soft-secondary';
            row.innerHTML = `
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="${linkPaciente}" class="avatar avatar-xs me-2">
                                <i class="ti ti-user"></i>
                            </a>
                            <div>
                                <h6 class="fs-14 mb-0 fw-medium">
                                    <a href="${linkPaciente}">${consulta.nombre_paciente}</a>
                                </h6>
                            </div>
                        </div>
                    </td>
                    <td>${fechaFormateada}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="fs-14 mb-0 fw-medium">${consulta.nombre_doctor || 'N/A'}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge ${badgeClass} text-capitalize">${consulta.estatus}</span>
                    </td>
            `;
            tableBody.appendChild(row);
        });
        document.getElementById('loadingUltimasConsultas').classList.add('d-none');
        document.getElementById('ultimasConsultasTableContainer')?.classList.remove('d-none');
    }).catch(error => {
        console.error('Error updating last consultas:', error);
    });

}

function updateHorarioDoctores() {
    const diaDeLaSemana = ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'][new Date().getDay()];
    
    getHorarioDoctores(diaDeLaSemana).then(data => {
        const divBody = document.getElementById('doctoresHorarioContainer');
        if (!divBody) return;
        divBody.innerHTML = '';

        // 1. AGRUPAR: Aseguramos que el nombre no tenga espacios extra
        const doctoresAgrupados = data.reduce((acc, current) => {
            const nombreKey = current.nombre_completo.trim(); // Limpiamos espacios
            
            if (!acc[nombreKey]) {
                acc[nombreKey] = {
                    nombre: nombreKey,
                    titulo: current.titulo,
                    turnos: []
                };
            }
            
            const nuevoTurno = `${current.hora_inicio} - ${current.hora_fin}`;
            
            // Evitamos duplicar exactamente el mismo horario si la API lo manda repetido
            if (!acc[nombreKey].turnos.includes(nuevoTurno)) {
                acc[nombreKey].turnos.push(nuevoTurno);
            }
            
            return acc;
        }, {});

        console.log('Doctores procesados:', doctoresAgrupados); // Revisa esto en tu consola

        // 2. RENDERIZAR
        Object.values(doctoresAgrupados).forEach(doctor => {
            const row = document.createElement('div');
            
            // Generamos los badges. Usamos 'd-inline-block' para que se vean bien
            const htmlHorarios = doctor.turnos.map(turno => 
                `<span class="badge badge-soft-success d-block mb-1" style="font-size: 12px;">${turno}</span>`
            ).join('');

            row.innerHTML = `
                <div class="d-flex justify-content-between align-items-start mb-3 border-bottom pb-2">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-md me-2 badge-soft-success rounded-circle">
                            <i class="ti ti-stethoscope fs-20"></i>
                        </div>
                        <div class="ms-2">
                            <h6 class="fw-semibold fs-14 text-truncate mb-1">
                                ${doctor.nombre}
                            </h6>
                            <p class="fs-13 mb-0 text-muted">${doctor.titulo}</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ms-2 text-end">
                        ${htmlHorarios}
                    </div>
                </div>
            `;
            divBody.appendChild(row);
        });

        document.getElementById('loadingHorarioDoctores')?.classList.add('d-none');
        document.getElementById('doctoresHorarioContainer')?.classList.remove('d-none');

    }).catch(error => {
        console.error('Error updating horario doctores:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateTotalPacientes();
    updateTotalCitas();
    updateTotalOrdenesClinicas();
    updateTotalConsultasFueraHorario();
    updateLastCitasProgramadas();
    getChartEstadisticasPacientes();
    updateUltimosPacientesRegistrados();
    updateChartPacientesPorSexo();
    updateHorarioDoctores();
    updateLastConsultas();
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

function renderChartPacientesPorSexo(apiData) {
    if ($('#pacientes-visitas-sexo').length > 0) {
        // 1. Obtener los totales
        const totalHombres = apiData.find(d => d.sexo === 'M')?.total || 0;
        const totalMujeres = apiData.find(d => d.sexo === 'F')?.total || 0;
        const sumaTotal = totalHombres + totalMujeres;

        // 2. Calcular los porcentajes (Evitamos división por cero)
        const porcHombres = sumaTotal > 0 ? Math.round((totalHombres / sumaTotal) * 100) : 0;
        const porcMujeres = sumaTotal > 0 ? Math.round((totalMujeres / sumaTotal) * 100) : 0;

        document.getElementById('porcentaje-hombres').innerHTML = `${porcHombres}%`;
        document.getElementById('porcentaje-mujeres').innerHTML = `${porcMujeres}%`;

        var Patientsoptions = {
            // Ahora pasamos los porcentajes calculados
            series: [porcHombres, porcMujeres],
            chart: {
                height: 400,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    offsetY: -20,
                    startAngle: -135,
                    endAngle: 135,
                    hollow: {
                        margin: 15,
                        size: '60%',
                        background: '#fff'
                    },
                    track: {
                        background: '#f2f2f2', // Un gris claro queda mejor que blanco sobre blanco
                        strokeWidth: '97%',
                        margin: 5, 
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '16px',
                            color: '#64748B',
                            offsetY: -10
                        },
                        value: {
                            show: true,
                            fontSize: '22px',
                            color: '#0F172A',
                            offsetY: 5,
                            fontWeight: 700,
                            formatter: function (val) {
                                return val + "%"; // Agregamos el símbolo de %
                            }
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: 'Total Pacientes',
                            fontSize: '14px',
                            fontWeight: 400,
                            color: '#334155',
                            // 3. Mostramos el número real (15) en el centro en lugar del promedio de %
                            formatter: function (w) {
                                return sumaTotal;
                            }
                        }
                    }
                }
            },
            stroke: {
                lineCap: 'round' // Esto hace que las puntas de las barras sean redondeadas
            },
            colors: ['#1F6DB2', '#6A1B9A'],
            labels: ['Hombres', 'Mujeres'],
        };

        // Limpiar el contenedor antes de renderizar
        document.querySelector("#pacientes-visitas-sexo").innerHTML = '';
        var Patientschart = new ApexCharts(document.querySelector("#pacientes-visitas-sexo"), Patientsoptions);
        if (Patientschart) Patientschart.render();
    }
}

function updateChartPacientesPorSexo() {
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1;
    const currentYear = currentDate.getFullYear();
    document.getElementById('loadingGraficaPacientesSexo').classList.remove('d-none');
    getTotalPacientesPorSexo(currentMonth, currentYear).then(data => {
        renderChartPacientesPorSexo(data);
        document.getElementById('loadingGraficaPacientesSexo').classList.add('d-none');
        //$('#pacientes-visitas-sexo').removeClass('d-none');
        document.getElementById('pacientes-visitas-sexo').classList.remove('d-none');
        document.getElementById('pacientes-visitas-sexo-leyenda').classList.remove('d-none');
    }).catch(error => {
        console.error('Error fetching total pacientes por sexo:', error);
    });
}