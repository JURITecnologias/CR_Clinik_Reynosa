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
                    <h4 class="mb-1">Doctors</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Doctors</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="doctors.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Grid View"><i class="ti ti-layout-grid"></i></a>
                    <a href="all-doctors-list.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="List View"><i class="ti ti-layout-list"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="add-doctors.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>New Doctor</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row start -->
            <div class="row row-gap-4 justify-content-center">
                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0025</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-01.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Andrew Clark</a></h6>
                                <span class="fs-14">Anesthesiologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">4+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">200</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>andrew@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 75964 25493</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0024</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-03.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Katherine Brooks</a></h6>
                                <span class="fs-14">Periodontist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">3+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">350</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>katherine@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 75964 25493</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0023</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-04.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Benjamin Harris</a></h6>
                                <span class="fs-14">Dermatopathologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">6+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">400</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>benjamin@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 83217 65984</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0022</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-05.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Laura Mitchell</a></h6>
                                <span class="fs-14">ENT Surgeon</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">2+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">150</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>laura@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 91745 36289</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0021</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-06.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Christopher Lewis</a></h6>
                                <span class="fs-14">Medicine Physician</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">3+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">380</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>christopher@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 68429 15736</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0020</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-07.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Natalie Foster</a></h6>
                                <span class="fs-14">Ophthalmologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">2+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">450</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>natalie@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 52637 94820</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0019</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-10.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Jonathan Adams</a></h6>
                                <span class="fs-14">Orthopedic Surgeon</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">3+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">330</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>jonathan@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 39842 76521</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0018</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-08.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Rebecca Scott</a></h6>
                                <span class="fs-14">Pediatrics</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">2+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">270</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>rebecca@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 27590 31468</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0017</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-12.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Samuel Turner</a></h6>
                                <span class="fs-14">Radiologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">4+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">510</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>samuel@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 61957 84230</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0016</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-11.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Victoria Evans</a></h6>
                                <span class="fs-14">Cardiologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">3+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">480</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>victoria@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 84736 50912</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0015</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-12.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Daniel Foster</a></h6>
                                <span class="fs-14">Ophthalmologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">5+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">460</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>daniel@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 70325 67849</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xxl-3 col-xl-4 col-lg-6 d-flex">
                    <div class="card shadow flex-fill w-100 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge badge-soft-primary">#DR0014</span>
                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light border-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu p-2">
                                    <li>
                                        <a href="doctor-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>View Details</a>
                                    </li>
                                    <li>
                                        <a href="edit-doctors.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                    </li>                                        
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <span class="avatar avatar-xl online avatar-rounded">
                                    <a href="doctor-details.php"><img src="assets/img/doctors/doctor-03.jpg" alt="doctor"></a>
                                </span>
                                <h6 class="mt-2 mb-1"><a href="doctor-details.php">Dr. Amelia Scott</a></h6>
                                <span class="fs-14">Nephrologist</span>
                            </div>
                            <div class="border p-1 px-2 rounded mb-3">
                                    <div class="row">
                                    <div class="col-6 text-center py-2 border-end px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Experience</h6>
                                        <p class="fs-13 mb-0">3+ Years</p>
                                    </div>
                                    <div class="col-6 text-center py-2 px-1">
                                        <h6 class="fw-semibold fs-14 text-truncate">Appointments</h6>
                                        <p class="fs-13 mb-0">220</p>
                                    </div>
                                    </div>
                            </div>
                            <p class="mb-2 text-dark d-flex align-items-center"><i class="ti ti-mail me-1 text-body"></i>amelia@example.com</p>
                            <p class="mb-0 text-dark d-flex align-items-center"><i class="ti ti-phone me-1 text-body"></i>+1 56214 89375</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row start -->

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