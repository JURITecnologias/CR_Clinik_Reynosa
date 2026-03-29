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
                <h4 class="mb-1">Consulta</h4>
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
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>