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
                        <div class="col-lg-3 col-md-4">
                            <div class="p-4 pb-0 pb-sm-4 mail-sidebar" data-simplebar>
                                <div>
                                    <div class="mb-3">
                                    <a href="email-compose.php" class="btn btn-primary w-100"><i class="ti ti-square-rounded-plus me-1"></i>Compose New</a>
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
                        <div class="col-lg-9 col-md-8">
                            <!-- card start -->
                            <div class="card border-0 rounded-0 custom-left-border mb-0">

                                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between px-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="select-all">
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Archive"><i class="ti ti-archive"></i></a>
                                            <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></a>
                                            <a href="#" class="btn btn-icon btn-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Report Spam"><i class="ti ti-message-report"></i></a>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                                <ul class="dropdown-menu p-2">
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Recent</a>
                                                    </li>                                       
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Unread</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Mark All Read</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Spam</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Delete All</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group w-auto input-group-flat">
                                        <input type="text" class="form-control form-control-sm" placeholder="Search Keyword">
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="mail-messages" data-simplebar>
                                        <!-- table start -->
                                        <div class="table-responsive table-nowrap custom-border">
                                            <table class="table border-0 w-100">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-29.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Sarah, me (7)</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 mb-1"><a href="email-details.php">[Reminder] Client Meeting at 3 PM Today</a></h6>
                                                                <p class="mb-0">Hi John, just a quick reminder about our meeting with ABC Corp at 3 PM...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">4:15 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-28.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Mike, team (5)</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 mb-1"><a href="email-details.php">Submit Project Proposal</a></h6>
                                                                <p class="mb-0">Hi Team, please ensure that your sections of the project proposal are sub...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">5:00 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-33.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Anna</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 d-flex fw-normal align-items-center mb-1"><a href="email-details.php">Team Outing Next Friday</a><span class="badge bg-info ms-2">Markting</span></h6>
                                                                <p class="mb-0">Hello Everyone, we’re planning a team outing next Friday. Please RSVP by...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">1:00 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-30.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Tom</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 d-flex align-items-center mb-1"><a href="email-details.php">[Update] New Design Guidelines Available</a><span class="badge bg-warning ms-2">Client</span></h6>
                                                                <p class="mb-0">Hi all, the new design guidelines have been finalized and are now available...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">3:30 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-43.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Lisa</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 fw-normal mb-1"><a href="email-details.php">[Event] Webinar on Social Media Strategy</a></h6>
                                                                <p class="mb-0">Don’t forget to register for our webinar covering advanced social media stra...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">2:45 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-31.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Jason, me (9)</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 mb-1"><a href="email-details.php">[Reminder] Sales Targets Review</a></h6>
                                                                <p class="mb-0">Hey Team, please prepare your sales reports for the review meeting schedul...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">10:00 AM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-48.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Emily</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 fw-normal d-flex align-items-center mb-1"><a href="email-details.php">[Alert] System Maintenance Scheduled</a><span class="badge bg-success ms-2">Personal</span></h6>
                                                                <p class="mb-0">Dear Team, please be aware that there will be system maintenance this Satu...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">12:00 AM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-34.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Kevin</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 mb-1"><a href="email-details.php">Expense Reports Due</a></h6>
                                                                <p class="mb-0">Hi everyone, please submit all expense reports for Q3 by the end of this week...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">5:30 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-50.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Rachel</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 fw-normal mb-1"><a href="email-details.php">Beta Testing</a></h6>
                                                                <p class="mb-0">Hi Team, your feedback on the latest beta release is crucial. Please complete...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">4:00 PM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-35.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">David</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 fw-normal mb-1"><a href="email-details.php">[Reminder] Contract Renewals</a></h6>
                                                                <p class="mb-0">Attention all, please ensure that all contract renewals are reviewed and...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">11:00 AM</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check form-check-md d-flex align-items-center justify-content-center">
                                                                    <input class="form-check-input mail-check-input" type="checkbox">
                                                                </div>
                                                                <span class="star d-flex align-items-center justify-content-center"><i class="ti ti-star fs-16"></i></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="email-details.php" class="avatar avatar-sm"><img src="assets/img/avatars/avatar-51.jpg" alt="user"></a>
                                                                <p class="fs-14 mb-0"><a href="email-details.php">Nina, me (9)</a></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <h6 class="fs-14 fw-normal mb-1"><a href="email-details.php">[Notice] Policy Changes</a></h6>
                                                                <p class="mb-0">Hello Team, we have implemented some policy changes effective immediately...</p>
                                                            </div>
                                                        </td>
                                                        <td><span class="fs-13 text-dark fw-medium">9:00 AM</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- table start -->
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