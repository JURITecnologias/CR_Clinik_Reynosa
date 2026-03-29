<?php

ob_start(); ?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Detalle Movimiento Consumible</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="inventario-consumibles.php">Inventario consumibles</a></li>
                        <li class="breadcrumb-item active">Detalle Movimiento Consumible</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="inventario-consumibles.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Regresar a Inventario Consumibles</a>
            </div>
        </div>

        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Detalle del movimiento</div>
            </div>
            <div class="card-body">
                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                <div class="row g-3 d-none" id="detalle_movimiento_container">
                    <div class="col-md-4">
                        <label class="form-label">Código interno</label>
                        <input type="text" class="form-control" id="input_codigo_interno" value="CNS-001" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="input_nombre" value="Guantes quirúrgicos" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Unidad</label>
                        <input type="text" class="form-control" id="input_unidad" value="Caja" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipo movimiento</label>
                        <input type="text" class="form-control" id="input_tipo_movimiento" value="Entrada" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="input_cantidad" value="30" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cantidad Anterior</label>
                        <input type="text" class="form-control" id="input_cantidad_anterior" value="30" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Cantidad Nueva</label>
                        <input type="text" class="form-control" id="input_cantidad_nueva" value="30" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Stock Actual</label>
                        <input type="text" class="form-control" id="input_stock_actual" value="30" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="input_fecha" value="15/03/2026 10:30" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Motivo</label>
                        <input type="text" class="form-control" id="input_motivo" value="Registro manual" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Referencia</label>
                        <input type="text" class="form-control" id="input_referencia" value="Referencia" readonly>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php require_once '../partials/footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });


    function loadEvent() {
        const p = '<?php echo isset($_GET['p']) ? $_GET['p'] : 'null'; ?>';
        id = atob(deobfuscate(p));
        LoadDataDetalleContumoDetail(id);
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>