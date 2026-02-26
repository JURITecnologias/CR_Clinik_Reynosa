<?php ob_start();?>
<div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div class="breadcrumb-arrow">
                    <h4 class="mb-1">Reporte de Servicios</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Reporte de Servicios</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    
                </div><!-- end card body -->
            </div><!-- end card -->

        </div>
        <!-- End Content -->      

        <?php require_once '../partials/footer.php'; ?>

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>