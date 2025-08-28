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
                            <li class="breadcrumb-item active">Preferences</li>
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
                    <a href="preferences-settings.php" class="nav-link border rounded fw-semibold active">
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
                        <h5 class="mb-0 pt-2">Preferences</h5>
                    </div>

                    <div class="card-body">
                        <!-- start row -->
                        <div class="row row-gap-4">
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Patients</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Doctors</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Visits</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Appointments</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Laboratory</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Lab Results</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Medical Records</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Pharmacy</h6>
                                    <div class="form-check form-switch m-0 d-flex align-items-center">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="d-flex justify-content-between align-items-center border rounded bg-light p-3">
                                    <h6 class="fw-semibold mb-0 fs-14">Staffs</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input m-0" type="checkbox" checked="">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="d-flex align-items-center justify-content-end gap-2 border-top mt-4 pt-3">
                            <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
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