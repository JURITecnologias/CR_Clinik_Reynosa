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
                    <h4 class="mb-1">Visits</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Visits</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="javascript:void(0);" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add_visit"><i class="ti ti-square-rounded-plus me-1"></i>New Visit</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Visits<span class="badge bg-danger ms-2">658</span></h5>
                    <div class="d-flex align-items-center">

                        <!-- sort by -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-md btn-outline-light d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-sort-descending-2 me-1"></i><span class="me-1">Sort By : </span>  Newest
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
                    <div class="table-responsive table-nowrap">
                        <?php 
                            $jsonContent = file_get_contents('../assets/json/visits.json');
                            if ($jsonContent !== false) {
                                $data = json_decode($jsonContent, true);
                            } else {
                                $data = [];
                            }
                        ?>
                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>Visit ID</th>
                                    <th>Patient Name</th>
                                    <th class="no-sort">Department</th>
                                    <th>Doctor Name</th>
                                    <th class="no-sort">Visit Date</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $visit): ?> 
                                    <tr>
                                        <td><a href="javascript:void(0);"><?= $visit['visit_id'] ?></a></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                    <img src="<?= $visit['patient_image'] ?>" alt="patient" class="rounded">
                                                </a>
                                                <div>
                                                    <h6 class="fs-14 mb-0 fw-medium"><a href="patient-details.php"><?= $visit['patient_name'] ?></a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $visit['department'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                    <img src="<?= $visit['doctor_image'] ?>" alt="doctor" class="rounded">
                                                </a>
                                                <div>
                                                    <h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php"><?= $visit['doctor_name'] ?></a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $visit['visit_date'] ?></td>
                                        <td>
                                            <?php 
                                                $status = $visit['status'];
                                                $colorMap = [
                                                    'Completed' => 'success',
                                                    'Inprogress' => 'info',
                                                    'Pending' => 'warning'
                                                ];
                                                $color = $colorMap[$status] ?? 'warning';
                                            ?>
                                            <span class="badge badge-soft-<?= $color ?>"><?= $visit['status'] ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="start-visits.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-gradienter me-1"></i>Start Visit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_visit"><i class="ti ti-edit me-1"></i>Edit</a>
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