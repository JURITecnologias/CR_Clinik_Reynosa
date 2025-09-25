<?php ob_start();?>

    <!-- ========================
        Inicio del Contenido de la Página
    ========================= -->

    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100 z-1">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-6">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="error-images mb-4 w-75">
                            <img src="assets/img/error/maintenance.svg" alt="mantenimiento" class="img-fluid">
                        </div>
                        <div class="text-center">
                            <h4 class="mb-2">Este Sitio Está Actualmente en Mantenimiento</h4>
                            <p class="text-center">Pedimos disculpas por los inconvenientes causados, ya casi terminamos.</p>
                            <div class="d-flex justify-content-center">
                                <a href="index.php" class="btn btn-primary d-flex align-items-center">Volver al Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <!-- ========================
        Fin del Contenido de la Página
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>