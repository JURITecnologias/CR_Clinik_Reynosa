<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">C3 Charts</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>                            
                        <li class="breadcrumb-item active">C3 Charts</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar-stacked"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Multiple Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Horizontal Bar Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-bar-rotated"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-sracked"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-spline-rotated"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Line Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-area-spline-sracked"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Pie Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-pie"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="card card-h-100">
                        <div class="card-header">
                            <div class="card-title">Donut Chart</div>
                        </div>
                        <div class="card-body">
                            <div id="chart-donut"></div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
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