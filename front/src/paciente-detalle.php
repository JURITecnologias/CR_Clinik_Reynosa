<?php ob_start();?>

    <!-- ========================
        Inicio del Contenido de la Página
    ========================= -->

    <div class="page-wrapper">

        <!-- Inicio del Contenido -->
        <div class="content">

            <!-- Encabezado de Página -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div class="breadcrumb-arrow">
                    <h4 class="mb-1">Detalles del Paciente</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>                            
                            <li class="breadcrumb-item active">Detalles del Paciente</li>
                        </ol>
                    </div>
                </div>
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Volver a Pacientes</a>
            </div>
            <!-- Fin Encabezado de Página -->
            <div id="alert_placeholder" class="mb-3"></div>
            <!-- inicio pestañas -->
                <ul class="nav nav-tabs nav-item-primary mb-3 border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="paciente-detalle.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold active">
                        Perfil del Paciente
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="paciente-consultas-previas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Consultas Previas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="paciente-citas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Citas programadas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="paciente-ordenes-clinicas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Ordenes Clinicas
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="patient-details-lab-results.php" class="nav-link border rounded fw-semibold">
                        Resultados de Laboratorio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-prescription.php" class="nav-link border rounded fw-semibold">
                        Recetas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-medical-history.php" class="nav-link border rounded fw-semibold">
                        Historial Médico
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-documents.php" class="nav-link border rounded fw-semibold">
                        Documentos
                    </a>
                </li> -->
            </ul>
            <!-- fin pestañas -->
             <?php include __DIR__ . '/../partials/loading-section.php'; ?>

            <!-- inicio fila -->
            <div class="row d-none" id="patient-detail-container">
                
                <!-- inicio columna -->
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                                <!-- <div class="avatar avatar-xxl me-3">
                                    <img src="assets/img/avatars/avatar-03.jpg" alt="paciente" class="rounded">
                                </div> -->
                                <div>
                                    <span class="badge badge-soft-primary" id="patient-id-label">#PT001</span>
                                    <h5 class="mb-1 mt-2" id="patient-nombres-label">Reyan Verol</h5>
                                    <!-- <p class="fs-13 mb-0" id="patient-ultima-visita-label">Última Visita : 24 Ene 2025</p> -->
                                </div>
                            </div>
                            <h6 class="mb-2">Información Básica</h6>
                            <p class="mb-3">Agregado el <span class="float-end text-dark" id="patient-fecha-agregado-label"></span></p>
                            <p class="mb-3">Fecha de Nacimiento <span class="float-end text-dark" id="patient-fecha-nacimiento-label"></span></p>
                            <p class="mb-3">Edad <span class="float-end text-dark" id="patient-edad-label"></span></p>
                            <p class="mb-3">Género <span class="float-end text-dark" id="patient-genero-label"></span></p>
                            <p class="mb-3">CURP <span class="float-end text-dark" id="patient-curp-label"></span></p>
                            <p class="mb-3">NSS <span class="float-end text-dark" id="patient-nss-label"></span></p>
                            <p class="mb-3">Estado Civil <span class="float-end text-dark" id="patient-estado-civil-label"></span></p>
                            <!-- <p class="mb-3">Grupo Sanguíneo <span class="float-end text-dark" id="patient-grupo-sanguineo-label">O+ve</span></p> -->
                            <p class="mb-3">Teléfono <span class="float-end text-dark" id="patient-telefono-label"></span></p>
                            <p class="mb-3">Email <span class="float-end text-dark" id="patient-email-label"></span></p>
                            <!-- <p class="mb-3">Referido Por <a href="doctor-details.php" class="float-end text-decoration-underline link-primary">Dr Antonio</a></p> -->
                            <!-- <p class="mb-3">Total de Reservas <span class="float-end text-dark">+12</span></p> -->
                            <h6 class="mb-2 mt-3 mb-2 pt-3 border-top">Información de Contacto</h6>
                            <p class="mb-0">Contacto de Emergencia <span class="float-end text-dark" id="patient-contacto-emergencia-label"></span></p>
                            <p class="mb-0">Dirección <span class="float-end text-dark" id="patient-direccion-label"></span></p>

                        </div>
                    </div>
                </div>
                <!-- fin columna -->

                <!-- inicio columna -->
                <div class="col-xl-8">

                    <!-- inicio tarjeta -->
                        <!-- <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0 d-inline-flex align-items-center">Citas</h5> 
                            <a href="appointments.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todas</a>
                        </div>
                        <div class="card-body">
                            <div class="row row-gap-3">
                                <div class="col-xl-6 d-flex">
                                    <div class="p-3 border rounded flex-fill">
                                        <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3">
                                            <span class="badge badge-soft-purple">Próxima</span>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-secondary" aria-label="video"><i class="ti ti-video"></i></a>
                                        </div>
                                        <div class="row row-gap-3">
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Departamento</h6>
                                                <p class="fs-13 mb-0">Cardiología</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Doctor</h6>
                                                <p class="fs-13 mb-0 text-truncate">Dr. Andrew Clark</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Fecha y Hora</h6>
                                                <p class="fs-13 mb-0">21 Dic 2024, 07:00 AM</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Reservado el</h6>
                                                <p class="fs-13 mb-0">20 Dic 2024</p>
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="col-xl-6 d-flex">
                                    <div class="p-3 border rounded flex-fill">
                                        <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3">
                                            <span class="badge badge-soft-success">Completada</span>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-primary" aria-label="phone"><i class="ti ti-phone"></i></a>
                                        </div>
                                        <div class="row row-gap-3">
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Departamento</h6>
                                                <p class="fs-13 mb-0">Radiología</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Doctor</h6>
                                                <p class="fs-13 mb-0 text-truncate">Dr. Laura Mitchell</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Fecha y Hora</h6>
                                                <p class="fs-13 mb-0">15 Ene 2025, 10:35 AM</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Reservado el</h6>
                                                <p class="fs-13 mb-0">13 Ene 2025</p>
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- fin tarjeta -->

                    <!-- inicio tarjeta -->
                    <!-- <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0 d-inline-flex align-items-center">Signos Vitales</h5>
                            <a href="javascript:void(0);" class="link-danger text-decoration-underline">Datos Anteriores</a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-droplet fs-16"></i></span>
                                        <div>
                                            <h6 class="fs-14 fw-semibold mb-1 text-truncate">Presión Arterial</h6>
                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">100/67 mmHg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-heart-rate-monitor fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Frecuencia Cardíaca</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">89 lpm</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-hexagons fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1">SPO2</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">98 %</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-temperature fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Temperatura</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">101 C</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-ease-in fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Frecuencia Respiratoria</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">24 rpm</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-circuit-switch-open fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Peso</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">100 kg</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- fin tarjeta -->

                    <!-- inicio tarjeta -->
                    <!-- <div class="card mb-0">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="fw-bold mb-0 d-inline-flex align-items-center">Historial de Visitas</h5> 
                            <a href="visits.php" class="btn btn-sm btn-outline-light flex-shrink-0">Ver Todas</a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row row-gap-3">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="doctor-details.php" class="avatar flex-shrink-0">
                                                    <img src="assets/img/doctors/doctor-12.jpg" class="rounded" alt="doctor">
                                                </a>
                                                <div class="ms-2">
                                                    <div>
                                                        <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Samuel Turner</a></h6>
                                                        <p class="fs-13 mb-0">Cardiología, MD, FRCS</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 row-gap-2">
                                                <div class="col-sm-7">
                                                    <h6 class="fw-semibold mb-1 fs-14">Visitado el</h6>
                                                    <p class="fs-13 mb-0 text-truncate">21 Dic 2024, 07:00 AM</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h6 class="fw-semibold mb-1 fs-14">Seguimiento</h6>
                                                    <p class="fs-13 mb-0">Después de 15 Días</p>
                                                </div>
                                            </div>
                                            <div class="p-3 bg-light rounded">
                                                <h6 class="fw-semibold mb-1 fs-14">Notas</h6>
                                                <p class="fs-13 mb-0 text-truncate line-clamb-2">Información detallada sobre los síntomas que llevaron al paciente a la visita</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="doctor-details.php" class="avatar flex-shrink-0">
                                                    <img src="assets/img/doctors/doctor-09.jpg" class="rounded" alt="doctor">
                                                </a>
                                                <div class="ms-2">
                                                    <div>
                                                        <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Natalie Foster</a></h6>
                                                        <p class="fs-13 mb-0">Neurología, MD, DNB</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 row-gap-2">
                                                <div class="col-sm-7">
                                                    <h6 class="fw-semibold mb-1 fs-14">Visitado el</h6>
                                                    <p class="fs-13 mb-0 text-truncate">08 Ene 2024, 09:55 AM</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h6 class="fw-semibold mb-1 fs-14">Seguimiento</h6>
                                                    <p class="fs-13 mb-0">Después de 12 Días</p>
                                                </div>
                                            </div>
                                            <div class="p-3 bg-light rounded">
                                                <h6 class="fw-semibold mb-1 fs-14">Notas</h6>
                                                <p class="fs-13 mb-0 text-truncate line-clamb-2">Información proporcionada al paciente sobre su condición y síntomas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- fin tarjeta -->

                    <!-- inicio tarjeta -->
                        <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0 d-inline-flex align-items-center">Antecedentes Médicos</h5> 
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Enfermedades Cronicas <span class="float-end text-dark" id="patient-enfermedades-cronicas-label"></span></p>
                            <p class="mb-3">Hospitalizaciones Previas <span class="float-end text-dark" id="patient-hospitalizaciones-previas-label"></span></p>
                            <p class="mb-3"> Medicamentos actuales <span class="float-end text-dark" id="patient-medicamentos-actuales-label"></span></p>
                            <p class="mb-3">Alergias <span class="float-end text-dark" id="patient-alergias-label"></span></p>
                            <p class="mb-3">Vacunas Recientes <span class="float-end text-dark" id="patient-vacunas-recientes-label"></span></p>
                            <p class="mb-3"> Antecedentes Familiares <span class="float-end text-dark" id="patient-antecedentes-familiares-label"></span></p>
                            <p class="mb-3"> Transfusiones <span class="float-end text-dark" id="patient-transfusiones-label"></span></p>
                            <p class="mb-3"> Fuma <span class="float-end text-dark" id="patient-fuma-label"></span></p>
                            <p class="mb-3"> Alcohol <span class="float-end text-dark" id="patient-alcohol-label"></span></p>
                            <p class="mb-3"> Apoyo Psicologico <span class="float-end text-dark" id="patient-apoyo-psicologico-label"></span></p>
                            <p class="mb-3"> Frecuencia Alcohol  <span class="float-end text-dark" id="patient-frecuencia-alcohol-label"></span></p>
                            <p class="mb-3">Frecuencia Tabaco <span class="float-end text-dark" id="patient-frecuencia-tabaco-label"></span></p>
                            <p class="mb-3"> Sustancias Psicoactivas <span class="float-end text-dark" id="patient-sustancias-psicoactivas-label"></span></p>
                            <p class="mb-3"> Alimentacion <span class="float-end text-dark" id="patient-alimentacion-label"></span></p>
                            <p class="mb-3">  Actividad Fisica  <span class="float-end text-dark" id="patient-actividad-fisica-label"></span></p>
                            <p class="mb-3"> Notas <span class="float-end text-dark" id="patient-notas-label"></span></p>
                        </div>
                    </div>
                    <!-- fin tarjeta -->

                </div>
                <!-- fin columna -->

            </div>
            <!-- fin fila -->

        </div>
        <!-- Fin del Contenido -->     

        <?php require_once '../partials/footer.php'; ?>

    </div>
    
    <!-- ========================
        Fin del Contenido de la Página
    ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        const urlParams = new URLSearchParams(window.location.search);
        const pacienteIdEncoded = urlParams.get('b');
        if (pacienteIdEncoded) {
            const pacienteId = atob(pacienteIdEncoded);
            console.log('ID del paciente decodificado:', pacienteId);
            loadPacienteLayout(pacienteId);
        }
    }
</script>
<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>