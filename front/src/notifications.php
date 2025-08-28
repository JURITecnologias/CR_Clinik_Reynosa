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
                    <h4 class="mb-1">Notifications</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Notifications</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Notifications<span class="badge bg-danger ms-2">04</span></h5>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <a href="javascript:void(0);" class="btn btn-outline-light"><i class="ti ti-checks me-1"></i>Mark all as read</a>
                        <a href="javascript:void(0);" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete All</a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Item - 1 -->
                    <div class="card notication-card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center">
                                    <a href="patient-details.php" class="avatar flex-shrink-0">
                                        <img src="./assets/img/avatars/avatar-28.jpg" alt="patient" class="rounded-circle">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <p class="mb-1"><a href="patient-details.php" class="fw-medium">John Doe</a> added new  patient <a href="appointments.php" class="fw-medium">appointment booking</a></p>
                                            <p class="fs-12 mb-0 d-inline-flex align-items-center"><i class="ti ti-clock me-1"></i> 4 min ago<span class="ms-2"><i class="ti ti-point-filled text-danger fs-16 lh-sm"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-btn">
                                    <a href="javascript:void(0);" class="btn btn-danger d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item - 2 -->
                    <div class="card notication-card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center">
                                    <a href="patient-details.php" class="avatar flex-shrink-0">
                                        <img src="./assets/img/avatars/avatar-30.jpg" alt="patient" class="rounded-circle">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <p class="mb-1"><a href="patient-details.php" class="fw-medium">Thomas William</a> booked a new appointment.</p>
                                            <p class="fs-12 mb-0 d-inline-flex align-items-center"><i class="ti ti-clock me-1"></i> 15 min ago<span class="ms-2"><i class="ti ti-point-filled text-danger fs-16 lh-sm"></i></span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-btn">
                                    <a href="javascript:void(0);" class="btn btn-danger d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item - 3 -->
                    <div class="card notication-card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center">
                                    <a href="patient-details.php" class="avatar flex-shrink-0">
                                        <img src="./assets/img/avatars/avatar-29.jpg" alt="patient" class="rounded-circle">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <p class="mb-1"><a href="patient-details.php" class="fw-medium">Sarah Anderson</a> has been successfully booked for <span class="text-dark fw-medium">April 5 at 10:00 AM.</span></p>
                                            <p class="fs-12 mb-0 d-inline-flex align-items-center"><i class="ti ti-clock me-1"></i> 45 Min Ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-btn">
                                    <a href="javascript:void(0);" class="btn btn-danger d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item - 4 -->
                    <div class="card notication-card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center">
                                    <a href="patient-details.php" class="avatar flex-shrink-0">
                                        <img src="./assets/img/avatars/avatar-31.jpg" alt="patient" class="rounded-circle">
                                    </a>
                                    <div class="ms-2">
                                        <div>
                                            <p class="mb-1"><a href="patient-details.php" class="fw-medium">Ann McClure</a> cancelled her appointment scheduled for <span class="text-dark fw-medium">February 5, 2024</span></p>
                                            <p class="fs-12 mb-0 d-inline-flex align-items-center"><i class="ti ti-clock me-1"></i> 58 Min Ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti-btn">
                                    <a href="javascript:void(0);" class="btn btn-danger d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- card end -->


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