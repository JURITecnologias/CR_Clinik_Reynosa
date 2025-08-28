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
                    <h4 class="mb-1">Patients</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Patients</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="patients.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Grid View"><i class="ti ti-layout-grid"></i></a>
                    <a href="all-patients-list.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="List View"><i class="ti ti-layout-list"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="add-patient.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>Add New Patient</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row start -->
            <div class="row justify-content-center">

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-orange">Out Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-31.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT0025</a>
                                <h6 class="mb-0"><a href="patient-details.php">James Carter</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">17 Jun 2025</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">California</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-purple">In Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-54.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT0024</a>
                                <h6 class="mb-0"><a href="patient-details.php">Emily Davis</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">10 Jun 2025</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Female</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Texas</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-orange">Out Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-42.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT023</a>
                                <h6 class="mb-0"><a href="patient-details.php">Michael Johnson</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">22 May 2025</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Florida</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-purple">In Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-43.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT0022</a>
                                <h6 class="mb-0"><a href="patient-details.php">Olivia Miller</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">15 May 2025</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Female</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">New York</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-orange">Out Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-41.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT021</a>
                                <h6 class="mb-0"><a href="patient-details.php">David Smith</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">30 Apr 2025</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Illinois</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-purple">In Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-51.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT0020</a>
                                <h6 class="mb-0"><a href="patient-details.php">Sophia Wilson</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">25 Apr 2024</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Female</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Georgia</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-orange">Out Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-53.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT019</a>
                                <h6 class="mb-0"><a href="patient-details.php">Daniel Williams</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">13 Mar 2024</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Texas</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-purple">In Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-50.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT0018</a>
                                <h6 class="mb-0"><a href="patient-details.php">Isabella Anderson</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">16 Feb 2024</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Female</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Ohio</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-orange">Out Patient</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="patient-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-patient.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl avatar-rounded d-block mx-auto mb-2">
                                    <a href="patient-details.php" class="d-inline-block"><img src="assets/img/avatars/avatar-44.jpg" alt="patient"></a>
                                </span>
                                <a href="patient-details.php" class="d-inline-block mb-1">#PT017</a>
                                <h6 class="mb-0"><a href="patient-details.php">William Brown</a></h6>
                            </div>
                            <div class="border p-1 rounded mb-3">
                                <div class="row g-0">
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Last Visit</h6>
                                        <p class="fs-13 mb-0">20 Jan 2024</p>
                                    </div>
                                    <div class="col-4 text-center border-end p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-4 text-center p-1">
                                        <h6 class="fw-semibold fs-14 text-truncate mb-1">Location</h6>
                                        <p class="fs-13 mb-0">Michigan</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_modal">Add Appointment</a>
                        </div>
                    </div>
                </div>
                <!-- col end -->

            </div>
            <!-- row start -->

            <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center"><i class="ti ti-loader-2 me-1"></i>Load More</a>
            </div>

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