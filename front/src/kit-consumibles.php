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
                <h4 class="mb-1">Kits de Consumibles</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Kits de Consumibles</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a class="btn btn-primary" onclick="createNewKitPage()"><i class="ti ti-square-rounded-plus me-1"></i>Registrar Kit</a>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <div class="input-group mb-3 mt-2">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por kit" aria-label="Buscar por kit" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="LookForKitByName()">Buscar</button>
        </div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="kits_container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Listado de Kits de Consumibles</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <?php
                            $registros = isset($_GET['registros']) ? intval($_GET['registros']) : 50;
                            ?>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1">Registros</span>
                                <select class="form-select form-select-sm" id="example-select-1" name="registros" onchange="window.location.search = '?registros=' + this.value;">
                                    <option value="50" <?php echo $registros == 50 ? 'selected' : ''; ?>>50</option>
                                    <option value="100" <?php echo $registros == 100 ? 'selected' : ''; ?>>100</option>
                                    <option value="300" <?php echo $registros == 300 ? 'selected' : ''; ?>>300</option>
                                </select>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0 pagination_control" id="pagination_control">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    <!-- Aquí irá el accordion de kits -->
                    <div id="kits_accordion_container">
                        <div class="accordion accordion-bordered" id="kits_accordion_info">
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php require_once '../partials/footer.php'; ?>
</div>


<div id="danger-modal-delete-kit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modal-delete-kitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-danger border-0">
                <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Kit</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">¿Está seguro de que desea eliminar este kit?</h5>
                <p>Esta acción no se puede deshacer. </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="kit_id_eliminar" value="">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="ConfirmEliminarKit()">Eliminar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<!-- ========================
        End Page Content
    ========================= -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEventKits();
    });

    function loadEventKits() {
        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;
        const ordenby = "<?php echo isset($_GET['direccion']) ? addslashes($_GET['direccion']) : 'desc'; ?>";
        loadDataKits(registros, pagina, busqueda, ordenby);
    }
</script>

<?php
$content = ob_get_clean();
require_once '../partials/main.php';
