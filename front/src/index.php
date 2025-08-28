<?php ob_start(); 
// include session file for user authentication  
$user = include(__DIR__ . '/user_session.php');
echo $user["user"]["name"];
?>

    <!-- ========================
        Start Page Content
    ========================= -->
        
    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div class="breadcrumb-arrow">
                    <h4 class="mb-1">Welcome, Admin</h4>
                    <p class="mb-0">Today you have 10 visits, <a href="visits.php" class="text-decoration-underline">View Details</a></p>
                </div>
                <div id="reportrange" class="reportrange-picker bg-white d-flex align-items-center">
                    <i class="ti ti-calendar text-body fs-14 me-1"></i><span class="reportrange-picker-field">16 Apr 25 - 16 Apr 25</span>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row start -->
            <div class="row">

                <!-- col start -->
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card pb-2 flex-fill">
                        <div class="d-flex align-items-center justify-content-between gap-1 card-body pb-0 mb-1">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar bg-primary rounded-circle flex-shrink-0"><i class="ti ti-user-exclamation fs-20"></i></span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="mb-1 text-truncate">Patients</p>
                                    <h5 class="mb-0">108</h5>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-soft-success">+20%</span>
                            </div>
                        </div>
                        <div id="chart-1" class="chart-set"></div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card pb-2 flex-fill">
                        <div class="d-flex align-items-center justify-content-between gap-1 card-body pb-0 mb-1">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar bg-orange rounded-circle flex-shrink-0"><i class="ti ti-calendar-check fs-20"></i></span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="mb-1 text-truncate">Appointments</p>
                                    <h5 class="mb-0">658</h5>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-soft-danger">-15%</span>
                            </div>
                        </div>
                        <div id="chart-2" class="chart-set"></div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card pb-2 flex-fill">
                        <div class="d-flex align-items-center justify-content-between gap-1 card-body pb-0 mb-1">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar bg-purple rounded-circle flex-shrink-0"><i class="ti ti-stethoscope fs-20"></i></span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="mb-1 text-truncate">Doctors</p>
                                    <h5 class="mb-0">565</h5>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-soft-success">+18%</span>
                            </div>
                        </div>
                        <div id="chart-3" class="chart-set"></div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card pb-2 flex-fill">
                        <div class="d-flex align-items-center justify-content-between gap-1 card-body pb-0 mb-1">
                            <div class="d-flex align-items-center overflow-hidden">
                                <span class="avatar bg-pink rounded-circle flex-shrink-0"><i class="ti ti-moneybag fs-20"></i></span>
                                <div class="ms-2 overflow-hidden">
                                    <p class="mb-1 text-truncate">Transactions</p>
                                    <h5 class="mb-0">$5,523.56</h5>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-soft-success">+12%</span>
                            </div>
                        </div>
                        <div id="chart-4" class="chart-set"></div>
                    </div>
                </div>
                <!-- col end -->

                </div>
            <!-- row end -->

            <!-- row start -->
            <div class="row">

                <!-- col start -->
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="fw-bold mb-0">Appointment Request</h5> 
                            <a href="appointments.php" class="btn btn-sm btn-white flex-shrink-0">All Appointments</a>
                        </div>
                        <div class="card-body p-1 py-2">
                            <!-- table start -->
                            <div class="table-responsive table-nowrap">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="patient-details.php" class="avatar me-2">
                                                        <img src="assets/img/avatars/avatar-23.jpg" alt="patient" class="rounded">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 mb-1 fw-semibold"><a href="patient-details.php">Dominic Foster</a></h6>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-calendar me-1"></i>12 Aug 2025</p>
                                                            <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-clock-hour-7 me-1"></i>11:35 PM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-soft-success">Urology</span></td>
                                                <td class="text-end border-0">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-xbox-x"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-check"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="patient-details.php" class="avatar me-2">
                                                        <img src="assets/img/avatars/avatar-08.jpg" alt="patient" class="rounded">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 mb-1 fw-semibold"><a href="patient-details.php">Charlotte Bennett</a></h6>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-calendar me-1"></i>06 Aug 2025</p>
                                                            <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-clock-hour-7 me-1"></i>09:58 AM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-soft-info">Cardiology</span></td>
                                                <td class="text-end border-0">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-xbox-x"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-check"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="patient-details.php" class="avatar me-2">
                                                        <img src="assets/img/avatars/avatar-21.jpg" alt="patient" class="rounded">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 mb-1 fw-semibold"><a href="patient-details.php">Ethan Sullivan</a></h6>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-calendar me-1"></i>01 Aug 2025</p>
                                                            <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-clock-hour-7 me-1"></i>12:10 PM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-soft-teal">Dermatology</span></td>
                                                <td class="text-end border-0">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-xbox-x"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-check"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="patient-details.php" class="avatar me-2">
                                                        <img src="assets/img/avatars/avatar-55.jpg" alt="patient" class="rounded">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 mb-1 fw-semibold"><a href="patient-details.php">Brianna Thompson</a></h6>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-calendar me-1"></i>26 Jul 2025</p>
                                                            <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-clock-hour-7 me-1"></i>08:20 AM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-soft-purple">ENT Surgery</span></td>
                                                <td class="text-end border-0">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-xbox-x"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-check"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="patient-details.php" class="avatar me-2">
                                                        <img src="assets/img/avatars/avatar-28.jpg" alt="patient" class="rounded">
                                                    </a>
                                                    <div>
                                                        <h6 class="fs-14 mb-1 fw-semibold"><a href="patient-details.php">Braun Tucker</a></h6>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-calendar me-1"></i>23 Jul 2025</p>
                                                            <span><i class="ti ti-minus-vertical text-light fs-14"></i></span>
                                                            <p class="mb-0 fs-13 d-inline-flex align-items-center text-body"><i class="ti ti-clock-hour-7 me-1"></i>10:30 AM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-soft-info">Radiology</span></td>
                                            <td class="text-end border-0">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-xbox-x"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-icon btn-light"><i class="ti ti-check"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table start -->
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0">Patients Statistics</h5> 
                            <a href="all-patients-list.php" class="btn btn-sm btn-white">View All</a>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <h6 class="fs-14 fw-semibold mb-0">Total No of Patients : 480</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <p class="mb-0 text-dark"><i class="ti ti-point-filled me-1 text-primary"></i>New Patients</p>
                                    <p class="mb-0 text-dark"><i class="ti ti-point-filled me-1 text-soft-primary"></i>Old Patients</p>
                                </div>
                            </div>
                            <div id="chart-5" class="chart-set"></div>
                        </div>
                    </div>
                </div>
                <!-- col end -->                    

            </div>
            <!-- row end -->

            <!-- row start -->
                <div class="row">

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="patients.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-primary rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-users"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">All Patient</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="doctors.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-success rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-topology-bus"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">Doctors</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="lab-results.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-warning rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-test-pipe-2"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">Labs Results</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="pharmacy.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-danger rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-prescription"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">Prescriptions</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="visits.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-purple rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-e-passport"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">Visits</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <a href="medical-results.php" class="card">
                        <div class="card-body text-center">
                            <span class="badge-soft-teal rounded w-100 d-flex p-3 justify-content-center fs-32 mb-2"><i class="ti ti-file-description"></i></span>
                            <h6 class="fs-14 fw-semibold text-truncate mb-0">Medical Results</h6>
                        </div>
                    </a>
                </div>
                <!-- col end -->

                </div>
            <!-- row end -->

            <!-- row start -->
            <div class="row">

                <!-- col start -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0">Patient Reports</h5> 
                            <a href="lab-results.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body pb-1">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-primary rounded-circle">
                                        <i class="ti ti-droplet fs-20"></i>
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">David Marshall</a></h6>
                                        <p class="mb-0 fs-13">Hemoglobin</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-download"></i></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-success rounded-circle">
                                        <i class="ti ti-mood-neutral fs-20"></i>
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">Thomas McLean</a></h6>
                                        <p class="mb-0 fs-13">X Ray</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-download"></i></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-danger rounded-circle">
                                        <i class="ti ti-rainbow fs-20"></i>
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">Greta Kinney</a></h6>
                                        <p class="mb-0 fs-13">MRI Scan</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-download"></i></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-purple rounded-circle">
                                        <i class="ti ti-rosette fs-20"></i>
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">Larry Wilburn</a></h6>
                                        <p class="mb-0 fs-13">Blood Test</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-download"></i></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar me-2 badge-soft-teal rounded-circle">
                                        <i class="ti ti-radio fs-20"></i>
                                    </a>
                                    <div>
                                        <h6 class="fs-14 fw-semibold text-truncate mb-1"><a href="patient-details.php">Reyan Verol</a></h6>
                                        <p class="mb-0 fs-13">CT Scan</p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light me-1"><i class="ti ti-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0">Patient Visits</h5> 
                            <a href="visits.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body">                                
                            <div id="patients-visits" class="mb-3"></div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="avatar bg-primary rounded-circle flex-shrink-0"><i class="ti ti-gender-male fs-20"></i></span>
                                    <div class="ms-2">
                                        <h6 class="mb-1 fs-14 fw-semibold">Male</h6>
                                        <p class="mb-1 fs-13 text-truncate"><span class="text-success">-15%</span> Since Last Week</p>
                                    </div>
                                </div>
                                <h6 class="mb-0">69%</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="d-flex align-items-center">
                                    <span class="avatar bg-purple rounded-circle flex-shrink-0"><i class="ti ti-gender-female fs-20"></i></span>
                                    <div class="ms-2">
                                        <h6 class="mb-1 fs-14 fw-semibold">Female</h6>
                                        <p class="mb-1 fs-13 text-truncate"><span class="text-success">-15%</span> Since Last Week</p>
                                    </div>
                                </div>
                                <h6 class="mb-0">56%</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->
                
                <!-- col start -->
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0">Doctors</h5> 
                            <a href="doctors.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="overflow-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar flex-shrink-0">
                                            <img src="assets/img/doctors/doctor-01.jpg" class="rounded" alt="doctor">
                                        </a>
                                        <div class="ms-2">
                                            <div>
                                                <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. William Harrison</a></h6>
                                                <p class="fs-13 mb-0">Cardiology</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <span class="badge badge-soft-success">Available</span> 
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar flex-shrink-0">
                                            <img src="assets/img/doctors/doctor-11.jpg" class="rounded" alt="doctor">
                                        </a>
                                        <div class="ms-2">
                                            <div>
                                                <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Victoria Adams</a></h6>
                                                <p class="fs-13 mb-0">Urology</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <span class="badge badge-soft-danger">Unavailable</span> 
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar flex-shrink-0">
                                            <img src="assets/img/doctors/doctor-06.jpg" class="rounded" alt="doctor">
                                        </a>
                                        <div class="ms-2">
                                            <div>
                                                <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Jonathan Bennett</a></h6>
                                                <p class="fs-13 mb-0">Radiology</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <span class="badge badge-soft-success">Available</span> 
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar flex-shrink-0">
                                            <img src="assets/img/doctors/doctor-07.jpg" class="rounded" alt="doctor">
                                        </a>
                                        <div class="ms-2">
                                            <div>
                                                <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Natalie Brooks</a></h6>
                                                <p class="fs-13 mb-0">ENT Surgery</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <span class="badge badge-soft-success">Available</span> 
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <div class="d-flex align-items-center">
                                        <a href="doctor-details.php" class="avatar flex-shrink-0">
                                            <img src="assets/img/doctors/doctor-12.jpg" class="rounded" alt="doctor">
                                        </a>
                                        <div class="ms-2">
                                            <div>
                                                <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="doctor-details.php">Dr. Samuel Reed</a></h6>
                                                <p class="fs-13 mb-0">Dermatology</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <span class="badge badge-soft-success">Available</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->

            </div>
            <!-- row end -->

            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-xl-5 d-flex">
                    <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Top Departments</h5> 
                            <a href="javascript:void(0);" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="row row-gap-3 align-items-center mb-4">
                                <div class="col-sm-6">
                                    <div class="position-relative">
                                        <canvas id="attendance" height="180"></canvas>
                                        <div class="position-absolute text-center top-50 start-50 translate-middle">
                                            <p class="fs-13 mb-1">Appointments</p>
                                            <h3>3656</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-start text-center">
                                        <p class="text-dark mb-2"><i class="ti ti-circle-filled text-info fs-13 me-1"></i>Cardiology</p>
                                        <p class="text-dark mb-2"><i class="ti ti-circle-filled text-cyan fs-13 me-1"></i>Neurology</p>
                                        <p class="text-dark mb-2"><i class="ti ti-circle-filled text-purple fs-13 me-1"></i>Dermatology</p>
                                        <p class="text-dark mb-2"><i class="ti ti-circle-filled text-orange fs-13 me-1"></i>Orthopedics</p>
                                        <p class="text-dark mb-2"><i class="ti ti-circle-filled text-warning fs-13 me-1"></i>Urology</p>
                                        <p class="text-dark mb-0"><i class="ti ti-circle-filled text-indigo fs-13 me-1"></i>Radiology</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded p-1">
                                <div class="row g-0">
                                    <div class="col-6 p-2 border-end text-center">
                                        <h5 class="mb-1">$2512.32</h5>
                                        <p class="mb-0 text-body">Revenue Generated</p>
                                    </div>
                                    <div class="col-6 p-2 text-center">
                                        <h5 class="mb-1">3125+</h5>
                                        <p class="mb-0 text-body">Appointments last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-7 d-flex">
                    <!-- card start -->
                    <div class="card shadow flex-fill w-100">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <h5 class="mb-0">Patient Record</h5> 
                            <a href="medical-results.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                        </div>
                        <div class="card-body">
                            <!-- table start -->
                            <div class="table-responsive table-nowrap">
                                <table class="table border mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Patient Name</th>
                                            <th>Diagnosis</th>
                                            <th>Department</th>
                                            <th>Last Visit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">James Carter</a></h6>
                                            </td>
                                            <td>Male</td>
                                            <td><span class="badge badge-soft-info">Cardiology</span></td>
                                            <td>17 Jun 2025</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Emily Davis</a></h6>
                                            </td>
                                            <td>Female</td>
                                            <td><span class="badge badge-soft-success">Urology</span></td>
                                            <td>10 Jun 2025</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Michael John</a></h6>
                                            </td>
                                            <td>Male</td>
                                            <td><span class="badge badge-soft-info">Radiology</span></td>
                                            <td>22 May 2025</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Olivia Miller</a></h6>
                                            </td>
                                            <td>Female</td>
                                            <td><span class="badge badge-soft-purple">ENT Surgery</span></td>
                                            <td>15 May 2025</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">David Smith</a></h6>
                                            </td>
                                            <td>Male</td>
                                            <td><span class="badge badge-soft-teal">Dermatology</span></td>
                                            <td>30 Apr 2025</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table start -->
                        </div>
                    </div>
                    <!-- card end -->
                </div>
                <!-- col end -->

            </div>
            <!-- row end -->

            <!-- card start -->
            <div class="card shadow flex-fill w-100 mb-0">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <h5 class="mb-0">Latest Appointments</h5> 
                    <a href="appointments.php" class="btn btn-sm btn-white flex-shrink-0">View All</a>
                </div>
                <div class="card-body">
                    <!-- table start -->
                    <div class="table-responsive table-nowrap">
                        <table class="table border mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Session Type</th>
                                    <th>Doctor Name</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0025</a></td>
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
                                    <td>Visit</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-01.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Andrew Clark</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>17 Jun 2025, 09:00 AM to 10:00 AM</td>
                                    <td><span class="badge badge-soft-purple">Inprogress</span></td>
                                    
                                </tr>
                                <tr>
                                    <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0024</a></td>
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
                                    <td>Consultation</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-07.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Katherine Brooks</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>10 Jun 2025, 10:30 AM to 11:30 AM</td>
                                    <td><span class="badge badge-soft-purple">Inprogress</span></td>
                                    
                                </tr>
                                <tr>
                                    <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0023</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-38.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Michael Johnson</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Visit</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-12.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Benjamin Harris</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>22 May 2025, 01:15 PM to 02:15 PM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    
                                </tr>
                                <tr>
                                    <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0022</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/avatars/avatar-43.jpg" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php">Olivia Miller</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Consultation</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-03.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Laura Mitchell</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>15 May 2025, 11:30 AM to 12:30 PM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    
                                </tr>
                                <tr>
                                    <td><a href="javascript:void(0);" class="link-muted" data-bs-toggle="modal" data-bs-target="#view_appointment_modal">#PT0021</a></td>
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
                                    <td>Consultation</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="assets/img/doctors/doctor-15.jpg" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php">Dr. Christopher Lewis</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>30 Apr 2025, 12:20 PM to 01:20 PM</td>
                                    <td><span class="badge badge-soft-success">Completed</span></td>
                                    
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