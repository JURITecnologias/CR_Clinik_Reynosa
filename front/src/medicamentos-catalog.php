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
                <h4 class="mb-1">Medicamentos</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="general-settings.php">Administraci&oacute;n</a></li>
                        <li class="breadcrumb-item active">Medicamentos</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="input-group mb-3">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por nombre medicamento" aria-label="Buscar por nombre medicamento" aria-describedby="button-addon2"
                value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="BuscarMedicamento()">Buscar</button>
        </div>

        <!-- card start -->
        <div class="card mb-0">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Total de Medicamentos<span class="badge bg-danger ms-2" id="total_medicamentos">0</span></h5>
                <?php if (in_array('escribir', $user['permissions'])): ?>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_medicamento">
                            <i class="ti ti-square-rounded-plus me-1"></i>Agregar Medicamento
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php include_once '../partials/loading-section.php'; ?>
                <div class="info d-none">
                    <div class="row mb-3">
                        <div class="col">
                            <?php
                            // Obtener el parámetro 'registros' del querystring, valor por defecto 10
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
                        <div class="col">
                            <!-- Columna 3: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 4: Puedes agregar contenido aquí -->
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0 pagination_control" id="pagination_medicamentos">
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
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                    </div>
                    <div class=" table-responsive table-nowrap">
                        <table class="table border mb-0" id="user_table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Nombre Genérico</th>
                                    <th>Presentación</th>
                                    <th>Controlado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col">

                        </div>
                        <div class="col">
                            <!-- Columna 3: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 4: Puedes agregar contenido aquí -->
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0 pagination_medicamentos" id="pagination_medicamentos">
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
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- card end -->

</div>
<!-- End Content -->


<!-- modal add or edit medicamento-->
<div class="modal fade" id="add_medicamento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Registro de Medicamento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loading_user_info" class="d-none">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary m-2" role="status"></div>
                    </div>
                </div>
                <div id="user_info_form">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de Medicamento</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre de Medicamento" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_generico" class="form-label">Nombre Genérico</label>
                        <input type="text" class="form-control" id="nombre_generico" placeholder="Nombre Genérico" id="nombre_generico">
                    </div>
                    <div class="mb-3">
                        <label for="presentacion" class="form-label">Presentación</label>
                        <input type="text" class="form-control" id="presentacion" placeholder="Presentación" id="presentacion">
                    </div>
                    <div class="mb-3">
                        <label for="via_administracion" class="form-label">Vía de Administración</label>
                        <input type="text" class="form-control" id="via_administracion" placeholder="Vía de Administración" id="via_administracion">
                    </div>
                    <div class="mb-3">
                        <label for="concentracion" class="form-label">Concentración</label>
                        <input type="text" class="form-control" id="concentracion" placeholder="Concentración" id="concentracion">
                    </div>
                    <div class="mb-3">
                        <label for="unidad" class="form-label">Unidad</label>
                        <input type="text" class="form-control" id="unidad" placeholder="Unidad" id="unidad">
                    </div>
                    <div class="mb-3">
                        <label for="controlado" class="form-label">Medicamento Controlado</label>
                        <select class="form-select" id="controlado">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripción" id="descripcion"></textarea>
                    </div>
                    <div class="text-center" id="add_user_button">
                        <input type="hidden" id="edit_medicamento_id" value="">
                        <button type="button" class="btn btn-primary btn-large bg-gradient" style="width: 70%; height: 45px;" onclick="InsertMedicamento()">Guardar</button>
                    </div>
                </div>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->
<!-- modal view medicamento-->
<div class="modal fade" id="view_medicamento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-dark modal-title fw-bold text-truncate">Detalle de Medicamento</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled"></i></button>
            </div>
            <div class="modal-body">
                <div>
                    <h6><span id="view_nombre"></span></h6>
                </div>
                <div class="">
                    Nombre Genérico: <span id="view_nombre_generico"></span>
                </div>
                <div class="">
                    Presentación: <span id="view_presentacion"></span>
                </div>
                <div class="">
                    Vía de Administración: <span id="view_via_administracion"></span>
                </div>
                <div class="">
                    Concentración: <span id="view_concentracion"></span>
                </div>
                <div class="">
                    Unidad: <span id="view_unidad"></span>
                </div>
                <div class="">
                    Medicamento Controlado: <span id="view_controlado"></span>
                </div>
                <div class="">
                    Descripción: <span id="view_descripcion"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        // Obtener parámetros del query string
        // Usar PHP para obtener los valores del query string
        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;

        // Puedes agregar más parámetros si lo necesitas

        renderMedicamentosTable(registros, pagina, busqueda);
    }
</script>
<?php require_once '../partials/footer.php'; ?>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>