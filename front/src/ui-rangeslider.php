<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">Rangeslider</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Advanced UI</a></li>                            
                        <li class="breadcrumb-item active">Rangeslider</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header --> 
                
            <!-- start row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Basic Range Slider</h5>
                        </div>
                        <div class="card-body">
                            <div id="rangeslider_basic"></div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Multi Elements Range</h5>
                        </div>
                        <div class="card-body">
                            <div id="rangeslider_multielement"></div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Value Range Slider</h5>
                        </div>
                        <div class="card-body pb-2">
                            <div>
                                <div id="nonlinear"></div>
                                <div class="d-flex justify-content-between">
                                    <div class="example-val" id="lower-value"></div>
                                    <div class="example-val" id="upper-value"></div>
                                </div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Color Scheme</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                <h5 class="fs-14">Primary</h5>
                                <div id="slider-primary" data-slider-color="primary"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fs-14">Secondary</h5>
                                <div id="slider-secondary" data-slider-color="secondary"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fs-14">Success</h5>
                                <div id="slider-success" data-slider-color="success"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fs-14">Info</h5>
                                <div id="slider-info" data-slider-color="info"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fs-14">Warning</h5>
                                <div id="slider-warning" data-slider-color="warning"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fs-14">Danger</h5>
                                <div id="slider-danger" data-slider-color="danger"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Locking Sliders Together</h5>
                        </div>
                        <div class="card-body">
                            <div class="slider" id="slider1"></div>
                            <span class="example-val mt-2" id="slider1-span"></span>

                            <div class="slider" id="slider2"></div>
                            <span class="example-val mt-2" id="slider2-span"></span>

                            <button id="lockbutton" class="btn btn-primary">Lock</button>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Tooltip</h5>
                        </div>
                        <div class="card-body">
                            <div class="slider" id="slider-merging-tooltips"></div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Soft Limits</h5>
                        </div>
                        <div class="card-body">
                            <div class="pb-4">
                                <div class="slider mb-2" id="soft"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Color Picker</h5>
                        </div>
                        <div class="card-body pb-2">
                            <div>
                                <div class="sliders" id="red"></div>
                                <div class="sliders" id="green"></div>
                                <div class="sliders" id="blue"></div>

                                <div id="result"></div>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Vertical Range Slider</h5>
                        </div>
                        <div class="card-body">
                            <div id="slider-vertical" class="mx-auto"></div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Vertical Range Slider</h5>
                        </div>
                        <div class="card-body">
                            <div id="slider-connect-upper" class="mx-auto"></div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Vertical Range Slider</h5>
                        </div>
                        <div class="card-body">
                            <div id="slider-vertical-tooltip" class="mx-auto"></div>
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