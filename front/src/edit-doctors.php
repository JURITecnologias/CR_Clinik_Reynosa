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
                    <h4 class="mb-1">Edit Doctors</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Edit Doctors</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="doctors.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Doctors</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row start -->
            <div class="row row-gap-3 vertical-tab">
                <div class="col-xl-3 col-lg-4">
                    <div class="nav flex-column nav-pills">
                        <button class="nav-link active fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-info-circle fs-16 me-2"></i>Basic Information</button>
                        <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-vector-spline fs-16 me-2"></i>Extra Information</button>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="patient-form-wizard flex-fill">

                        <!-- start basic information -->
                        <div class="form-wizard-content active">
                            <form action="add-doctors.php">

                                <!-- Start Basic Information -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Basic Information</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="mb-3">
                                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="position-relative d-flex align-items-center border rounded">
                                                        <img src="assets/img/doctors/doctor-01.jpg" class="avatar avatar-xxl" alt="doctor">
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex flex-column align-items-start">
                                                    <div class="d-inline-flex align-items-start gap-2">
                                                        <div class="drag-upload-btn btn btn-dark position-relative mb-2">
                                                            <i class="ti ti-arrows-exchange-2 me-1"></i>Change Image
                                                            <input type="file" class="form-control image-sign" multiple="">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-danger d-flex align-items-center gap-1"> <i class="ti ti-trash"></i>  Remove</a>
                                                        </div>
                                                    </div>
                                                    <span class="fs-13 text-body">Use JPEG, PNG, or GIF. Best size: 200x200 pixels. Keep it under 5MB</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ID</label>
                                                    <input type="text" class="form-control" value="#DR0025" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Department<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Dentistry</option>
                                                        <option>Pediatrics</option>
                                                        <option>Cardiology</option>
                                                        <option>Orthopedics</option>
                                                        <option>Dermatology</option>                                                           
                                                        <option>Neurology</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Specialist<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Dentist</option>
                                                        <option>Pediatrics</option>
                                                        <option>Pediatrics</option>
                                                        <option>Orthopedic Surgeon </option>
                                                        <option>Dermatologist</option>                                                           
                                                        <option>Neurologist</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Fees ($)<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">DOB<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Registration Number<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>     
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Known Languages<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>English</option>
                                                        <option>Arabic</option>
                                                        <option>French</option>
                                                    </select>
                                                </div>
                                            </div>     
                                            <div class="col-xl-12 col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">About</label>
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                                <!-- End Basic Information -->

                                <!-- Start Address Information -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Address Information</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" name="phone" type="tel">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
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
                                            </div>
                                            <div class="col-xl-3 col-md-6">
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
                                            </div>
                                            <div class="col-xl-3 col-md-6">
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
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pin code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address Information -->

                                <!-- Start Account Details -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Account Details</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Display Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">User Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Account Details -->
                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                    <button type="submit" class="btn btn-white">cancel</button>
                                    <button type="button" class="btn btn-primary next-tab-btn" id="save-basic-info">Save & Next</button>
                                </div>
                            </form>
                        </div>

                        <!-- start extra information -->
                        <div class="form-wizard-content">
                            <form>

                                <!-- Start Educational Details -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Educational Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Institute Name</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Qualification<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Year<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Institute Name</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Qualification<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Year<span class="text-danger ms-1">*</span></label>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="input-group w-auto input-group-flat">
                                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                            <span class="input-group-text">
                                                                <i class="ti ti-calendar"></i>
                                                            </span>
                                                        </div>
                                                        <a href="javascript:void(0);" class="btn btn-icon btn-soft-danger border-0 flex-shrink-0 rounded-circle d-linline-flex align-items-center gap-1"> <i class="ti ti-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="text-primary d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                                    </div>
                                </div>
                                <!-- Start Educational Details -->

                                <!-- Start Experience Details -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Experience</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Hospital Name</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">No of Years<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Year<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="text-primary d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                                    </div>
                                </div>
                                <!-- Start Experience Details -->

                                <!-- Start Social Media Details -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Social Media</h5>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Facebook</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Twitter</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Linkedin</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Instagram</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Experience Details -->

                                <!-- Start Membership Details -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Membership</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Year</label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="text-primary d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                                    </div>
                                </div>
                                <!-- Start Membership Details -->

                                <!-- Start Awards Details -->
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <h5 class="mb-0">Awards</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Year</label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="text-primary d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                                    </div>
                                </div>
                                <!-- Start Membership Details -->

                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2 mt-3">
                                    <button type="button" class="btn btn-white back-btn">Back</button>
                                    <a href="javascript:void(0);" class="btn btn-primary" >Save & Confirm</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- row end -->

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