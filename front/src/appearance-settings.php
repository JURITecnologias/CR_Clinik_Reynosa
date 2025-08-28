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
                            <li class="breadcrumb-item active">Appearence</li>
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
                    <a href="appearance-settings.php" class="nav-link border rounded fw-semibold active">
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
                        <h5 class="mb-0 pt-2">Appearance</h5>
                    </div>

                    <div class="card-body">

                        <!-- start row -->
                        <div class="row align-items-center mb-4">
                            <div class="col-xl-7 col-md-4">
                                <div class="mb-3 ">
                                    <h6 class="mb-1 fs-14 fw-medium">Select Theme</h6>
                                    <span class="fs-13">Choose theme of website</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-5 col-md-8">
                                <!-- start row -->
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="card theme-image mb-lg-0">
                                            <div class="card-body p-2">
                                                <a href="#">
                                                    <div class="border rounded border-gray mb-2">
                                                        <img src="assets/img/theme/light.jpg" class="img-fluid rounded w-100" alt="theme">
                                                    </div>
                                                    <p class="text-center fw-medium mb-0 fs-13 text-primary">Light</p>
                                                </a>
                                            </div> <!-- end card body -->
                                        </div> <!-- end card -->
                                    </div> <!-- end col -->

                                    <div class="col-md-4">
                                        <div class="card theme-image  mb-lg-0">
                                            <div class="card-body p-2">
                                                <a href="#">
                                                    <div class="border rounded border-gray mb-2">
                                                        <img src="assets/img/theme/dark.jpg" class="img-fluid rounded w-100" alt="theme">
                                                    </div>
                                                    <p class="text-center fw-medium mb-0 fs-13 text-primary">Dark</p>
                                                </a>
                                            </div> <!-- end card body -->
                                        </div> <!-- end card -->
                                    </div> <!-- end col -->

                                    <div class="col-md-4">
                                        <div class="card theme-image  mb-lg-0">
                                            <div class="card-body p-2">
                                                <a href="#">
                                                    <div class="border rounded border-gray mb-2">
                                                        <img src="assets/img/theme/automatic.jpg" class="img-fluid rounded w-100" alt="theme">
                                                    </div>
                                                    <p class="text-center fw-medium mb-0 fs-13 text-primary">Automatic</p>
                                                </a>
                                            </div> <!-- end card body -->
                                        </div> <!-- end card -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-center">
                            <div class="col-xl-7 col-md-4">
                                <div class="mb-4">
                                    <h6 class="mb-1 fs-14 fw-medium">Accent Color</h6>
                                    <span class="fs-13">Choose accent colour of website</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-5 col-md-8">
                                <div class="d-flex align-items-center justify-content-xl-end justify-content-start flex-wrap mb-4 gap-2">
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="primarycolor" checked>
                                        <label for="primarycolor" class="primary-clr"></label>
                                    </div>
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="secondarycolor">
                                        <label for="secondarycolor" class="secondary-clr"></label>
                                    </div>
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="successcolor">
                                        <label for="successcolor" class="success-clr"></label>
                                    </div>
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="dangercolor">
                                        <label for="dangercolor" class="danger-clr"></label>
                                    </div>
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="infocolor">
                                        <label for="infocolor" class="info-clr"></label>
                                    </div>
                                    <div class="theme-colorsset">
                                        <input type="radio" name="color" id="warningcolor">
                                        <label for="warningcolor" class="warning-clr"></label>
                                    </div>  
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-centergap-lg-0 gap-md-0 gap-2 mb-4">
                            <div class="col-xl-9 col-md-4">
                                <div>
                                    <h6 class="mb-1 fs-14 fw-medium">Expand Sidebar</h6>
                                    <span class="fs-13">Choose expand sidebar</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-md-4 d-flex align-items-center justify-content-xl-end">
                                <label class="d-flex align-items-center justify-content-xl-end form-switch ps-2">
                                    <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                </label>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-centergap-lg-0 gap-md-0 gap-2 mb-4">
                            <div class="col-xl-9 col-md-4">
                                <div>
                                    <h6 class="mb-1 fs-14 fw-medium">Timezone</h6>
                                    <span class="fs-13">Select timezone to display</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-md-4">
                                <div>
                                    <select class="select text-dark">
                                        <option>Pacific Standard Time - UTC -8</option>
                                        <option>Eastern Standard Time - UTC -5</option>
                                        <option>Central Standard Time - UTC -6</option>
                                        <option>India Standard Time - UTC +5:30</option>
                                        <option>Central European Time - UTC +1</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-centergap-lg-0 gap-md-0 gap-2 mb-4">
                            <div class="col-xl-9 col-md-4">
                                <div>
                                    <h6 class="mb-1 fs-14 fw-medium">Language</h6>
                                    <span class="fs-13">Select language to display</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-md-4">
                                <div>
                                    <select class="select">
                                        <option>English (US)</option>
                                        <option>German (DE)</option>
                                        <option>French (FR)</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-centergap-lg-0 gap-md-0 gap-2 mb-4">
                            <div class="col-xl-9 col-md-4">
                                <div>
                                    <h6 class="mb-1 fs-14 fw-medium">Sidebar Size</h6>
                                    <span class="fs-13">Choose expand sidebary</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-md-4">
                                <select class="select">
                                    <option>Small (252px)</option>
                                    <option>Medium - 250px</option>
                                    <option>Large - 300px</option>
                                </select>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <!-- start row -->
                        <div class="row align-items-centergap-lg-0 gap-md-0 gap-2 mb-0">
                            <div class="col-xl-9 col-md-4">
                                <div>
                                    <h6 class="mb-1 fs-14 fw-medium">Font Family</h6>
                                    <span class="fs-13">Select font family of website</span>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-xl-3 col-md-4">
                                <select class="select">
                                    <option> Mulish </option>
                                    <option>Roboto</option>
                                    <option>Popins</option>
                                </select>
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