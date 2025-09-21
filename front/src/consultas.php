<?php ob_start(); ?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Consultas</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Consultas</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="javascript:void(0);" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ti ti-square-rounded-plus me-1"></i>Nueva Consulta</a>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="input-group mb-3">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por nombre de paciente" aria-label="Buscar por nombre de paciente" aria-describedby="button-addon2"
                value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="BuscarConsulta()">Buscar</button>
        </div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>

        <div id="consultas_container" class="d-none">
            <div class="card" id="controls_row">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php
                            // Obtener el parámetro 'registros' del querystring, valor por defecto 10
                            $registros = isset($_GET['registros']) ? intval($_GET['registros']) : 50;
                            ?>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1">Registros</span>
                                <select class="form-select form-select-sm" id="example-select-1" name="registros" onchange="ChangeRecords()">
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
                </div>

                <div class="card mb-0">
                    <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <h6 class="d-inline-flex align-items-center mb-0">Total de Consultas <span class="badge bg-danger ms-2" id="total-consultas">0</span></h6>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-md btn-outline-light d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-sort-descending-2 me-1"></i><span class="me-1">Ordenar por: </span> Más reciente
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-2">
                                <li>
                                    <a href="javascript:OrdenarPorReciente(0);" class="dropdown-item rounded-1">Más reciente</a>
                                </li>
                                <li>
                                    <a href="javascript:OrdenarPorAntiguo(0);" class="dropdown-item rounded-1">Más antiguo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="card-body" id="patients_list">
                        <!-- table start -->
                        <div class="table-responsive table-nowrap">
                            <table class="table mb-0 border" id="table_consultas">
                                <thead class="table-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Paciente</th>
                                        <th class="no-sort">Doctor</th>
                                        <th class="no-sort">Fecha Consulta</th>
                                        <th class="no-sort">Estatus</th>
                                        <th class="no-sort">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <!-- table end -->
                    </div>

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

        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;
        const orden = "<?php echo isset($_GET['orden']) ? addslashes($_GET['orden']) : 'fecha_consulta'; ?>";
        const ordenby = "<?php echo isset($_GET['direccion']) ? addslashes($_GET['direccion']) : 'desc'; ?>";

        LoadConsultasTable(registros, pagina, busqueda, orden, ordenby);
    }
</script>

<?php require_once '../partials/footer.php'; ?>

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>