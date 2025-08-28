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
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Patient</a>
            </div>
            <!-- End Page Header -->

            <!-- tabs start -->
                <ul class="nav nav-tabs nav-item-primary mb-3 border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="patient-details.php" class="nav-link border rounded fw-semibold active">
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
                    <a href="patient-details-prescription.php" class="nav-link border rounded fw-semibold">
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

            <!-- row start -->
            <div class="row">
                
                <!-- col start -->
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                                <div class="avatar avatar-xxl me-3">
                                    <img src="assets/img/avatars/avatar-03.jpg" alt="patient" class="rounded">
                                </div>
                                <div>
                                    <span class="badge badge-soft-primary">#PT001</span>
                                    <h5 class="mb-1 mt-2">Reyan Verol</h5>
                                    <p class="fs-13 mb-0">Last Visited : 24 Jan 2025</p>
                                </div>
                            </div>
                            <h6 class="mb-2">Basic Information</h6>
                            <p class="mb-3">Added On <span class="float-end text-dark">24 May 2024</span></p>
                            <p class="mb-3">DOB <span class="float-end text-dark">10 Jan 1991</span></p>
                            <p class="mb-3">Gender <span class="float-end text-dark">Male</span></p>
                            <p class="mb-3">Martial Status <span class="float-end text-dark">Married</span></p>
                            <p class="mb-3">Blood Group <span class="float-end text-dark">O+ve</span></p>
                            <p class="mb-3">Phone Number <span class="float-end text-dark">+1 75964 25493</span></p>
                            <p class="mb-3">Email <span class="float-end text-dark">cynthiya@example.com</span></p>
                            <p class="mb-3">Referred By <a href="doctor-details.php" class="float-end text-decoration-underline link-primary">Dr Antonio</a></p>
                            <p class="mb-3">Total No of Bookings <span class="float-end text-dark">+12</span></p>
                            <h6 class="mb-2 mt-3 mb-2 pt-3 border-top">Address Information</h6>
                            <p class="mb-0">2557 Tanglewood Road, Jackson, MS 39213</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-8">

                    <!-- card start -->
                        <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0 d-inline-flex align-items-center">Appointments</h5> 
                            <a href="appointments.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="row row-gap-3">
                                <div class="col-xl-6 d-flex">
                                    <div class="p-3 border rounded flex-fill">
                                        <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3">
                                            <span class="badge badge-soft-purple">Upcoming</span>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-secondary" aria-label="video"><i class="ti ti-video"></i></a>
                                        </div>
                                        <div class="row row-gap-3">
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Department</h6>
                                                <p class="fs-13 mb-0">Cardiology</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Doctor</h6>
                                                <p class="fs-13 mb-0 text-truncate">Dr. Andrew Clark</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Date & Time</h6>
                                                <p class="fs-13 mb-0">21 Dec 2024, 07:00 AM</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Booked On</h6>
                                                <p class="fs-13 mb-0">20 Dec 2024</p>
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="col-xl-6 d-flex">
                                    <div class="p-3 border rounded flex-fill">
                                        <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3">
                                            <span class="badge badge-soft-success">Completed</span>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-primary" aria-label="phone"><i class="ti ti-phone"></i></a>
                                        </div>
                                        <div class="row row-gap-3">
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Department</h6>
                                                <p class="fs-13 mb-0">Radiology</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Doctor</h6>
                                                <p class="fs-13 mb-0 text-truncate">Dr. Laura Mitchell</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Date & Time</h6>
                                                <p class="fs-13 mb-0">15 Jan 2025, 10:35 AM</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="fs-14 fw-semibold mb-1">Booked On</h6>
                                                <p class="fs-13 mb-0">13 Jan 2025</p>
                                            </div>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card end -->

                    <!-- card start -->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0 d-inline-flex align-items-center">Vital Signs</h5>
                            <a href="javascript:void(0);" class="link-danger text-decoration-underline">Past Data</a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-droplet fs-16"></i></span>
                                        <div>
                                            <h6 class="fs-14 fw-semibold mb-1 text-truncate">Blood Pressure</h6>
                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">100/67 mmHg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-heart-rate-monitor fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Heart Rate</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">89 Bpm</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-hexagons fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1">SPO2</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">98 %</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-temperature fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Temperature</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">101 C</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-ease-in fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Respiratory Rate</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">24 rpm</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="d-flex align-items-center mb-3">
                                    <span class="avatar rounded bg-light text-dark flex-shrink-0 me-2"><i class="ti ti-circuit-switch-open fs-16"></i></span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Weight</h6>
                                        <p class="mb-0 fs-13 d-inline-flex align-items-center text-truncate">100 kg</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card end -->

                    <!-- card start -->
                    <div class="card mb-0">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="fw-bold mb-0 d-inline-flex align-items-center">Visit History</h5> 
                            <a href="visits.php" class="btn btn-sm btn-outline-light flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="row row-gap-3">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="doctor-details.php" class="avatar flex-shrink-0">
                                                    <img src="assets/img/doctors/doctor-12.jpg" class="rounded" alt="doctor">
                                                </a>
                                                <div class="ms-2">
                                                    <div>
                                                        <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Samuel Turner</a></h6>
                                                        <p class="fs-13 mb-0">Cardiology, MD, FRCS</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 row-gap-2">
                                                <div class="col-sm-7">
                                                    <h6 class="fw-semibold mb-1 fs-14">Visited On</h6>
                                                    <p class="fs-13 mb-0 text-truncate">21 Dec 2024, 07:00 AM</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h6 class="fw-semibold mb-1 fs-14">Follow Up</h6>
                                                    <p class="fs-13 mb-0">After 15 Days</p>
                                                </div>
                                            </div>
                                            <div class="p-3 bg-light rounded">
                                                <h6 class="fw-semibold mb-1 fs-14">Notes</h6>
                                                <p class="fs-13 mb-0 text-truncate line-clamb-2">Detailed Information about the symptoms that brought the patient to the visit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="doctor-details.php" class="avatar flex-shrink-0">
                                                    <img src="assets/img/doctors/doctor-09.jpg" class="rounded" alt="doctor">
                                                </a>
                                                <div class="ms-2">
                                                    <div>
                                                        <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Natalie Foster</a></h6>
                                                        <p class="fs-13 mb-0">Neurology, MD, DNB</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 row-gap-2">
                                                <div class="col-sm-7">
                                                    <h6 class="fw-semibold mb-1 fs-14">Visited On</h6>
                                                    <p class="fs-13 mb-0 text-truncate">08 Jan 2024, 09:55 AM</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h6 class="fw-semibold mb-1 fs-14">Follow Up</h6>
                                                    <p class="fs-13 mb-0">After 12 Days</p>
                                                </div>
                                            </div>
                                            <div class="p-3 bg-light rounded">
                                                <h6 class="fw-semibold mb-1 fs-14">Notes</h6>
                                                <p class="fs-13 mb-0 text-truncate line-clamb-2">Information provided to the patient regarding their condition and symptoms</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card end -->

                </div>
                <!-- col end -->

            </div>
            <!-- row end -->

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