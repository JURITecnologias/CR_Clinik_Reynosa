<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <!-- Start Content -->
    <div class="container-fuild position-relative z-1">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100 lock-screen-cover">

            <!-- start row -->
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap coming-soon-item">
                <div class="col-lg-6 mx-auto">
                    <form action="index.php" class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class="card border-1 p-lg-3 rounded-3 mb-0  bg-transparent border-0">
                                <div class="card-body">
                                    <div class="mx-auto mb-4 text-center">
                                        <a href="index.php">
                                            <img src="assets/img/logo-dark.svg" class="img-fluid logo m-atuo" alt="Logo">
                                        </a>
                                    </div>
                                    <div class="text-center mb-2">
                                        <h2 class="mb-1 fw-bold display-2">Coming Soon</h2>
                                    </div>
                                    <div class="mb-4">
                                        <p class="d-flex text-center justify-content-center">Please check back later, We are working hard to get  everything  just right.</p>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="">
                                            <ul class="d-flex list-unstyled align-items-center justify-content-center mb-3">
                                                <li class="me-sm-4 me-2">
                                                    <div class="timer-cover border">
                                                        <h4 class="days fs-28 mb-0">54</h4>
                                                    </div>
                                                    <p class="text-center text-dark mb-0">Days</p>
                                                </li>
                                                <li class="me-sm-4 me-2">
                                                    <div class="timer-cover border">
                                                        <h4 class="hours fs-28 mb-0">02</h4>
                                                    </div>
                                                    <p class="text-center text-dark mb-0">Hours</p>
                                                </li>
                                                <li class="me-sm-4 me-2">
                                                    <div class="timer-cover border">
                                                        <h4 class="minutes fs-28 mb-0">54</h4>
                                                    </div>
                                                    <p class="text-center text-dark mb-0">Minutes</p>
                                                </li>
                                                <li>
                                                    <div class="timer-cover border">
                                                        <h4 class="seconds fs-28 mb-0">10</h4>
                                                    </div>
                                                    <p class="text-center text-dark mb-0">Seconds</p>
                                                </li>
                                            </ul>
                                            <div class="mb-4 text-center px-md-5">
                                                <label class="form-label fw-semibold text-center">Get notify when we launch</label>
                                                <div class="d-flex align-items-center justify-content-between gap-2">
                                                    <input type="email" class="form-control" placeholder="Enter  Your Email">
                                                    <a href="javascript:void(0);" class="btn btn-dark py-2">Subscribe</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-dark rounded-circle"><i class="ti ti-brand-facebook"></i> </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-dark rounded-circle"><i class="ti ti-brand-instagram"></i> </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-dark rounded-circle"><i class="ti ti-brand-linkedin"></i> </a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-dark rounded-circle"><i class="ti ti-brand-twitter"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                    </form>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
    </div>
    <!-- End Content -->
    
    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>