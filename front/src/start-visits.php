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
                    <a href="visits.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Visits</a>
                </div>
            </div>
            <!-- End Page Header -->  
                
            <!-- start basic information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Basic Information</h5>
                </div>
                <div class="card-body">

                    <!-- start row --> 
                    <div class="row row-gap-3 align-items-center">
                        <div class="col-lg-6">
                            <div class="d-sm-flex align-items-center">
                                <a href="javascript:void(0);" class="avatar avatar-xxl me-3 flex-shrink-0">
                                    <img src="assets/img/avatars/avatar-05.jpg" alt="img" class="rounded">
                                </a>
                                <div>
                                    <span class="badge badge-soft-primary">Out Patient</span>
                                    <h6 class="mb-1 mt-1"><a href="javascript:void(0);">James Carter</a></h6>
                                    <p class="mb-0">Consultation ID : #C243546</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3 bg-light rounded">
                                <div class="row row-gap-2">
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Age / Gender</h6>
                                        <p class="fs-13 mb-0 text-truncate">28 Years / Male</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Department</h6>
                                        <p class="fs-13 mb-0 text-truncate">Cardiology</p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1">Date</h6>
                                        <p class="fs-13 mb-0 text-truncate">25 Jan 2024, 07:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end basic information -->

            <!-- start vitals information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Vitals</h5>
                </div>
                <div class="card-body pb-0">

                    <!-- start row -->
                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Temperature<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">F</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Pulse<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Respiratory Rate<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">rpm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">SPO2<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Height<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Weight<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">BMI<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">kg/cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Waist<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">BSA<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">M</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end vitals information -->

            <!-- start complaint information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Complaint</h5>
                </div>
                <div class="card-body">
                    <!-- start row -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="mb-0">
                                <input type="text" class="form-control">
                                <p class="mb-0 mt-1 fs-13">Enter value separated by comma </p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end complaint information -->

            <!-- start assessment information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Assessment</h5>
                </div>
                <div class="card-body">
                    <!-- start row -->
                    <div class="row row-gap-3">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="mb-0">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end assessment information -->

            <!-- start medications information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Medications</h5>
                </div>
                <div class="card-body">
                    <!-- start row -->
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Medicine Name<span class="text-danger ms-1">*</span></label>
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Dosage<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">mg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Duration<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">M</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Frequency<span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>1-0-1</option>
                                    <option>1-0-0</option>
                                    <option>0-0-1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Timing<span class="text-danger ms-1">*</span></label>
                                <select class="select">
                                    <option>Select</option>
                                    <option>Before Meal</option>
                                    <option>After Meal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Instructions<span class="text-danger ms-1">*</span></label>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- start row -->
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">mg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-text">M</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <select class="select">
                                    <option>Select</option>
                                    <option>1-0-1</option>
                                    <option>1-0-0</option>
                                    <option>0-0-1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="mb-3">
                                <select class="select">
                                    <option>Select</option>
                                    <option>Before Meal</option>
                                    <option>After Meal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <input class="form-control">
                                <a href="javascript:void(0);" class="btn btn-icon btn-soft-danger border-0 flex-shrink-0 rounded-circle d-linline-flex align-items-center gap-1"> <i class="ti ti-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <a href="javascript:void(0);" class="text-primary d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                </div>
            </div>
            <!-- end medications information -->

            <!-- start advice information -->
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Advice</h5>
                </div>
                <div class="card-body">
                    <!-- start row -->
                    <div class="row row-gap-3">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="mb-0">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end advice information -->

            <!-- start follow Up information -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Follow Up</h5>
                </div>
                <div class="card-body pb-0">
                    <!-- start row -->
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label mb-0">Next Visit</label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="input-group w-auto input-group-flat mb-3">
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                <span class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Whether to Come on Empty Stomach?</label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <select class="select">
                                    <option>Select</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end follow Up information -->

            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2 mt-3">
                <button type="button" class="btn btn-white back-btn">Cancel</button>
                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">End Visits</a>
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