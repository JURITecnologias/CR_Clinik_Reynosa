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
                    <h4 class="mb-1">Settings</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>    
                            <li class="breadcrumb-item"><a href="general-settings.php">Settings</a></li>                          
                            <li class="breadcrumb-item active">Plan & Billings</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Start Tabs -->
            <ul class="nav nav-tabs nav-item-primary mb-3 border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="general-settings.php" class="nav-link border rounded fw-semibold">
                        General
                    </a>
                </li>
                <li class="nav-item">
                    <a href="security-settings.php" class="nav-link border rounded fw-semibold">
                        Security
                    </a>
                </li>
                <li class="nav-item">
                    <a href="preferences-settings.php" class="nav-link border rounded fw-semibold">
                        Preferences
                    </a>
                </li>
                <li class="nav-item">
                    <a href="appearance-settings.php" class="nav-link border rounded fw-semibold">
                        Appearance
                    </a>
                </li>
                <li class="nav-item">
                    <a href="notifications-settings.php" class="nav-link border rounded fw-semibold">
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user-permissions-settings.php" class="nav-link border rounded fw-semibold">
                        User Permissions
                    </a>
                </li>
                <li class="nav-item">
                    <a href="plans-billings-settings.php" class="nav-link border rounded fw-semibold active">
                        Plans & Billing
                    </a>
                </li>
            </ul>
            <!-- End Tabs -->

            <!-- Start form -->
            <h5 class="mb-4">Plans & Billing</h5>

            <!-- Items -->
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h6 class="mb-0"> Current Plan Information </h6>
                </div>
                <div class="rounded border bg-white p-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <h6 class="fw-medium mb-1">Basic Plan</h6>
                        <p class="mb-0"> <i class="ti ti-clock"></i> 20 Days Left </p>
                    </div>
                    <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#upgrade"> <i class="ti ti-shield-star me-1"></i> Upgrade</a>
                </div>
            </div>

            <!-- Items -->
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h6 class="mb-0"> Saved Cards </h6>
                    <a href="#" class="btn btn-dark d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#new_modal"> <i class="ti ti-plus me-1"></i>  New Card</a>
                </div>

                <!-- start row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-none mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center flex-wrap row-gap-2 mb-3">
                                    <a href="javascript:void(0);" class="me-2 flex-shrink-0">
                                        <img src="assets/img/icons/payment-img-1.svg" class="img-fluid" alt="payment">
                                    </a>
                                    <div>
                                        <p class="fw-normal fs-14x mb-0 text-body">James Peterson</p>
                                        <span class="fs-14 text-dark fw-medium">Visa •••• 1568</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-success fs-12">Default</a>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-icon border rounded-circle me-2 bg-light" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="ti ti-edit text-body"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon border rounded-circle bg-light" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash text-body"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div>  <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card shadow-none mb-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center flex-wrap row-gap-2 mb-3">
                                    <a href="javascript:void(0);" class="me-2 flex-shrink-0">
                                        <img src="assets/img/icons/payment-img-2.svg" class="img-fluid" alt="payment">
                                    </a>
                                    <div>
                                        <p class="fw-normal fs-14x mb-0 text-body">Raymond Rowley</p>
                                        <span class="fs-14 text-dark fw-medium">Mastercard •••• 1279</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                                    <a href="javascript:void(0);" class="text-decoration-underline fs-14 fw-medium text-primary">Set as Default</a>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-icon border rounded-circle me-2 bg-light" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="ti ti-edit text-body"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon border rounded-circle bg-light" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash text-body"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div>  <!-- end col -->
                </div>
                <!-- end row -->
            </div>

            <!-- Items -->
            <div>
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="mb-0"> Billing History <span class="badge bg-danger rounded ms-1">6</span></h5>
                </div>
                <div class="table-responsive table-nowrap">
                    <?php 
                        $jsonContent = file_get_contents('../assets/json/plans-billings-settings.json');
                        if ($jsonContent !== false) {
                            $data = json_decode($jsonContent, true);
                        } else {
                            $data = [];
                        }
                    ?>
                    <table class="table border mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Created Date</th>
                                <th>Amount</th>
                                <th>Plan</th>
                                <th>Status</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $plan): ?>
                                <tr>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#view_details"> <?= $plan['invoice_id'] ?> </a></td>
                                    <td><?= $plan['created_date'] ?></td>
                                    <td><?= $plan['amount'] ?></td>
                                    <td><?= $plan['plan'] ?></td>
                                    <td>
                                        <?php 
                                            $status = $plan['status'];
                                            $colorMap = [
                                                'Success' => 'success',
                                                'Pending' => 'warning'
                                            ];
                                            $color = $colorMap[$status] ?? 'warning';
                                        ?>
                                        <span class="badge badge-soft-<?= $color ?> border fs-13"><?= $plan['status'] ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                        <ul class="dropdown-menu p-2">                                       
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_details"><i class="ti ti-shield me-1"></i>View Details</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- end table -->
            </div>
            <!-- End form -->

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