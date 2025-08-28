<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">Rating</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Advanced UI</a></li>                            
                        <li class="breadcrumb-item active">Rating</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header --> 
                
            <!-- start row -->
            <div class="row">

                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Basic Rater
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Show Some <span class="text-danger">&#10084;</span> with rating :</p>
                                <div id="rater-basic"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                5 star rater with steps
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Dont forget to rate the product :</p>
                                <div id="rater-steps"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-4 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Custom messages
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Your rating is much appreciated&#128079; :</p>
                                <div id="custom-messages"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-6 col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-title">
                                Unlimited number of stars readOnly
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Thanks for rating :</p>
                                <div id="stars-unlimited"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-6 col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-title">
                                5 Star rater with custom isBusyText and simulated backend
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Thanks for rating :</p>
                                <div id="stars-busytext"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                On hover event
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Please give your valuable rating :</p>
                                <div class="d-flex flex-wrap align-items-center">
                                    <div id="stars-hover"></div>
                                    <span class="live-rating badge bg-success ms-3">
                                        1
                                    </span>
                                </div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Clear/reset rater
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <p class="fs-14 mb-0 fw-semibold">Thank You so much for your support :</p>
                                <div class="d-flex flex-wrap align-items-center">
                                    <div id="rater-reset"></div>
                                    <button class="btn btn-icon btn-sm btn-soft-danger ms-3" id="rater-reset-button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reset">
                                        <i class="ti ti-rotate"></i>
                                    </button>
                                </div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

            </div>
            <!-- end row -->
                            
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