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
                <h4 class="mb-1">Categorias de Consumibles</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Categorias de Consumibles</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a class="btn btn-primary" onclick="openNewCategoriaConsumibleModal()"><i class="ti ti-square-rounded-plus me-1"></i>Registrar Categoria</a>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="table_categorias_consumibles_container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Categorias de Consumibles</h5>
                </div>
                <div class="card-body">
                    <table id="categorias_consumibles_table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="categorias-consumibles-table-body">
                        </tbody>
                    </table>
                </div> <!-- end card-body -->
            </div>
        </div>

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<div id="form-modal-categorias-consumibles" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form-modal-categorias-consumiblesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form-modal-categorias-consumiblesLabel">Formulario de Categoria de Consumibles</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-categorias-consumibles">
                    <div class="mb-3">
                        <label for="categoria_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="categoria_nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="categoria_descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_estado" class="form-label">Estado</label>
                        <select class="form-select" id="categoria_estado" name="es_activo" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregar_btn" onclick="agregarCategoriaConsumible()">Guardar</button>
                <input type="hidden" id="categoria_id">
                <button type="button" class="btn btn-primary d-none" id="actualizar_btn" onclick="actualizarCategoriaConsumible()">Guardar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<div id="danger-header-modal-delete-categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modal-delete-categoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-danger border-0">
                <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Categoria</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">¿Está seguro de que desea eliminar esta categoria?</h5>
                <p>Esta acción no se puede deshacer. </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="categoria_id_eliminar" value="">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="EliminarCategoria()">Eliminar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->


<!-- ========================
        End Page Content
    ========================= -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        loadCategoriasConsumiblesTable();
    }
</script>

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>