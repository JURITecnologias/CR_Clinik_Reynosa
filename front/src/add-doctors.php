<?php
ob_start();
$user = include(__DIR__ . '/../src/user_session.php');
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
                <h4 class="mb-1">Registrar Doctor</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Registrar Doctor</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="doctors.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Volver a Doctores</a>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- row start -->
        <div id="info-doctor" class="">
            <div class="col-xl-9 col-lg-8">
                <div class="card" id="user-selection">
                    <div class="card-header">
                        <h5 class="mb-0">Seleccion de usuario</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email de usuario" aria-label="Email de usuario" aria-describedby="button-addon2" id="email_user">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="LookForUser()">Buscar</button>
                            <input type="hidden" id="doctor-id" value="">
                        </div>

                        <div class="d-none alert alert-danger " role="alert" id="user_not_found_alert">
                            <span id="user_not_found_message"><strong>Error - </strong> No se encontró ningún usuario con ese correo electrónico.</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="d-none patient-form-wizard flex-fill" id="doctor-info">
                    <!-- start basic information -->
                    <div class="form-wizard-content active">
                        <form action="add-doctors.php">
                            <!-- Start Basic Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Información Básica</h5>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nombre(s)<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-nombres">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Apellidos<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-apellidos">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Titulo<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-titulo">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Num. Cedula<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-cedula">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Universidad<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-universidad">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Especialidad<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-especialidad">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Telefono Personal<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-telefono_personal">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Telefono<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-telefono">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Telefono Emergencia<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-telefono_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fecha de Nacimiento<span class="text-danger ms-1">*</span></label>
                                                <div class="input-group w-auto input-group-flat">
                                                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" id="frm-add-fecha_nacimiento">
                                                    <span class="input-group-text">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Experiencia<span class="text-danger ms-1">*</span>(años)</label>
                                                <input type="number" class="form-control" id="frm-add-experiencia" value="0">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Direccion<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm-add-direccion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Basic Information -->
                            <!-- End Account Details -->
                        </form>
                    </div>

                    <!-- start extra information -->
                    <div class="form-wizard-content active">
                        <form>

                            <!-- Start Firma Details -->
                            <div class="card mb-0 d-none">
                                <div class="card-header">
                                    <h5 class="mb-0">Firma</h5>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                            </div>
                            <!-- Start Membership Details -->

                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2 mt-3">
                                <button type="button" class="btn btn-primary next-tab-btn" id="save-basic-info" onclick="InsertDoctor()">Guardar</button>
                            </div>
                            <div id="loading-insert-doctor" class="d-none">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <!-- row end -->

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<!-- ========================
        End Page Content
    ========================= -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {

    }
</script>

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>