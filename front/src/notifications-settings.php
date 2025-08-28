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
                            <li class="breadcrumb-item active">Notifications</li>
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
                    <a href="notifications-settings.php" class="nav-link border rounded fw-semibold active">
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
                        <div class="table-responsive table-nowrap">
                            <table class="table border mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="w-75">
                                            General Notifications
                                        </th>
                                        <th class="text-grey fw-regular">
                                        Push
                                        </th>
                                        <th class="text-grey fw-regular">
                                            Email
                                        </th>
                                        <th class="text-grey fw-regular">
                                            SMS
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td class="border-0">
                                        Email Notifications
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-0">
                                        Appointment Alerts
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-0">
                                            Subscription Alerts
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-0">
                                            Security Alerts
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-0">
                                        Device Login Alerts
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                        <td class="border-0">
                                            <div class="form-check form-switch p-0 d-flex align-items-center">
                                                <input class="form-check-input m-0" type="checkbox" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  <!-- end table -->

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