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
                    <h4 class="mb-1">Medical Results</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Medical Results</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="d-inline-flex align-items-center mb-0">Total Medical Results<span class="badge bg-danger ms-2">658</span></h6>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-md btn-outline-light d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-sort-descending-2 me-1"></i><span class="me-1">Sort By : </span> Newest
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-2">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Newest</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Oldest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- table start -->
                    <div class="table-responsive table-nowrap">
                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Patient Name</th>
                                    <th class="no-sort">Gender</th>
                                    <th>Record</th>
                                    <th class="no-sort">Appointment Date</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0025</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-31.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">James Carter</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Male</td>
                                    <td>Blood Report</td>
                                    <td>17 Jun 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0024</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-54.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Emily Davis</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Female</td>
                                    <td>X-ray</td>
                                    <td>10 Jun 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0023</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-45.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Michael Johnson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Male</td>
                                    <td>Glucose Report</td>
                                    <td>22 May 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0022</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-51.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Olivia Miller</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Female</td>
                                    <td>CT Scan</td>
                                    <td>15 May 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0021</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-41.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">David Smith</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Male</td>
                                    <td>Angiogram Record</td>
                                    <td>30 Apr 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0020</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-48.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Sophia Wilson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Female</td>
                                    <td>MRI Scan</td>
                                    <td>25 Apr 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0019</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-53.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Daniel Williams</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Male</td>
                                    <td>PET Scan</td>
                                    <td>13 Mar 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0018</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-50.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Isabella Anderson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Female</td>
                                    <td>Doppler Report</td>
                                    <td>16 Feb 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0017</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-42.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">William Brown</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Male</td>
                                    <td>MRA Scan</td>
                                    <td>20 Jan 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_modal">#MR0016</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-56.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Charlotte Taylor</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Female</td>
                                    <td>Echocardiogram Report</td>
                                    <td>15 Jan 2025</td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>

            </div>
            <!-- card start -->

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