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
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Start Tabs -->
            <ul class="nav nav-tabs nav-item-primary mb-3 border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="general-settings.php" class="nav-link border rounded fw-semibold active">
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
                        <h5 class="mb-0 pt-2">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                            <div class="d-flex align-items-center flex-wrap gap-3">
                                <div class="flex-shrink-0">
                                    <div class="position-relative d-flex align-items-center border rounded">
                                        <img src="assets/img/avatars/avatar-44.jpg" class="avatar avatar-xxl" alt="patient">
                                    </div>
                                </div>
                                <div class="d-inline-flex flex-column align-items-start">
                                    <div class="d-inline-flex align-items-start gap-2">
                                        <div class="drag-upload-btn btn btn-dark position-relative mb-2">
                                            <i class="ti ti-arrows-exchange-2 me-1"></i>Change Image
                                            <input type="file" class="form-control image-sign" multiple="">
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="btn btn-dangerd-flex align-items-center gap-1"> <i class="ti ti-trash"></i>  Remove</a>
                                        </div>
                                    </div>
                                    <span class="fs-13 text-body">Use JPEG, PNG, or GIF. Best size: 200x200 pixels. Keep it under 5MB</span>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom mb-3 pb-3 justify-content-center">
                            <!-- start row -->
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3 mb-lg-0">
                                        <label class="form-label">Hospital Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3 mb-lg-0">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-0 w-100">
                                        <label class="form-label d-block">Mobile Number</label>
                                        <input type="text" class="form-control w-100" name="phone">
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>

                        <div class="border-bottom mb-3">
                            <h5 class="mb-3">Address</h5>
                            <!-- start row -->
                            <div class="row">

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pincode</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>Germany</option>
                                            <option>France</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>California</option>
                                            <option>New York</option>
                                            <option>Texas</option>
                                            <option>Florida</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Los Angeles</option>
                                            <option>San Diego</option>
                                            <option>Fresno</option>
                                            <option>San Francisco</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->


                            </div>
                            <!-- end row -->
                        </div>

                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="" class="btn btn-white"> Cancel</a>
                            <a href="" class="btn btn-primary"> Save Changes</a>
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