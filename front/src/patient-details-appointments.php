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
                    <a href="patient-details-appointments.php" class="nav-link border rounded fw-semibold active">
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

            <!-- card start -->
            <div class="card mb-0">

                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Appointments<span class="badge bg-danger ms-2">658</span></h5>
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
                        <?php 
                            $jsonContent = file_get_contents('../assets/json/patient-details-appointments.json');
                            if ($jsonContent !== false) {
                                $data = json_decode($jsonContent, true);
                            } else {
                                $data = [];
                            }
                        ?>
                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Doctor Name</th>
                                    <th class="no-sort">Department</th>
                                    <th class="no-sort">Appointment Date</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $appointment): ?>
                                    <tr>
                                        <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal"><?= $appointment['patient_id'] ?></a></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                    <img src="<?= $appointment['doctor_avatar'] ?>" alt="doctor" class="rounded">
                                                </a>
                                                <div>
                                                    <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php"><?= $appointment['doctor_name'] ?></a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $appointment['department'] ?></td>                                        
                                        <td><?= $appointment['appointment'] ?></td>
                                        <td>
                                            <?php 
                                                $status = $appointment['status'];
                                                $colorMap = [
                                                    'Upcoming' => 'purple',
                                                    'Completed' => 'success'
                                                ];
                                                $color = $colorMap[$status] ?? 'info';
                                            ?>
                                            <span class="badge badge-soft-<?= $color ?>"><?= $appointment['status'] ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>                                        
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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