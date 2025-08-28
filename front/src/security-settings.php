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
                            <li class="breadcrumb-item active">Security</li>
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
                    <a href="security-settings.php" class="nav-link border rounded fw-semibold active">
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
                    <a href="plans-billings-settings.php" class="nav-link border rounded fw-semibold">
                        Plans & Billing
                    </a>
                </li>
            </ul>
            <!-- End Tabs -->

            <!-- Start form -->
            <form>
                <div class="card mb-0">
                    <div class="card-header border-0 pb-1">
                        <h5 class="mb-0 pt-2">Security</h5>
                    </div>

                    <div class="card-body">
                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light flex-shrink-0">
                                    <i class="ti ti-lock-check text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Password</h6>
                                    <p class="mb-0">Set a unique password to secure the account</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-soft-purple me-2">Last Changed, Mar 18, 2025</span>    
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#change_password">Edit</a>                                   
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-shield-half text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Two Factor authentication</h6>
                                    <p class="mb-0">Use your mobile phone to receive security PIN.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <span class="badge badge-soft-purple">Enabled, Mar 18, 2025</span>    
                                <label class="d-flex align-items-center form-switch ps-2">
                                    <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                </label>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#two-factor">Configure</a>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-brand-google-filled text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Google Authentication</h6>
                                    <p class="mb-0">Connect to Google</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <span class="badge badge-soft-success">Connected</span>  
                                <label class="d-flex align-items-center form-switch ps-2">
                                    <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                </label>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-phone text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Phone Number</h6>
                                    <p class="mb-0">Phone Number associated with the account</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="badge badge-soft-success">Verified</span>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#change_phonenumber">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#delete_modal">Delete</a>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-mail text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Email Address</h6>
                                    <p class="mb-0">Email Address associated with the account</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="badge badge-soft-success">Verified</span>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#change_email">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#delete_modal">Delete</a>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-device-laptop text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Browsers & Devices</h6>
                                    <p class="mb-0">The browsers & devices associated with the account</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#browse_device">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#delete_modal">Delete</a>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-4 pb-4">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-xbox-x text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Deactivate Account</h6>
                                    <p class="mb-0">This will shutdown your account. Your account will be reactive when you sign in again</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#deactivate_account">Deactivate</a>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="avatar avatar-lg border bg-light">
                                    <i class="ti ti-trash text-dark fs-24"></i>
                                </span>
                                <div>
                                    <h6 class="fw-semibold fs-14 mb-1">Delete Account</h6>
                                    <p class="mb-0">Your account will be permanently deleted</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#delete_account">Delete</a>
                            </div>
                        </div>
                    </div> 
                </div>
            </form>
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