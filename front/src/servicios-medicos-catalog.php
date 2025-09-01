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
                <h4 class="mb-1">Servicios Médicos</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="general-settings.php">Administraci&oacute;n</a></li>
                        <li class="breadcrumb-item active">Servicios Médicos</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->


        <div class="card mb-0">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Total de Servicios <span class="badge bg-danger ms-2" id="total_servicios">0</span></h5>
                <?php if (in_array('escribir', $user['permissions'])): ?>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="showAddServicioModal()">
                            <i class="ti ti-square-rounded-plus me-1"></i>Agregar Servicio
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php include_once '../partials/loading-section.php'; ?>
                <div class="info d-none" id="servicios_medicos_section">
                    <div class=" table-responsive table-nowrap">
                        <table class="table border mb-0" id="servicios_medicos_table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Content -->

    <div class="modal fade" id="add_servicio" tabindex="-1" aria-labelledby="add_servicioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_servicioLabel">Agregar Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_servicio_form">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-control" id="categoria" name="categoria" required>
                                <option value="medico" selected>Médico</option>
                                <option value="enfermeria">Enfermería</option>
                                <option value="auxiliares de diagnostico">Auxiliares de Diagnóstico</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="servicio_id" name="servicio_id">
                    <button type="button" class="btn btn-primary" id="save_servicio" onclick="InsertServicioMedico();">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      loadEvent();
    });

    function loadEvent() {
       LoadServiciosMedicos();
    }
</script>
<?php require_once '../partials/footer.php'; ?>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>