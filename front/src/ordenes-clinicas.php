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
                <h4 class="mb-1">Órdenes Clínicas</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Órdenes Clínicas</li>
                    </ol>
                </div>
            </div>
            <!-- <div class="gap-2 d-flex align-items-center flex-wrap">
                <a class="btn btn-primary" onclick="openNuevaOrdenModal()"><i class="ti ti-square-rounded-plus me-1"></i>Nueva Orden</a>
            </div> -->
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <div class="input-group mb-3 mt-2">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por paciente, folio o doctor" aria-label="Buscar por paciente, folio o doctor" aria-describedby="button-addon2"
                value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="buscarOrdenesClinicas()">Buscar</button>
        </div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="ordenes-clinicas-container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Órdenes Clínicas</h5>
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
                    <div class="table-responsive table-nowrap">
                        <table class="table table-striped" id="ordenes_clinicas_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Servicios Solicitados</th>
                                    <th>Fecha de Orden</th>
                                    <th>Doctor Solicitante</th>
                                    <th>Paciente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="ordenes_clinicas_table_body">
                                <!-- JS render rows here -->
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body -->
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php require_once '../partials/footer.php'; ?>
</div>

<!-- modal cancelar orden clinica -->
<div id="cancel-ordenclinica-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-danger border-0">
                <h4 class="modal-title" id="danger-header-modalLabel">Cancelacion de Orden Clínica</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">Cancelacion de Orden Clinica</h5>
                <p>¿Estás seguro de que deseas cancelar esta orden clínica?</p>
                <p class="mb-0">Esta accion no se puede revertir .</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="orden_clinica_id_cancelar" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="CancelarOrden()">Cancelar Orden Clinica</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<script>
    // Render servicios_solicitados as a list in the table
    // function renderServiciosSolicitados(servicios) {
    //     if (!servicios || !Array.isArray(servicios)) return '';
    //     let html = '<ul class="mb-0">';
    //     servicios.forEach(function(grupo) {
    //         if (Array.isArray(grupo)) {
    //             grupo.forEach(function(servicio) {
    //                 html += `<li><strong>${servicio.nombre}</strong> <span class='text-muted'>(${servicio.categoria})</span></li>`;
    //             });
    //         }
    //     });
    //     html += '</ul>';
    //     return html;
    // }
    // Example: fill table with JS (replace with AJAX in real use)
    // function loadOrdenesClinicas() {
    //     // Fetch data and render rows
    // }

    document.addEventListener('DOMContentLoaded', function() {

        // document.getElementById('searchPaciente').addEventListener('keypress', function(event) {
        //     if (event.key === 'Enter') {
        //         BuscarPacienteParaConsulta();
        //     }
        // });

        loadEvent();
    });

    function loadEvent() {

        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;
        const orden = "<?php echo isset($_GET['orden']) ? addslashes($_GET['orden']) : 'created_at'; ?>";
        const ordenby = "<?php echo isset($_GET['direccion']) ? addslashes($_GET['direccion']) : 'desc'; ?>";

        LoadDataTableOrdenesClinicas(registros, pagina, busqueda, orden, ordenby);
    }
</script>

<?php
$content = ob_get_clean();
require_once '../partials/main.php';
