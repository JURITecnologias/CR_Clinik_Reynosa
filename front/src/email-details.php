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
                    <h4 class="mb-1">Email</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>    
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Applications</a></li>                        
                            <li class="breadcrumb-item"><a href="email.php">Email</a></li>                        
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                </div>
            </div>
            <!-- End Page Header -->            

            <div class="card shadow-none mb-0">
                <div class="card-body p-0">

                    <div class="row g-0">
                        <div class="col-lg-3">
                            <div class="p-4 pb-0 pb-lg-4 mail-sidebar" data-simplebar>
                                <div>
                                    <div class="mb-3">
                                        <a href="email-compose.php" class="btn btn-primary btn-lg w-100"><i class="ti ti-square-rounded-plus me-1"></i>Compose New</a>
                                    </div>
                                    <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">
                            
                                        <!-- item -->
                                        <div class="accordion-item mb-3 pb-3">
                                            <h2 class="accordion-header mb-0">
                                                <button class="accordion-button fw-semibold p-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Mail
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                                <div class="nav flex-column mt-2">
                                                    <a href="email.php" class="d-flex text-start align-items-center fw-medium fs-14 bg-light rounded p-2 mb-1"><i class="ti ti-inbox me-2"></i>Inbox<span class="avatar avatar-xs ms-auto bg-danger rounded-circle">6</span></a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-star me-2"></i>Starred</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-clock-hour-7 me-2"></i>Snoozed</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-send me-2"></i>Sent</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-file-power me-2"></i>Drafts</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-badge me-2"></i>Important</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-brand-hipchat me-2"></i>Chats</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2"><i class="ti ti-clock-record me-2"></i>Scheduled</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- item -->
                                        <div class="accordion-item mb-3 pb-3">
                                            <h2 class="accordion-header mb-0">
                                                <button class="accordion-button fw-semibold p-0 bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo">
                                                    Others
                                                </button>
                                            </h2>
                                            <div id="flush-collapsetwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="nav flex-column mt-2">
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-messages me-2"></i>All Emails</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-box-seam me-2"></i>Spam</a>
                                                    <a href="#" class="d-flex text-start align-items-center fw-medium fs-14 rounded p-2 mb-1"><i class="ti ti-trash me-2"></i>Trash</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- item -->
                                        <div class="accordion-item border-0">
                                            <h2 class="accordion-header mb-0">
                                                <button class="accordion-button fw-semibold p-0 bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Labels
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="d-flex flex-column mt-3">
                                                    <a href="javascript:void(0);" class="d-flex align-items-center fw-medium mb-2"><i class="ti ti-point-filled text-success me-1 fs-18"></i>Personal</a>
                                                    <a href="javascript:void(0);" class="d-flex align-items-center fw-medium mb-2"><i class="ti ti-point-filled text-warning me-1 fs-18"></i>Client</a>
                                                    <a href="javascript:void(0);" class="d-flex align-items-center fw-medium mb-2"><i class="ti ti-point-filled text-info me-1 fs-18"></i>Marketing</a>
                                                    <a href="javascript:void(0);" class="d-flex align-items-center fw-medium"><i class="ti ti-point-filled text-danger me-1 fs-18"></i>Office</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div><!-- end card body -->
                            </div><!-- end card -->  
                        </div>
                        <div class="col-lg-9">
                            <!-- card start -->
                            <div class="card border-0 rounded-0 custom-left-border mb-0">

                                <div class="card-body p-0">
                                    <div class="mail-message-view p-4" data-simplebar>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap flex-xl-nowrap row-gap-2 mb-3">
                                            <h6 class="mb-0">Subject : Modernize Your Practice with Our All-in-One EMR Solution</h6>
                                            <p class="mb-0"><i class="ti ti-calendar me-1"></i>11 July 2025, 3:45 PM</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom flex-wrap flex-md-nowrap row-gap-2 pb-3">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <span class="avatar me-2 flex-shrink-0"><img src="assets/img/avatars/avatar-28.jpg" alt="user"></span>
                                                <div>
                                                    <h6 class="fs-14 mb-1">Mark Smith</h6>
                                                    <p class="mb-0">From : adrian@example.com</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Starred"><i class="ti ti-star"></i></a>
                                                <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Archive"><i class="ti ti-archive"></i></a>
                                                <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></a>
                                                <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Report Spam"><i class="ti ti-message-report"></i></a>
                                                <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reply"><i class="ti ti-arrow-back-up"></i></a>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-2">Hi Adrian,</p>
                                            <p class="mb-2">Managing patient records shouldn't be a hassle.</p>
                                            <p class="mb-2">Introducing EMR - a secure, cloud-based Electronic Medical Records platform designed to simplify your workflow, reduce paperwork, and deliver better patient outcomes.</p>
                                            <p class="mb-2">Why Choose EMR?</p>
                                            <ol class="ps-3">
                                                <li class="mb-1">Quick Patient Charting - Access and update records in just a few clicks</li>
                                                <li class="mb-1">Appointment Scheduling - Built-in calendar to manage patient flow efficiently</li>
                                                <li class="mb-1">e-Prescriptions - Send prescriptions directly to pharmacies</li>
                                                <li class="mb-1">Lab Integration - Seamlessly receive and store lab reports</li>
                                                <li class="mb-1">Secure & Compliant - HIPAA-compliant and fully encrypted</li>
                                            </ol>
                                            <p class="mb-2">Whether you're running a solo practice or a multi-specialty clinic, Dreams EMR helps you focus more on patient care and less on admin tasks.</p>
                                            <h6 class="fs-14 fw-medium mb-0">Get Started with a 14-Day Free Trial – No credit card needed!</h6>
                                        </div>
                                        <div>
                                            <p class="mb-1">Thanks & Regards</p>
                                            <h6 class="fs-14 fw-semibold mb-0">Steven Smith</h6>
                                        </div>
                                        <div class="border-top mt-3 pt-3 mb-3">
                                            <h6 class="mb-3">Attachments</h6>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="card flex-shrink-0 mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="card-img mb-3">
                                                            <img src="assets/img/social/attachment-01.jpg" class="rounded" alt="attachemnt">
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h6 class="mb-1 fs-14">Mobile_design.jpg</h6>
                                                                <span class="fs-13">3.2MB</span>
                                                            </div>
                                                            <a href="#" class="fs-16"><i class="ti ti-download"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card flex-shrink-0 mb-0">
                                                    <div class="card-body p-3">
                                                        <div class="card-img mb-3">
                                                            <img src="assets/img/social/attachment-02.jpg" class="rounded" alt="attachemnt">
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h6 class="mb-1 fs-14">intro.jpg</h6>
                                                                <span class="fs-13">3.2MB</span>
                                                            </div>
                                                            <a href="#" class="fs-16"><i class="ti ti-download"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end flex-wrap gap-2">
                                            <button class="btn btn-dark" type="button"><i class="ti ti-arrow-back-up me-1"></i>Reply</button>
                                            <button class="btn btn-primary" type="button">Forward<i class="ti ti-arrow-forward-up ms-1"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->

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