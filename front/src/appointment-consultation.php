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
                    <h4 class="mb-1">Consultation</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="appointments.php">Appointments</a></li>                              
                            <li class="breadcrumb-item active">Consultation</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- card start -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Basic Information</h5>
                </div>
                <div class="card-body">
                    <div class="row row-gap-3 align-items-center">
                        <div class="col-xl-6">
                            <div class="d-sm-flex align-items-center">
                                <a href="javascript:void(0);" class="avatar avatar-xxxl mb-3 mb-sm-0 me-sm-3 flex-shrink-0">
                                    <img src="assets/img/avatars/avatar-05.jpg" alt="patient" class="rounded">
                                </a>
                                <div>
                                    <span class="badge badge-soft-danger mb-1">Out Patient</span>
                                    <h6 class="mb-1"><a href="patient-details.php">James Carter</a></h6>
                                    <p class="mb-1">Patient / Consultation ID : OP1245654 / C243546566</p>
                                    <p class="mb-0">Known Allergies : <span class="text-dark fw-medium">Pain near left chest, Pelvic Salinity</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="p-3 bg-light rounded">
                                <div class="row row-gap-2">
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Age / Gender</h6>
                                        <p class="fs-13 mb-0 text-truncate">28 Years / Male</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Department</h6>
                                        <p class="fs-13 mb-0 text-truncate">Cardiology</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1">Date</h6>
                                        <p class="fs-13 mb-0 text-truncate">25 Jan 2024, 07:00</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1">Gender</h6>
                                        <p class="fs-13 mb-0">Male</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Blood Group</h6>
                                        <p class="fs-13 mb-0">O+ve</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Consultation Type</h6>
                                        <p class="fs-13 mb-0">Video</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card end -->

            <form action="appointments.php">

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Vitals</h5>
                    </div>
                    <div class="card-body">
                        <div class="vitals-info">
                            <div class="row gx-3">
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
                            </div>                            
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Complaint</h5>
                    </div>
                    <div class="card-body">
                        <div class="complaint-info">
                            <div class="row gx-3 align-items-center">
                                <div class="col-md-2">
                                    <div class="mb-md-3">
                                        <label class="form-label mb-md-0">Fever</label> 
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">                                        
                                        <input type="text" class="form-control" placeholder="Add Symptoms">
                                    </div>
                                </div>                               
                            </div>                            
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Diagnosis</h5>
                    </div>
                    <div class="card-body">
                        <div class="diagnosis-two-info">
                            <div class="row gx-3 align-items-center">
                                <div class="col-md-2">
                                    <div class="mb-md-3">
                                        <label class="form-label mb-md-0">Fever</label> 
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">   
                                        <select class="select">
                                            <option>Diagonosis Type</option>
                                            <option>Hectic</option>
                                            <option>Continuous Fever</option>
                                            <option>Relapsing</option>
                                        </select>                                     
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">                                        
                                        <input type="text" class="form-control" placeholder="Complaint History ( Enter Min 400 Words)">
                                    </div>
                                </div>                               
                            </div>                            
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Medications</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gx-3">
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
                        <div class="row gx-3">
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
                                <label class="form-label">Instructions<span class="text-danger ms-1">*</span></label>
                                <div class="d-flex align-items-center">
                                    <div class="mb-3 w-100">
                                        <input class="form-control">
                                    </div>
                                    <a href="javascript:void(0);" class="ms-2 mb-3 d-flex align-items-center rounded-circle btn-icon btn-xs fs-12 btn-soft-danger p-0 flex-shrink-0"><i class="ti ti-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1 "></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Investigations & Procedure</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">                                        
                            <input type="text" class="form-control">
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Advice</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">                                        
                            <input type="text" class="form-control">
                        </div>
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Follow Up</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gx-3 align-items-center">
                            <div class="col-md-6">
                                <div class="mb-md-3">
                                    <label class="form-label mb-md-0">Next Consultation</label> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">                                        
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-md-3">
                                    <label class="form-label mb-md-0">Whether to come on empty Stomach?</label> 
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="mb-3 w-100">                                        
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <a href="javascript:void(0);" class="ms-2 mb-3 d-flex align-items-center rounded-circle btn-icon btn-xs fs-12 btn-soft-danger p-0"><i class="ti ti-trash"></i></a>
                            </div>                                                              
                        </div>   
                        <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                    </div>
                </div>
                <!-- card end -->

                <!-- card start -->
                <div class="card mb-0">
                    <div class="card-header">
                        <h5 class="mb-0">Invoice</h5>
                    </div>
                    <div class="card-body pb-1">
                        <div class="mb-3"> 
                            <label class="form-label">Service & Product</label>                                       
                            <input type="text" class="form-control">
                        </div> 
                        <div class="d-flex align-items-center">
                            <div class="mb-3 w-100">                                       
                                <input type="text" class="form-control">
                            </div>
                            <a href="javascript:void(0);" class="ms-2 mb-3 d-flex align-items-center rounded-circle btn-icon btn-xs fs-12 btn-soft-danger p-0"><i class="ti ti-trash"></i></a>
                        </div> 
                        <div class="border-bottom pb-3 mb-3">
                            <a href="javascript:void(0);" class="link-primary fw-medium"><i class="ti ti-plus me-1"></i>Add New</a>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-sm-5">
                                <p class="text-dark mb-2 fw-semibold">Amount :<span class="fw-normal float-end">$0.00</span></p>
                                <p class="text-dark mb-2 fw-semibold">Tax (0%) :<span class="fw-normal float-end">$0.00</span></p>
                                <p class="text-dark mb-2 fw-semibold pb-2 border-bottom">Discount (0%) :<span class="fw-normal float-end">$0.00</span></p>
                                <h6 class="mb-3">Total :<span class="float-end">$0.00</span></h6>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">    
                                    <label class="form-label">Payment Mode</label>         
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">    
                                    <label class="form-label">Amount</label>                           
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->

                <div class="d-flex align-items-center gap-2 mt-4 justify-content-end">
                    <button type="button" class="btn btn-white">Cancel</button>
                    <button type="submit" class="btn btn-primary">Complete</button>
                </div>

            </form>

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