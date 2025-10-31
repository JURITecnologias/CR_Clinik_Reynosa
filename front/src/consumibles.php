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
                <h4 class="mb-1">Consumibles</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Consumibles</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a class="btn btn-primary" onclick="openNewConsumibleModal()"><i class="ti ti-square-rounded-plus me-1"></i>Registrar Consumible</a>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <div class="input-group mb-3 mt-2">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por consumible" aria-label="Buscar por consumible" aria-describedby="button-addon2"
                value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="LookForConsumibleByName()">Buscar</button>
        </div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="consumibles_container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Categorias de Consumibles</h5>
                </div>
                <div class="card-body">

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
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                    </div>

                    <table id="consumibles_table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Stock actual</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="consumibles_table_body">
                        </tbody>
                    </table>
                </div> <!-- end card-body -->
            </div>
        </div>

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<div id="form-modal-consumibles-add" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="form-modal-consumibles-addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form-modal-consumibles-addLabel">Formulario de Consumibles</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-consumible">
                    <div class="mb-3">
                        <label for="codigo_interno" class="form-label">Código Interno</label>
                        <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="" >
                    </div>
                    <div class="mb-3">
                        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                        <select class="form-select" id="unidad_medida" name="unidad_medida" required>
                            <option value="caja">Caja</option>
                            <option value="pieza" selected>Pieza</option>
                            <option value="paquete">Paquete</option>
                            <option value="litro">Litro</option>
                            <option value="mililitro">Mililitro</option>
                            <option value="centimetro">Centímetro</option>
                            <option value="kilogramo">Kilogramo</option>
                            <option value="metro">Metro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" value="1" required>
                        <div class="invalid-feedback">El stock mínimo debe ser un número positivo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="precio_unitario_promedio" class="form-label">Precio Unitario Promedio</label>
                        <input type="text" class="form-control" id="precio_unitario_promedio" name="precio_unitario_promedio" value="0.00">
                        <div class="invalid-feedback">El precio unitario promedio debe ser un número positivo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="costo_unitario_promedio" class="form-label">Costo Unitario Promedio</label>
                        <input type="text" class="form-control" id="costo_unitario_promedio" name="costo_unitario_promedio" value="0.00">
                        <div class="invalid-feedback">El costo unitario promedio debe ser un número positivo.</div>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_consumible" class="form-label">Categoría Consumible</label>
                        <select class="form-select" id="categoria_consumible" name="categoria_consumible">
                            <option value="">Seleccione una categoría</option>
                            <!-- Opciones dinámicas -->
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="es_activo" name="es_activo" value="1">
                        <label class="form-check-label" for="es_activo">Activo</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="agregar_btn" onclick="agregarConsumible()">Guardar</button>
                <input type="hidden" id="consumible_id">
                <button type="button" class="btn btn-primary d-none" id="actualizar_btn" onclick="actualizarConsumible()">Guardar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<div id="danger-modal-delete-consumible" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modal-delete-categoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-danger border-0">
                <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Consumible</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">¿Está seguro de que desea eliminar este consumible?</h5>
                <p>Esta acción no se puede deshacer. </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="consumible_id_eliminar" value="">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="EliminarConsumible()">Eliminar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<div id="view-modal-consumibles" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="view-modal-consumibles-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="view-modal-consumibles-Label">Detalles del Consumible</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-consumible">
                    <div class="mb-3">
                        <label for="codigo_interno" class="form-label">Código Interno</label>
                        <input type="text" class="form-control" id="view_codigo_interno" name="codigo_interno" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="view_nombre" name="nombre" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="view_descripcion" name="descripcion" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                        <select class="form-select" id="view_unidad_medida" name="unidad_medida" disabled>
                            <option value="caja">Caja</option>
                            <option value="pieza">Pieza</option>
                            <option value="paquete">Paquete</option>
                            <option value="litro">Litro</option>
                            <option value="mililitro">Mililitro</option>
                            <option value="centimetro">Centímetro</option>
                            <option value="kilogramo">Kilogramo</option>
                            <option value="metro">Metro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input type="number" class="form-control" id="view_stock_minimo" name="stock_minimo" value="1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="precio_unitario_promedio" class="form-label">Precio Unitario Promedio</label>
                        <input type="text" class="form-control" id="view_precio_unitario_promedio" name="precio_unitario_promedio" value="0.00" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="costo_unitario_promedio" class="form-label">Costo Unitario Promedio</label>
                        <input type="text" class="form-control" id="view_costo_unitario_promedio" name="costo_unitario_promedio" value="0.00" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_consumible" class="form-label">Categoría Consumible</label>
                        <input type="text" class="form-control" id="view_categoria_consumible" name="categoria_consumible" value="" readonly>
                    </div>
                    <div class="form-check mb-3">
                        <input type="hidden" id="view_consumible_id">
                        <input class="form-check-input" type="checkbox" id="view_es_activo" name="es_activo" value="1" disabled>
                        <label class="form-check-label" for="view_es_activo">Activo</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<!-- ========================
        End Page Content
    ========================= -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
         loadSelectCategoriasConsumibles();
        loadEvent();
    });

    function loadEvent() {
        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;
        const ordenby = "<?php echo isset($_GET['direccion']) ? addslashes($_GET['direccion']) : 'desc'; ?>";

        loadDataTableConsumibles( registros,pagina, busqueda, ordenby);
    }
</script>

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>