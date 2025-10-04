<?php

ob_start(); ?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Consulta</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Consulta</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="consultas.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Regresar a Consultas</a>
            </div>
        </div>

        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>
        <!-- start basic information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Informacion Basica del Paciente</h5>
            </div>
            <div class="card-body">
                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                <!-- start row -->
                <div class="row row-gap-3 align-items-center d-none" id="info_paciente_container">
                    <div class="col-lg-6">
                        <div class="d-sm-flex align-items-center">
                            <!-- <a href="javascript:void(0);" class="avatar avatar-xxl me-3 flex-shrink-0">
                                    <img src="assets/img/avatars/avatar-05.jpg" alt="img" class="rounded">
                                </a> -->
                            <div>
                                <h6 class="mb-1 mt-1"><a href="javascript:MostrarInfoPacienteCard();">
                                        <span class="h2 text-primary" id="paciente_nombre"></span>
                                        <input type="hidden" id="paciente_id" value="">
                                    </a></h6>
                                <p class="mb-0">Consulta ID :<span id="consulta_id"></span></p>
                                <input type="hidden" id="consulta_id" value="">
                                <input type="hidden" id="consulta_estatus" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-3 bg-light rounded">
                            <div class="row row-gap-2">
                                <div class="col-6 col-md-4">
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Edad / Género</h6>
                                    <p class="fs-13 mb-0 text-truncate"><span id="paciente_edad"></span> / <span id="paciente_genero"></span></p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <h6 class="fs-14 fw-semibold mb-1 text-truncate">Fecha de Nacimiento</h6>
                                    <p class="fs-13 mb-0 text-truncate"><span id="paciente_fecha_nacimiento"></span></p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <h6 class="fs-14 fw-semibold mb-1">Fecha de Consulta</h6>
                                    <p class="fs-13 mb-0 text-truncate"><span id="consulta_fecha"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" id="btn_ver_historial_medico" data-bs-toggle="modal" data-bs-target="#full-width-modal">Historial Medico</button>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end basic information -->

        <!-- start vitals information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
            <h5 class="d-inline-flex align-items-center mb-0">Signos Vitales</h5>
            <input type="hidden" id="frm_signos_vitales_id" value="">
            </div>
            <div class="card-body pb-0">
            <!-- start row -->
            <div class="row">
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Temperatura:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_temperatura" value="" readonly>
                    <span class="form-control-plaintext">°C</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Frecuencia Cardiaca:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_frecuencia_cardiaca" value="" readonly>
                    <span class="form-control-plaintext">bpm</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Frecuencia Respiratoria:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_frecuencia_respiratoria" value="" readonly>
                    <span class="form-control-plaintext">rpm</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Saturación Oxigeno:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_saturacion_oxigeno" value="" readonly>
                    <span class="form-control-plaintext">%</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Presión Arterial:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_presion_arterial" value="" readonly>
                    <span class="form-control-plaintext">mmHg</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Peso:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_peso" value="" readonly>
                    <span class="form-control-plaintext">kg</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Talla:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_talla" value="" readonly>
                    <span class="form-control-plaintext">cm</span>
                </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-control-plaintext">Estatura:</label>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control-plaintext" id="frm_signos_vitales_estatura" value="" readonly>
                    <span class="form-control-plaintext">cm</span>
                </div>
                </div>
            </div>
            <!-- end row -->
            </div>
        </div>
        <!-- end vitals information -->

        <!-- start complaint information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
            <h5 class="d-inline-flex align-items-center mb-0">Motivo de Consulta/ Queja</h5>
            </div>
            <div class="card-body">
            <!-- start row -->
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="mb-0">
                    <textarea class="form-control-plaintext" id="frm_motivo_consulta" rows="2"></textarea>
                    <div class="invalid-feedback" id="invalid_frm_motivo_consulta"></div>
                </div>
                </div>
            </div>
            <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->
        <!-- start Sintomas information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
            <h5 class="d-inline-flex align-items-center mb-0">Sintomas</h5>
            </div>
            <div class="card-body">
            <!-- start row -->
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="mb-0">
                    <textarea class="form-control-plaintext" id="frm_sintomas" rows="2"></textarea>
                    <div class="invalid-feedback" id="invalid_frm_sintomas"></div>
                </div>
                </div>
            </div>
            <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->

        <!-- start Diagnostico information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
            <h5 class="d-inline-flex align-items-center mb-0">Diagnostico</h5>
            </div>
            <div class="card-body">
            <!-- start row -->
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="mb-0">
                    <textarea class="form-control-plaintext" id="frm_diagnostico" rows="2"></textarea>
                    <div class="invalid-feedback" id="invalid_frm_diagnostico"></div>
                </div>
                </div>
            </div>
            <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->

        <!-- start Indicaciones information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
            <h5 class="d-inline-flex align-items-center mb-0">Indicaciones</h5>
            </div>
            <div class="card-body">
            <!-- start row -->
            <div class="row row-gap-3">
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="mb-0">
                    <textarea class="form-control-plaintext" id="frm_indicaciones" rows="2" id="frm_indicaciones"></textarea>
                    <div class="invalid-feedback" id="invalid_frm_indicaciones"></div>
                </div>
                </div>
            </div>
            <!-- end row -->
            </div>
        </div>
        <!-- end assessment information -->

        <!-- start medications information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Medicamentos</h5>
            </div>
            <div class="card-body">
                <div id="lista_medicamentos" class="d-flex flex-wrap gap-3">
                    <!-- Medicamento cards will be appended here -->
                </div>

            </div>
        </div>
        <!-- end medications information -->

        <!-- start Servicios medicos information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Orden Clinica/ Servicios Medicos</h5>
            </div>
            <div class="card-body">
                <div id="lista_servicios" class="d-flex flex-wrap gap-3">

                </div>
            </div>
        </div>
        <!-- end medications information -->

        <!-- start follow Up information -->
        <div class="card mb-0">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Cita de Seguimiento</h5>
            </div>
            <div class="card-body pb-0">
                <!-- start row -->
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Siguiente Visita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="text" class="form-control-plaintext" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row for time -->
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Hora de la cita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="text" class="form-control-plaintext" placeholder="HH:mm">
                        </div>
                    </div>
                </div>
                <div>
                     <input type="hidden" id="cita_id" value="">
                    <input type="hidden" id="doctor_id" value="">
                    <input type="hidden" id="doc_info" value="">
                    <input type="hidden" id="paciente_info" value="">
                    <input type="hidden" type="hidden" id="receta" value="">
                </div>
                <!-- end row for time -->
            </div>
        </div>

    </div>
    <!-- End Content -->

    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-paciente-historial" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-paciente-historial">Historial Paciente</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#info-general" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Info. General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#antecedentes" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Antecedentes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#consultas-previas" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Consultas Previas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#citas-programadas" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Citas Programadas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#ordenes_clinicas" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Órdenes Clínicas
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="info-general">
                                <div class="p-4" style="width: 50%;">
                                    <?php require_once __DIR__ . '/../partials/info-general-paciente.php'; ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="antecedentes">
                                <div class="p-4" style="width: 50%;">
                                    <?php require_once __DIR__ . '/../partials/antecedentes_medicos.php'; ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="consultas-previas">
                                <div class="accordion" id="ultimas-consultas-accordion">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div> <!-- end modal content -->
        </div> <!-- end modal dialog -->
    </div> <!-- end modal -->


    <?php require_once '../partials/footer.php'; ?>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });


    function loadEvent() {
        const p = '<?php echo isset($_GET['p']) ? $_GET['p'] : 'null'; ?>';
        LoadConsulta(p, false);
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>