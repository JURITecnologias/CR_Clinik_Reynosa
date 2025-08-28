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
                    <a href="doctors.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Grid View"><i class="ti ti-layout-grid"></i></a>
                    <a href="all-doctors-list.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="List View"><i class="ti ti-layout-list"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="add-doctors.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>New Doctor</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Doctors<span class="badge bg-danger ms-2">600</span></h5>
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
                       $jsonContent = file_get_contents('../assets/json/all-doctors.json');
                       if ($jsonContent !== false) {
                           $doctors = json_decode($jsonContent, true);
                       } else {
                           $doctors = [];
                       }
                       ?>

                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Doctor Name</th>
                                    <th>Department</th>
                                    <th>Qualification</th>
                                    <th>Experience</th>
                                    <th>Total Appointments</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $doctor) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($doctor['id']) ?></td>
                                    <td><div class="d-flex align-items-center"><a href="doctor-details.php" class="avatar avatar-xs me-2"><img src="<?= htmlspecialchars($doctor['avatar']) ?>" alt="doctor" class="rounded"></a><div><h6 class="fs-14 mb-0 fw-medium"><a href="doctor-details.php"><?= htmlspecialchars($doctor['name']) ?></a></h6></div></div></td>
                                    <td><?= htmlspecialchars($doctor['department']) ?></td>
                                    <td><?= htmlspecialchars($doctor['qualification']) ?></td>
                                    <td><?= htmlspecialchars($doctor['experience']) ?></td>
                                    <td><?= htmlspecialchars($doctor['appointments']) ?></td>
                                    <td>
                                        <?php
                                            $status_colors = [
                                                "Active" => "success",
                                                "Inactive" => "danger",
                                                "Pending" => "warning",
                                                "In progress" => "primary",
                                                "default" => "secondary"
                                            ];

                                            $color = $status_colors[$doctor['status']] ?? $status_colors['default'];
                                        ?>
                                        <span class="badge badge-soft-<?= $color ?>"><?= htmlspecialchars($doctor['status']) ?></span></td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
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
                                    </td>
                                </tr>
                                <?php } ?>
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