<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">Lightbox</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Advanced UI</a></li>                            
                        <li class="breadcrumb-item active">Lightbox</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header --> 
                
            <!-- start row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Single Image Lightbox</h5>
                        </div>
                        <div class="card-body pb-1">

                            <!-- start row -->
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <a href="assets/img/media/img-01.jpg" class="image-popup">
                                        <img src="assets/img/media/img-01.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div> <!-- end col -->

                                <div class="col-md-4 mb-3">
                                    <a href="assets/img/media/img-02.jpg" class="image-popup">
                                        <img src="assets/img/media/img-02.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row -->

                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image with Description</h5>
                        </div>
                        <div class="card-body pb-1">

                            <!-- start row -->
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <a href="assets/img/media/img-03.jpg" class="image-popup-desc" data-title="Title 01" data-description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit">
                                        <img src="assets/img/media/img-03.jpg" class="img-fluid" alt="work-thumbnail">
                                    </a>
                                </div> <!-- end col -->

                                <div class="col-md-4 mb-3">
                                    <a href="assets/img/media/img-04.jpg" class="image-popup-desc" data-title="Title 02" data-description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit">
                                        <img src="assets/img/media/img-04.jpg" class="img-fluid" alt="work-thumbnail">
                                    </a>
                                </div> <!-- end col -->

                                <div class="col-md-4 mb-3">
                                    <a href="assets/img/media/img-05.jpg" class="image-popup-desc" data-title="Title 03" data-description="Lorem ipsum dolor sit amet, consectetuer adipiscing elit">
                                        <img src="assets/img/media/img-05.jpg" class="img-fluid" alt="work-thumbnail">
                                    </a>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row -->

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