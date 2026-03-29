<?php
ob_start();
$user = include(__DIR__ . '/../src/user_session.php');
?>
<div class="page-wrapper">
    <div class="content">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Inventario consumibles</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Inventario consumibles</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a class="btn btn-danger"  href="registrar-movimiento-consumo.php"><i class="ti ti-square-rounded-plus me-1"></i>Registrar Movimiento</a>
            </div>
        </div>
        <div id="alert_placeholder" class="mb-3"></div>

        <!-- Filtros y búsqueda -->
        <div class="card mb-4">
            <div class="card-body">
                <form id="searchForm" class="row g-2 align-items-end">
                    <div class="col-md-3">
                        <label for="searchInput" class="form-label">Buscar consumible</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Nombre, código interno..." value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechaInicio" class="form-label">Fecha inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" value="<?php echo isset($_GET['fecha_inicio']) ? htmlspecialchars($_GET['fecha_inicio']) : ''; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaFin" class="form-label">Fecha fin</label>
                        <input type="date" class="form-control" id="fechaFin" value="<?php echo isset($_GET['fecha_fin']) ? htmlspecialchars($_GET['fecha_fin']) : ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary w-100" onclick="searchConsumables()"><i class="ti ti-search me-1"></i>Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de movimientos -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Movimientos de consumibles</h5>
                <div class="input-group w-auto align-items-center">
                    <span class="input-group-text" id="basic-addon1">Total: <span id="totalRegistros">0</span></span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row m-3">
                    <div class="col-lg-4">
                        <?php
                        // Obtener el parámetro 'registros' del querystring, valor por defecto 10
                        $registros = isset($_GET['registros']) ? intval($_GET['registros']) : 50;
                        ?>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" id="basic-addon1">Registros</span>
                            <select class="form-select form-select-sm" id="record-selector" name="registros" onchange="ChangeRecords()">
                                <option value="50" <?php echo $registros == 50 ? 'selected' : ''; ?>>50</option>
                                <option value="100" <?php echo $registros == 100 ? 'selected' : ''; ?>>100</option>
                                <option value="300" <?php echo $registros == 300 ? 'selected' : ''; ?>>300</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0 pagination_control d-none" id="pagination_control">
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
                    <div class="col-4"></div>
                </div>
                <?php include __DIR__ . '/../partials/loading-section.php'; ?>

                <div class="table-responsive d-none" id="tablaMovimientosContainer">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Código interno</th>
                                <th>Nombre</th>
                                <th>Unidad de medida</th>
                                <th>Tipo movimiento</th>
                                <th>Cantidad anterior</th>
                                <th>Cantidad nueva</th>
                                <th>Stock actual</th>
                                <th>Fecha de movimiento</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tablaMovimientos">
                            <!-- Aquí se insertarán los movimientos por JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <nav id="pagination_control">
                    <!-- Paginación dinámica -->
                </nav>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Aquí irá la lógica para cargar movimientos y manejar filtros
                document.getElementById('record-selector').addEventListener('change', function(e) {
                    e.preventDefault();
                    window.location.search = `?registros=${this.value}`;
                });
            });
        </script>
    </div>
</div>


<?php
$content = ob_get_clean();
require_once '../partials/main.php';
