<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start Content -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100 z-1">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-6">
                    <div class="d-flex flex-column align-items-center justify-content-center p-3">
                        <div class="error-images mb-4">
                            <img src="assets/img/error/error-404.svg" alt="error" class="img-fluid">
                        </div>
                        <div class="text-center">
                            <h4 class="mb-2">Oops, Something Went Wrong</h4>
                            <p class="text-center">Error 404 Page not found. Sorry the page you looking for <br> doesn’t exist or has been moved</p>
                            <div class="d-flex justify-content-center">
                                <a href="index.php" class="btn btn-primary d-flex align-items-center">Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    
    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>