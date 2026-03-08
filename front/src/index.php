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
                                <h5 class="mb-0">Total: <span id="totalFuerHorario">0</span> de <span id="totalConsultas">0</span></h5>
                                <h5 class="mb-0"></h5>
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
                        <h5 class="mb-0">Horario Doctores De Hoy</h5>
                    </div>
                    <div class="card-body">
                        <div id="loadingHorarioDoctores" class="">
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                <div class="spinner-grow text-primary m-2" role="status"></div>
                            </div>
                        </div>
                        <div class="overflow-auto d-none" id="doctoresHorarioContainer">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-success rounded-circle">
                                        <i class="ti ti-stethoscope fs-20"></i>
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Nombre Doctor</a></h6>
                                            <p class="fs-13 mb-0">Titulo Doctor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <span class="badge badge-soft-success">00:00 - 13:00</span>
                                    <p><span class="badge badge-soft-success">15:00 - 20:00</span></p>
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

        <!-- row end -->

        <!-- card start -->
        <div class="card shadow flex-fill w-100 mb-0">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                <h5 class="mb-0">Últimas Consultas</h5>
                <a href="consultas.php" class="btn btn-sm btn-white flex-shrink-0">Ver Todas</a>
            </div>
            <div class="card-body">
                <!-- tabla inicio -->
                <div id="loadingUltimasConsultas" class="">
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <div class="spinner-grow text-primary m-2" role="status"></div>
                    </div>
                </div>
                <div class="table-responsive table-nowrap d-none" id="ultimasConsultasTableContainer">
                    <table class="table border mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre del Paciente</th>
                                <th>Fecha y hora consulta</th>
                                <th>Nombre del Doctor</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="ultimasConsultasTable">
                            
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