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
                    <h4 class="mb-1">Staffs</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Staffs</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="javascript:void(0);" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add_staff"><i class="ti ti-square-rounded-plus me-1"></i>New Staff</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Staffs<span class="badge bg-danger ms-2">600</span></h5>
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
                            $jsonContent = file_get_contents('../assets/json/staffs.json');
                            if ($jsonContent !== false) {
                                $data = json_decode($jsonContent, true);
                            } else {
                                $data = [];
                            }
                        ?>
                        <table class="table border mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Staff ID</th>
                                    <th>Staff Name</th>
                                    <th class="no-sort">Gender</th>
                                    <th class="no-sort">Designation</th>
                                    <th class="no-sort">Phone Number</th>
                                    <th>Email</th>
                                    <th class="no-sort">Appointment Date</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $staff): ?>
                                    <tr>
                                        <td><a href="javascript:void(0);"><?= $staff['id'] ?></a></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="patient-details.php" class="avatar avatar-xs me-2">
                                                    <img src="<?= $staff['avatar'] ?>" alt="staff" class="rounded">
                                                </a>
                                                <div>
                                                    <h6 class="fs-14 mb-0 fw-medium"><a href="javascript:void(0);"><?= $staff['name'] ?></a></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $staff['gender'] ?></td>
                                        <td><?= $staff['designation'] ?></td>
                                        <td><?= $staff['phone'] ?></td>
                                        <td><?= $staff['email'] ?></td>
                                        <td><?= $staff['appointment_date'] ?></td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_staff"><i class="ti ti-eye me-1"></i>View Details</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_staff"><i class="ti ti-edit me-1"></i>Edit</a>
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