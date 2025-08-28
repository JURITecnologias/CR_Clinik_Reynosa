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
                            <li class="breadcrumb-item active">Permissions</li>
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
                    <a href="user-permissions-settings.php" class="nav-link border rounded fw-semibold active">
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


            <!-- Item -->
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h5 class="mb-0">Main</h5>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input mt-0" type="checkbox" id="select-all">
                        <label for="select-all">Allow All</label>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-nowrap">
                        <table class="table border mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="w-50">Module</th>
                                    <th>Create</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View</th>
                                    <th>Allow All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Patients</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Doctors</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Visits</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requests</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Appointments</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laboratory</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Messages</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contacts</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Notifications</td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="card select-group2">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h5 class="mb-0">Medical</h5>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input selectall2 mt-0" type="checkbox" id="allow-02"> 
                        <label for="allow-02">Allow All</label>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-nowrap">
                        <table class="table border mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="w-50">Module</th>
                                    <th>Create</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View</th>
                                    <th>Allow All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lab Results</td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Medical Records</td>
                                    <td>
                                        <div class="form-check2">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md2" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md2" type="checkbox">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body -->
            </div> <!-- end card -->

            <!-- Item -->
            <div class="card mb-0 select-group3">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h5 class="mb-0">Manage</h5>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input selectall3 mt-0" type="checkbox" id="allow-01"> 
                        <label for="allow-01">Allow All</label>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-nowrap">
                        <table class="table border mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="w-50">Module</th>
                                    <th>Create</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View</th>
                                    <th>Allow All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pharmacy</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-md3">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Staffs</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Settings</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox" checked="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-md3" type="checkbox">
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body -->
            </div> <!-- end card -->

            <div class="d-flex align-items-center justify-content-end gap-2 border-top mt-4 pt-3">
                <a href="" class="btn btn-white"> Cancel</a>
                <a href="" class="btn btn-primary"> Save Changes</a>
            </div>
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