<?php ob_start(); ?>
<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Reporte de Mensual</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Reporte Mensual</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder"></div>
        <div class="row">
            <div class="col-xl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="mesSelect" class="form-label rounded-pill">Mes:</label>
                                <select class="form-select" id="mesSelect">
                                    <option value="">Seleccionar mes</option>
                                    <option value="1" <?php echo date('m') == '01' ? 'selected' : ''; ?>>Enero</option>
                                    <option value="2" <?php echo date('m') == '02' ? 'selected' : ''; ?>>Febrero</option>
                                    <option value="3" <?php echo date('m') == '03' ? 'selected' : ''; ?>>Marzo</option>
                                    <option value="4" <?php echo date('m') == '04' ? 'selected' : ''; ?>>Abril</option>
                                    <option value="5" <?php echo date('m') == '05' ? 'selected' : ''; ?>>Mayo</option>
                                    <option value="6" <?php echo date('m') == '06' ? 'selected' : ''; ?>>Junio</option>
                                    <option value="7" <?php echo date('m') == '07' ? 'selected' : ''; ?>>Julio</option>
                                    <option value="8" <?php echo date('m') == '08' ? 'selected' : ''; ?>>Agosto</option>
                                    <option value="9" <?php echo date('m') == '09' ? 'selected' : ''; ?>>Septiembre</option>
                                    <option value="10" <?php echo date('m') == '10' ? 'selected' : ''; ?>>Octubre</option>
                                    <option value="11" <?php echo date('m') == '11' ? 'selected' : ''; ?>>Noviembre</option>
                                    <option value="12" <?php echo date('m') == '12' ? 'selected' : ''; ?>>Diciembre</option>
                                </select>
                            </div>
                            <div class="col-xl-12">
                                <label for="anioSelect" class="form-label">Año:</label>
                                <input type="number" class="form-control rounded-pill" style="padding-left: 35px; text-align: center;" id="anioSelect" placeholder="Default Radius" value="<?php echo date('Y'); ?>">
                            </div>
                            <div class="col-xl-12 mt-4">
                                <button id="btn-generar-reporte" class="btn btn-primary w-100 rounded-pill" onclick="solicitarReporte()">Generar Reporte</button>
                            </div>
                             <div class="col-xl-12 mt-4">
                                <button id="btn-ver-reportes" class="btn btn-secondary w-100 rounded-pill" onclick="VerReportes()">Ver Reportes</button>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            <div class="col-xl-9">
                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                <div class="card mb-0" id="reporte-section" style="display: none;">
                    <div class="card-header">
                        <h4 class="card-title">
                            Reportes Generados
                        </h4>
                    </div>
                    <div class="card-body">
                        <div id="reporte-resultados" class="table-responsive">
                            <div class="table-responsive table-nowrap">
                                <table class="table mb-0 border" id="reportes_table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Reporte </th>
                                            <th>Estatus</th>
                                            <th>Fecha solicitud</th>
                                            <th class="no-sort">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
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
    function loadEvent(){
        const mes = new Date().getMonth() + 1;
        const anio = new Date().getFullYear();
        LoadDataForReportesGenerados(mes, anio);
    }
</script>
<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>