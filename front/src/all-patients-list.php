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
                    <a href="patients.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Grid View"><i class="ti ti-layout-grid"></i></a>
                    <a href="all-patients-list.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="List View"><i class="ti ti-layout-list"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="add-patient.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>Add New Patient</a>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="d-inline-flex align-items-center mb-0">Total Patients <span class="badge bg-danger ms-2">658</span></h6>
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
                        $jsonContent = file_get_contents('../assets/json/all-patients.json');
                        if ($jsonContent !== false) {
                            $patients = json_decode($jsonContent, true);
                        } else {
                            $patients = [];
                        }
                        ?>

                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th class="no-sort">Gender</th>
                                    <th class="no-sort">Department</th>
                                    <th>Doctor Name</th>
                                    <th>Last Visit</th>
                                    <th class="no-sort">Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patients as $p) { ?>
                                <tr>
                                    <td><a href="patient-details.php"><?= $p['patient_id'] ?></a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                <img src="<?= $p['avatar'] ?>" alt="patient" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php"><?= $p['name'] ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $p['gender'] ?></td>
                                    <td><?= $p['department'] ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="doctor-details.php" class="avatar avatar-xs me-2">
                                                <img src="<?= $p['doctor_avatar'] ?>" alt="doctor" class="rounded">
                                            </a>
                                            <div>
                                                <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php"><?= $p['doctor_name'] ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $p['last_visit'] ?></td>
                                    <td><span class="badge badge-soft-<?= $p['status_class'] ?>"><?= $p['status'] ?></span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
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
                                    </td>
                                </tr>
                                <?php } ?>                                
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