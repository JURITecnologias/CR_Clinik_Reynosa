<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div class="breadcrumb-arrow">
                    <h4 class="mb-1">Video Call</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>    
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Applications</a></li>                        
                            <li class="breadcrumb-item active">Video Call</li>
                        </ol>
                    </div>
                </div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_participent"><i class="ti ti-square-rounded-plus me-1"></i>Add Participant</a>
            </div>
            <!-- End Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="d-xl-flex w-100">
                        <div class="video-chat">
                            <div class="position-relative">
                                <div class="mb-4 call-user-img"><img src="assets/img/avatars/video-call.jpg" class="img-fluid rounded" alt="user"></div>
                                <div class="d-flex align-items-center justify-content-between position-absolute top-0 start-0 w-100 p-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-white text-dark">Rachael Thomas</span>
                                        <span class="badge bg-white text-dark">01:45</span>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-white btnFullscreen"><i class="ti ti-minimize"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper call-users">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-66.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">Rosa Shelby</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-67.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">Allen Snyder</span>
                                        </div>
                                        <span class="position-absolute top-0 start-0 p-2"><img src="assets/img/icons/audio-wave.svg" alt="audio wave"></span>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-59.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">Charlotte Ayala</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-68.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">Andrew Foster</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-60.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">userRobert Fassett</span>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/img/avatars/avatar-61.jpg" class="img-fluid rounded" alt="user">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2">
                                            <span class="badge bg-white text-dark w-100">Andrew Fletcher</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="call-footer border rounded p-2 mt-3">
                                <div class="d-flex align-items-center justify-content-center flex-wrap row-gap-2">
                                    <a href="#" class="btn btn-light btn-icon me-2"><i class="ti ti-microphone fs-16"></i></a>
                                    <a href="#" class="btn btn-light btn-icon me-2"><i class="ti ti-video fs-16"></i></a>
                                    <a href="#" class="btn btn-light btn-icon me-2"><i class="ti ti-messages fs-16"></i></a>
                                    <a href="#" class="btn btn-icon p-4 btn-danger text-white me-2"><i class="ti ti-phone fs-16"></i></a>
                                    <a href="#" class="btn btn-light btn-icon me-2"><i class="ti ti-volume fs-16"></i></a>
                                    <a href="#" class="btn btn-light btn-icon me-2"><i class="ti ti-mood-smile fs-16"></i></a>
                                    <a href="#" class="btn btn-light btn-icon"><i class="ti ti-screen-share fs-16"></i></a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
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