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
                    <h4 class="mb-1">Patient Details</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Patient Details</li>
                        </ol>
                    </div>
                </div>
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Patients</a>
            </div>
            <!-- End Page Header -->

            <!-- tabs start -->
            <ul class="nav nav-tabs nav-item-primary border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="patient-details.php" class="nav-link border rounded fw-semibold">
                        Patient Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-appointments.php" class="nav-link border rounded fw-semibold">
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-vital-signs.php" class="nav-link border rounded fw-semibold">
                        Vital Signs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-visit-history.php" class="nav-link border rounded fw-semibold">
                        Visit History
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-lab-results.php" class="nav-link border rounded fw-semibold">
                        Lab Results
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-prescription.php" class="nav-link border rounded fw-semibold active">
                        Prescription
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-medical-history.php" class="nav-link border rounded fw-semibold">
                        Medical History
                    </a>
                </li>
                <li class="nav-item">
                    <a href="patient-details-documents.php" class="nav-link border rounded fw-semibold">
                        Documents
                    </a>
                </li>
            </ul>
            <!-- tabs end -->

            <!-- card start -->
            <div class="card mb-0">

                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Prescriptions<span class="badge bg-danger ms-2">658</span></h5>
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
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Prescribed By</th>
                                    <th class="no-sort">Amount</th>
                                    <th class="no-sort">Payment Method</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00457</a></td>
                                    <td>10</td>
                                    <td>17 Jun 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-01.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Andrew Clark</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$500</td> 
                                    <td>Cash</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>   
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00456</a></td>
                                    <td>15</td>
                                    <td>10 Jun 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-03.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Katherine Brooks</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$500</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-warning">Pending</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>     
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00455</a></td>
                                    <td>20</td>
                                    <td>22 May 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-04.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Benjamin Harris</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$300</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>   
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00454</a></td>
                                    <td>12</td>
                                    <td>15 May 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-05.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Laura Mitchell</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$200</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>  
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00453</a></td>
                                    <td>18</td>
                                    <td>30 Apr 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-06.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Christopher Lewis</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$100</td> 
                                    <td>Cash</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>    
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00452</a></td>
                                    <td>25</td>
                                    <td>25 Apr 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-07.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Natalie Foster</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$600</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>   
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00451</a></td>
                                    <td>40</td>
                                    <td>13 Mar 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-10.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Jonathan Adams</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$700</td> 
                                    <td>Cash</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>   
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00450</a></td>
                                    <td>35</td>
                                    <td>16 Feb 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-08.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Rebecca Scott</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$800</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>  
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00449</a></td>
                                    <td>42</td>
                                    <td>20 Jan 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-12.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Samuel Turner</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$900</td> 
                                    <td>Cash</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                            </li>                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>  
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal">#PE00448</a></td>
                                    <td>17</td>
                                    <td>15 Jan 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-11.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Victoria Evans</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$500</td> 
                                    <td>Paytm</td>                                      
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
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