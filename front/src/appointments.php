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
                    <h4 class="mb-1">Appointments</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Appointments</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">                        
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ti ti-square-rounded-plus me-1"></i>New Appointment</a>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- card start -->
            <div class="card mb-0">

                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Appointments<span class="badge bg-danger ms-2">950</span></h5>
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
                            $jsonContent = file_get_contents('../assets/json/appointments.json');
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
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th class="no-sort">Department</th>
                                    <th class="no-sort">Appointment Date</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $entry): ?>
                                <tr>
                                    <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal"><?= $entry['id'] ?></a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="<?= $entry['patient_img'] ?>" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php"><?= $entry['patient_name'] ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="<?= $entry['doctor_img'] ?>" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php"><?= $entry['doctor_name'] ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $entry['department'] ?></td>
                                    <td><?= $entry['appointment'] ?></td>
                                    <td>
                                        <?php 
                                            // Assign badge color class based on status
                                            $status = strtolower($entry['status']);
                                            $colorMap = [
                                                'upcoming' => 'purple',
                                                'inprogress' => 'info',
                                                'completed' => 'success'
                                            ];
                                            $color = $colorMap[$status] ?? 'secondary'; // fallback if status is unknown
                                        ?>    
                                        <span class="badge badge-soft-<?= $color ?>"><?= $entry['status'] ?></span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-outline-light" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a>
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
                    <!-- table start -->
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