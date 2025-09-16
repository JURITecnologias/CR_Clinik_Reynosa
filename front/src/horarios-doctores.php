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
                <h4 class="mb-1">Horarios Doctores</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="general-settings.php">Administraci&oacute;n</a></li>
                        <li class="breadcrumb-item active">Horarios Doctores</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <?php include_once '../partials/loading-section.php'; ?>
        <div class="d-none" id="horarios_doctores_container">
            <div class="card">
            <div class="card-header">
                <h5 class="card-title">Horario de Doctor</h5>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="frm_doctor_select">Doctor</label>
                        <select class="form-select" id="frm_doctor_select">
                        </select>
                    </div>
                </form>

            </div> <!-- end card-body -->
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lista de Horarios</h5>
                <div class="text-end">
                    <button class="btn btn-primary" id="btn_add_horario">Agregar Horario</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                        </tr>
                    </thead>
                    <tbody id="horarios_table_body">
                        <!-- Los horarios se agregarán aquí dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        
    </div>
    <!-- End Content -->



    <?php require_once '../partials/footer.php'; ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        loadDoctoresSelect();
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->


<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>