<?php ob_start();
// include session file for user authentication  
$user = include(__DIR__ . '/user_session.php');

?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Bienvenido, <?php echo $user['user']['name'] ?></h4>

            </div>
        </div>
        <!-- End Page Header -->

        <!-- row start -->
        <div class="row">

            <!-- col start  Total pacientes-->
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card pb-2 flex-fill">
                    <div class="d-none align-items-center justify-content-between gap-1 card-body pb-0 mb-1" id="totalPacientesInfoContainer">
                        <div class="d-flex align-items-center overflow-hidden">
                            <span class="avatar bg-primary rounded-circle flex-shrink-0"><i class="ti ti-user-exclamation fs-20"></i></span>
                            <div class="ms-2 overflow-hidden">
                                <p class="mb-1 text-truncate">Pacientes</p>
                                <h5 class="mb-0">Total: <span id="totalPacientes">0</span></h5>
                            </div>
                        </div>
                    </div>
                    <div id="loadingTotalPacientes">
                        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <div class="spinner-grow text-primary m-2" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start Total citas -->
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card pb-2 flex-fill">
                    <div class="d-none align-items-center justify-content-between gap-1 card-body pb-0 mb-1" id="totalCitasInfoContainer">
                        <div class="d-flex align-items-center overflow-hidden">
                            <span class="avatar bg-orange rounded-circle flex-shrink-0"><i class="ti ti-calendar-check fs-20"></i></span>
                            <div class="ms-2 overflow-hidden">
                                <p class="mb-1 text-truncate">Citas</p>
                                <h5 class="mb-0">Total: <span id="totalCitas">0</span></h5>
                            </div>
                        </div>
                    </div>
                    <div id="loadingTotalCitas">
                        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <div class="spinner-grow text-primary m-2" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start Ordenes clinicas -->
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card pb-2 flex-fill">
                    <div class="d-none align-items-center justify-content-between gap-1 card-body pb-0 mb-1" id="totalOrdenesClinicasInfoContainer">
                        <div class="d-flex align-items-center overflow-hidden">
                            <span class="avatar bg-purple rounded-circle flex-shrink-0"><i class="ti ti-stethoscope fs-20"></i></span>
                            <div class="ms-2 overflow-hidden">
                                <p class="mb-1 text-truncate">Ordenes Clinicas</p>
                                <h5 class="mb-0">Total Completas:<span id="totalOrdenesClinicasCompletas">0</span></h5>
                                <h5 class="mb-0">Total Pendientes:<span id="totalOrdenesClinicasPendientes">0</span></h5>
                            </div>
                        </div>
                    </div>
                    <div id="loadingTotalOrdenesClinicas">
                        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <div class="spinner-grow text-primary m-2" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start Consultas fuera de horarios -->
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card pb-2 flex-fill">
                    <div class="d-none align-items-center justify-content-between gap-1 card-body pb-0 mb-1" id="totalFuerHorarioInfoContainer">
                        <div class="d-flex align-items-center overflow-hidden">
                            <span class="avatar bg-danger rounded-circle flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-alert-octagon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14.897 1a4 4 0 0 1 2.664 1.016l.165 .156l4.1 4.1a4 4 0 0 1 1.168 2.605l.006 .227v5.794a4 4 0 0 1 -1.016 2.664l-.156 .165l-4.1 4.1a4 4 0 0 1 -2.603 1.168l-.227 .006h-5.795a3.999 3.999 0 0 1 -2.664 -1.017l-.165 -.156l-4.1 -4.1a4 4 0 0 1 -1.168 -2.604l-.006 -.227v-5.794a4 4 0 0 1 1.016 -2.664l.156 -.165l4.1 -4.1a4 4 0 0 1 2.605 -1.168l.227 -.006h5.793zm-2.887 14l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" />
                                </svg></span>
                            <div class="ms-2 overflow-hidden">
                                <p class="mb-1 text-truncate">Consultas Fuera de Horario (ultimos 60 dias)</p>
                                <h5 class="mb-0">Total: <span id="totalFuerHorario">0</span></h5>
                                <h5 class="mb-0">Total de consultas: <span id="totalConsultas">0</span></h5>
                            </div>
                        </div>
                    </div>
                    <div id="loadingTotalFuerHorario">
                        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <div class="spinner-grow text-primary m-2" role="status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row">

            <!-- col start -->
            <div class="col-xl-6 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="fw-bold mb-0">Solicitud de Cita</h5>
                        <a href="citas.php" class="btn btn-sm btn-white flex-shrink-0">Todas las Citas</a>
                    </div>
                    <div class="card-body p-1 py-2">
                        <div id="loadingCitasProgramadas" class="">
                            <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                                <div class="spinner-grow text-primary m-2" role="status"></div>
                            </div>
                        </div>
                        <!-- table start -->
                        <div class="table-responsive table-nowrap d-none" id="TableCitasProgramadas">
                            <table class="table table-borderless mb-0" id="lastCitasProgramadasTable">
                                <tbody id="lastCitasProgramadasTableBody">
                                </tbody>
                            </table>
                        </div>
                        <!-- table start -->
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-6 d-flex">
                <div class="card shadow flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="fw-bold mb-0">Estadísticas de Pacientes</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div id="loadingGraficaPacientes" class="">
                            <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                                <div class="spinner-grow text-primary m-2" role="status"></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <!-- <h6 class="fs-14 fw-semibold mb-0">Total de Pacientes : 480</h6> -->
                            <!-- <div class="d-flex align-items-center gap-3">
                                <p class="mb-0 text-dark"><i class="ti ti-point-filled me-1 text-primary"></i>Nuevos Pacientes</p>
                                <p class="mb-0 text-dark"><i class="ti ti-point-filled me-1 text-soft-primary"></i>Pacientes Antiguos</p>
                            </div> -->
                        </div>
                        <div id="chart-pacientes" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <!-- col end -->

        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row justify-content-center">

            <!-- col start -->
            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="patients.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-primary rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-users"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Todos los Pacientes</h6>
                    </div>
                </a>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="doctors.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-success rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-topology-bus"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Doctores</h6>
                    </div>
                </a>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="citas.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-purple rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-calendar-time"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Citas</h6>
                    </div>
                </a>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="ordenes-clinicas.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-warning rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-id"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Ordenes Clinicas</h6>
                    </div>
                </a>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="consultas.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-danger rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-prescription"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Consultas</h6>
                    </div>
                </a>
            </div>
            <!-- col end -->


            <!-- col start -->
            <!-- <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="medical-results.php" class="card">
                    <div class="card-body text-center">
                        <span class="badge-soft-teal rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-file-description"></i></span>
                        <h6 class="fs-14 fw-semibold text-truncate mb-0">Resultados Médicos</h6>
                    </div>
                </a>
            </div> -->
            <!-- col end -->

        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row">

            <!-- inicio columna -->
            <div class="col-xl-4 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="mb-0">Registro de Pacientes</h5>
                        <a href="patients.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todos</a>
                    </div>
                    <div id="loadingUltimosPacientes" class="">
                        <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                            <div class="spinner-grow text-primary m-2" role="status"></div>
                        </div>
                    </div>
                    <div class="card-body pb-1" id="ListUltimosPacientesContainer">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0);" class="avatar me-2 badge-soft-success rounded-circle">
                                    <i class="ti ti-user fs-20"></i>
                                </a>
                                <div>
                                    <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">David Marshall</a></h6>
                                    <p class="mb-0 fs-13">Alta en Sistema: 3 Abril 2023</p>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-eye"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-4 col-md-6 d-flex">
                <div class="card shadow flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="mb-0">Visitas de Pacientes</h5>
                        <a href="visits.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todas</a>
                    </div>
                    <div class="card-body">
                        <div id="loadingGraficaPacientesSexo" class="">
                            <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                                <div class="spinner-grow text-primary m-2" role="status"></div>
                            </div>
                        </div>
                        <div id="pacientes-visitas-sexo" class="mb-3" style="margin-top: 50px;"></div>
                        <div id="pacientes-visitas-sexo-leyenda" class="d-none">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="avatar bg-primary rounded-circle flex-shrink-0"><i class="ti ti-gender-male fs-20"></i></span>
                                    <div class="ms-2">
                                        <h6 class="mb-1 fs-14 fw-semibold">Hombres</h6>
                                        <!-- <p class="mb-1 fs-13 text-truncate"><span class="text-success">-15%</span> Desde la semana pasada</p> -->
                                    </div>
                                </div>
                                <h6 class="mb-0"><span id="porcentaje-hombres">69%</span></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="d-flex align-items-center">
                                    <span class="avatar bg-purple rounded-circle flex-shrink-0"><i class="ti ti-gender-female fs-20"></i></span>
                                    <div class="ms-2">
                                        <h6 class="mb-1 fs-14 fw-semibold">Mujeres</h6>
                                        <!-- <p class="mb-1 fs-13 text-truncate"><span class="text-success">-15%</span> Desde la semana pasada</p> -->
                                    </div>
                                </div>
                                <h6 class="mb-0"><span id="porcentaje-mujeres">56%</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-4 col-md-6 d-flex">
                <div class="card shadow flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="mb-0">Doctores</h5>
                        <a href="doctors.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todos</a>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="doctor-details.php" class="avatar flex-shrink-0">
                                        <img src="assets/img/doctors/doctor-01.jpg" class="rounded" alt="doctor">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. William Harrison</a></h6>
                                            <p class="fs-13 mb-0">Cardiología</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-success">Disponible</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="doctor-details.php" class="avatar flex-shrink-0">
                                        <img src="assets/img/doctors/doctor-11.jpg" class="rounded" alt="doctor">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Victoria Adams</a></h6>
                                            <p class="fs-13 mb-0">Urología</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-danger">No disponible</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="doctor-details.php" class="avatar flex-shrink-0">
                                        <img src="assets/img/doctors/doctor-06.jpg" class="rounded" alt="doctor">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Jonathan Bennett</a></h6>
                                            <p class="fs-13 mb-0">Radiología</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-success">Disponible</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="doctor-details.php" class="avatar flex-shrink-0">
                                        <img src="assets/img/doctors/doctor-07.jpg" class="rounded" alt="doctor">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Natalie Brooks</a></h6>
                                            <p class="fs-13 mb-0">Cirugía de ORL</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-success">Disponible</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <div class="d-flex align-items-center">
                                    <a href="doctor-details.php" class="avatar flex-shrink-0">
                                        <img src="assets/img/doctors/doctor-12.jpg" class="rounded" alt="doctor">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Samuel Reed</a></h6>
                                            <p class="fs-13 mb-0">Dermatología</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-success">Disponible</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row">
            <!-- col start -->
            <div class="col-xl-5 d-flex">
                <div class="card shadow flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Departamentos Principales</h5>
                        <a href="javascript:void(0);" class="btn btn-sm btn-white flex-shrink-0">Ver Todos</a>
                    </div>
                    <div class="card-body">
                        <div class="row row-gap-3 align-items-center mb-4">
                            <div class="col-sm-6">
                                <div class="position-relative">
                                    <canvas id="attendance" height="180"></canvas>
                                    <div class="position-absolute text-center top-50 start-50 translate-middle">
                                        <p class="fs-13 mb-1">Citas</p>
                                        <h3>3656</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-start text-center">
                                    <p class="text-dark mb-2"><i class="ti ti-circle-filled text-info fs-13 me-1"></i>Cardiología</p>
                                    <p class="text-dark mb-2"><i class="ti ti-circle-filled text-cyan fs-13 me-1"></i>Neurología</p>
                                    <p class="text-dark mb-2"><i class="ti ti-circle-filled text-purple fs-13 me-1"></i>Dermatología</p>
                                    <p class="text-dark mb-2"><i class="ti ti-circle-filled text-orange fs-13 me-1"></i>Ortopedia</p>
                                    <p class="text-dark mb-2"><i class="ti ti-circle-filled text-warning fs-13 me-1"></i>Urología</p>
                                    <p class="text-dark mb-0"><i class="ti ti-circle-filled text-indigo fs-13 me-1"></i>Radiología</p>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-1">
                            <div class="row g-0">
                                <div class="col-6 p-2 border-end text-center">
                                    <h5 class="mb-1">$2512.32</h5>
                                    <p class="mb-0 text-body">Ingresos Generados</p>
                                </div>
                                <div class="col-6 p-2 text-center">
                                    <h5 class="mb-1">3125+</h5>
                                    <p class="mb-0 text-body">Citas el mes pasado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->

            <!-- col start -->
            <div class="col-xl-7 d-flex">
                <!-- tarjeta inicio -->
                <div class="card shadow flex-fill w-100">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="mb-0">Registro de Pacientes</h5>
                        <a href="medical-results.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todos</a>
                    </div>
                    <div class="card-body">
                        <!-- tabla inicio -->
                        <div class="table-responsive table-nowrap">
                            <table class="table border mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nombre del Paciente</th>
                                        <th>Diagnóstico</th>
                                        <th>Departamento</th>
                                        <th>Última Visita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">James Carter</a></h6>
                                        </td>
                                        <td>Masculino</td>
                                        <td><span class="badge badge-soft-info">Cardiología</span></td>
                                        <td>17 Jun 2025</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Emily Davis</a></h6>
                                        </td>
                                        <td>Femenino</td>
                                        <td><span class="badge badge-soft-success">Urología</span></td>
                                        <td>10 Jun 2025</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Michael John</a></h6>
                                        </td>
                                        <td>Masculino</td>
                                        <td><span class="badge badge-soft-info">Radiología</span></td>
                                        <td>22 May 2025</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Olivia Miller</a></h6>
                                        </td>
                                        <td>Femenino</td>
                                        <td><span class="badge badge-soft-purple">Cirugía de ORL</span></td>
                                        <td>15 May 2025</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">David Smith</a></h6>
                                        </td>
                                        <td>Masculino</td>
                                        <td><span class="badge badge-soft-teal">Dermatología</span></td>
                                        <td>30 Abr 2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- tabla fin -->
                    </div>
                </div>
                <!-- tarjeta fin -->
            </div>
            <!-- col end -->

        </div>
        <!-- row end -->

        <!-- card start -->
        <div class="card shadow flex-fill w-100 mb-0">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                <h5 class="mb-0">Últimas Citas</h5>
                <a href="appointments.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todas</a>
            </div>
            <div class="card-body">
                <!-- tabla inicio -->
                <div class="table-responsive table-nowrap">
                    <table class="table border mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID del Paciente</th>
                                <th>Nombre del Paciente</th>
                                <th>Tipo de Sesión</th>
                                <th>Nombre del Doctor</th>
                                <th>Fecha y Hora</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0025</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="patient-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/avatars/avatar-31.jpg" alt="paciente" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">James Carter</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Visita</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/doctors/doctor-01.jpg" alt="doctor" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Andrew Clark</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>17 Jun 2025, 09:00 AM a 10:00 AM</td>
                                <td><span class="badge badge-soft-purple">En progreso</span></td>

                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0024</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="patient-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/avatars/avatar-54.jpg" alt="paciente" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Emily Davis</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Consulta</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/doctors/doctor-07.jpg" alt="doctor" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Katherine Brooks</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>10 Jun 2025, 10:30 AM a 11:30 AM</td>
                                <td><span class="badge badge-soft-purple">En progreso</span></td>

                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0023</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="patient-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/avatars/avatar-38.jpg" alt="paciente" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Michael Johnson</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Visita</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/doctors/doctor-12.jpg" alt="doctor" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Benjamin Harris</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>22 May 2025, 01:15 PM a 02:15 PM</td>
                                <td><span class="badge badge-soft-success">Completado</span></td>

                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0022</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="patient-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/avatars/avatar-43.jpg" alt="paciente" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Olivia Miller</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Consulta</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/doctors/doctor-03.jpg" alt="doctor" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Laura Mitchell</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>15 May 2025, 11:30 AM a 12:30 PM</td>
                                <td><span class="badge badge-soft-success">Completado</span></td>

                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0021</a></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="patient-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/avatars/avatar-41.jpg" alt="paciente" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">David Smith</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>Consulta</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                            <img src="assets/img/doctors/doctor-15.jpg" alt="doctor" class="rounded">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Christopher Lewis</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>30 Abr 2025, 12:20 PM a 01:20 PM</td>
                                <td><span class="badge badge-soft-success">Completado</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- tabla fin -->
            </div>
        </div>
        <!-- card end -->

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>