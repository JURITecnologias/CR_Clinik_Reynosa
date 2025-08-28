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
                    <h4 class="mb-1">Patients</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Add Patient</li>
                        </ol>
                    </div>
                </div>
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Patients</a>
            </div>
            <!-- End Page Header -->
            
            <!-- row start -->
            <div class="row vertical-tab">
                <div class="col-xl-3 col-lg-4">
                    <div class="nav flex-column nav-pills vertical-tab mb-lg-0 mb-4">
                        <button class="nav-link active fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-info-circle fs-16 me-2"></i>Basic Information</button>
                        <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-vector-spline fs-16 me-2"></i>Vitals</button>
                        <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-files fs-16 me-2"></i>Medical HIstory</button>
                        <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-vaccine fs-16 me-2"></i>Complaints</button>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="patient-form-wizard flex-fill">

                        <!-- basic information -->
                        <div class="form-wizard-content active">
                            <form action="add-patient.php">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Basic Information</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="mb-3">
                                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="position-relative d-flex align-items-center border rounded">
                                                        <img src="assets/img/avatars/avatar-39.jpg" class="avatar avatar-xxl" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex flex-column align-items-start">
                                                    <div class="d-inline-flex align-items-start gap-2 flex-wrap">
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
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ID</label>
                                                    <input type="text" class="form-control" value="#PT0005" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Middle Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Blood Group<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>O+</option>
                                                        <option>O-</option>
                                                        <option>A+</option>
                                                        <option>A-</option>
                                                        <option>B+</option>                                                           
                                                        <option>B-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Age<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
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
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Type<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Out Patient</option>
                                                        <option>In Patient</option>
                                                    </select>
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
                                                    <label class="form-label">Company Name with Location</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> 
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Martial Status<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Married</option>
                                                        <option>Unmarried</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Contact Information</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile Number<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" name="phone" type="tel">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Emergency Number<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" name="phone" type="text">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Guardian / Person Name<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address Line 1<span class="text-danger ms-1">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Country<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>United States</option>
                                                        <option>India</option>
                                                        <option>Canada</option>
                                                        <option>Germany</option>
                                                        <option>Brazil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Los Angeles</option>
                                                        <option>San Francisco</option>
                                                        <option>San Jose</option>
                                                        <option>Fresno</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">State</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>California</option>
                                                        <option>Texas</option>
                                                        <option>New York</option>
                                                        <option>Florida</option>
                                                        <option>Illinois</option>
                                                    </select>
                                                </div>
                                            </div>                                               
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pin Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Referral Doctor’s Info</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Referred By<span class="text-danger ms-1">*</span></label>
                                                    <select class="select2" data-toggle="select2">
                                                        <option>Select</option>
                                                        <option>Dr. Andrew Clark</option>
                                                        <option>Dr. Katherine Brooks</option>
                                                        <option>Dr. Benjamin Harris</option>
                                                        <option>Dr. Laura Mitchell</option>
                                                        <option>Dr. Christopher Lewis</option>
                                                        <option>Dr. Natalie Foster</option>
                                                        <option>Dr. Jonathan Adams</option>
                                                        <option>Dr. Rebecca Scott</option>
                                                        <option>Dr. Samuel Turner</option>
                                                        <option>Dr. Victoria Evans</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Referred On<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Department<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Anaesthesiology</option>
                                                        <option>Dental Surgery</option>
                                                        <option>Dermatology</option>
                                                        <option>ENT Surgery</option>
                                                        <option>General Medicine</option>
                                                        <option>Ophthalmology</option>
                                                        <option>Orthopaedics</option>
                                                        <option>Pediatrics </option>
                                                        <option>Radiology</option>
                                                        <option>Cardiology</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Other Information</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Notes if any</label>
                                                    <textarea rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-primary next-tab-btn" id="save-basic-info">Save & Add Vitals</button>
                                </div>
                            </form>

                        </div>

                        <!-- vituals -->
                        <div class="form-wizard-content">
                            <form action="add-patient.php">
                                <div class="card pb-0">
                                    <div class="card-header">
                                        <h5 class="mb-0">Vitals</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Temperature <span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">F</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pulse<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">mmHg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Respiratory Rate<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">rpm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">SPO2<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Height<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Weight<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">Kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">BMI<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">kg/cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Waist<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">BSA<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-text">M</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-0">
                                                    <label class="form-label">Quick Notes</label>
                                                    <textarea rows="4" class="form-control" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-white back-btn">Back</button>
                                    <button type="button" class="btn btn-primary next-tab-btn" id="save-vitals">Save & Add Medical Histroy</button>
                                </div>
                            </form>
                        </div>

                        <!-- medical history -->
                        <div class="form-wizard-content">
                            <form action="add-patient.php">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Medical History</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- start row -->
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Type</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Allergy</option>
                                                        <option>Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Reason</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Illness</label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Hospital Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Assessment done if any</label>
                                                    <textarea rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div>
                                                    <label class="form-label">Notes</label>
                                                    <textarea rows="4" class="form-control" placeholder="Add Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="mt-4 pt-4 border-top"></div>
                                        
                                        <!-- start row -->
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Type</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Allergy</option>
                                                        <option>Fever</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Reason</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date of Illness</label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Hospital Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Assessment done if any</label>
                                                    <textarea rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div>
                                                    <label class="form-label">Notes</label>
                                                    <textarea rows="4" class="form-control" placeholder="Add Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="mt-4 pt-4 border-top">
                                            <a href="javascript:void(0);" class="text-orange d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i>  Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-white back-btn">Back</button>
                                    <button type="button" class="btn btn-primary next-tab-btn" id="save-medical-history">Save & Add Complaints</button>
                                </div>
                            </form>
                        </div>

                        <!-- complaints -->
                        <div class="form-wizard-content">
                            <form>
                                <div class="card pb-0">
                                    <div class="card-header">
                                        <h5 class="mb-0">Complaints</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Patients Overall Health Condition</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Very Poor</option>
                                                        <option>Poor</option>
                                                        <option>Fair</option>
                                                        <option>Good</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <div class="form-check mb-2">
                                                        <input type="checkbox" class="form-check-input" id="customCheck4" checked>
                                                        <label class="form-check-label form-label mb-0" for="customCheck4">Does patient have any health Condition</label>
                                                    </div>
                                                    <input class="form-control" value="Fever, Cough, Headache">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-check mb-2">
                                                        <input type="checkbox" class="form-check-input" id="customCheck8" checked>
                                                        <label class="form-check-label form-label mb-0" for="customCheck8">Allergies if any Before</label>
                                                    </div>
                                                    <input class="form-control" value="Sore Throat">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                    <button type="button" class="btn btn-white back-btn">Back</button>
                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">Save & Confirm</a>
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