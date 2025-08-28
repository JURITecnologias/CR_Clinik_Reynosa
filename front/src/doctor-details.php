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
                    <h4 class="mb-1">Doctor Details</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Doctor Details</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="doctors.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Back to Doctors</a>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row start -->
            <div class="row">
                <!-- col start -->
                <div class="col-xl-4">
                    <div class="card shadow mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-3 mb-3 border-bottom gap-3">
                                <a href="javascript:void(0);" class="avatar avatar-xxl">
                                    <img src="assets/img/doctors/doctor-01.jpg" alt="doctor" class="rounded">
                                </a>
                                <div>
                                    <span class="badge badge-md badge-soft-primary">#DR0025</span>
                                    <h5 class="mb-1 fw-semibold mt-2"><a href="javascript:void(0);">Dr. Andrew Clark</a></h5>
                                    <p class="fs-13 mb-0">Cardiology, MD, FRCS</p>
                                </div>
                            </div>
                            <h6 class="mb-3">Basic Information</h6>
                            <p class="mb-3">Specialist <span class="float-end text-dark">Interventional Cardiology</span></p>
                            <p class="mb-3">Member Since <span class="float-end text-dark">24 May 2024</span></p>
                            <p class="mb-3">DOB <span class="float-end text-dark">10 Jan 1991</span></p>
                            <p class="mb-3">Gender <span class="float-end text-dark">Male</span></p>
                            <p class="mb-3">Experience <span class="float-end text-dark">+16 years</span></p>
                            <p class="mb-3">Phone Number <span class="float-end text-dark">+1 75964 25493</span></p>
                            <p class="mb-3">Email <span class="float-end text-dark">andrew@example.com</span></p>
                            <p class="mb-3">Registered On <span class="float-end text-dark">24 May 1996</span></p>
                            <p class="mb-3">Registration Number <span class="float-end text-dark">DV457888AY4542</span></p>
                            <p class="mb-3">Total No of Appointments <span class="float-end text-dark">+300</span></p>
                            <h6 class="mt-3 mb-2 pt-3 border-top">Address Information</h6>
                            <p class="mb-0">8/15 Francis street, UK 454787</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->

                <!-- col start -->
                <div class="col-xl-8">
                    <div class="accordion accordion-bordered" id="BorderedaccordionExample">

                        <!-- Start About  -->
                        <div class="accordion-item bg-white mb-4">
                            <h2 class="accordion-header" id="about_view_header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#about_view" aria-expanded="true" aria-controls="about_view">
                                    About
                                </button>
                            </h2>
                            <div id="about_view" class="accordion-collapse collapse show" aria-labelledby="about_view_header" data-bs-parent="#BorderedaccordionExample">
                                <div class="accordion-body">
                                    <p class="mb-0">Highly motivated and experienced doctor with a passion for providing excellent care to patients. Experienced in a wide variety of medical settings, with particular expertise in diagnostics, primary care and emergency medicine. Skilled in using the latest technology to streamline patient care. Committed to delivering compassionate, personalized care to each and every patient.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End About  -->

                        <!-- Start Education  -->
                        <div class="accordion-item bg-white  mb-4">
                            <h2 class="accordion-header" id="education_view_header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#education_view" aria-expanded="false" aria-controls="education_view">
                                    Education
                                </button>
                            </h2>
                            <div id="education_view" class="accordion-collapse collapse" aria-labelledby="education_view_header" data-bs-parent="#BorderedaccordionExample">
                                <div class="accordion-body">
                                    <div class="d-flex align-items-center flex-wrap gap-2 p-3 rounded border justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar flex-shrink-0 bg-light text-dark">
                                                <i class="ti ti-book-2 fs-16"></i>
                                            </a>
                                            <div class="ms-2">
                                                <div>
                                                    <h6 class="fw-semibold fs-14 text-truncate mb-1">Oxford Medical Center</h6>
                                                    <p class="fs-13 mb-0">BAMS</p>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="badge bg-primary">2015 - 2020</span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap gap-2 p-3 rounded border justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar flex-shrink-0 bg-light text-dark">
                                                <i class="ti ti-book-2 fs-16"></i>
                                            </a>
                                            <div class="ms-2">
                                                <div>
                                                    <h6 class="fw-semibold fs-14 text-truncate mb-1">Duke University Medical Center</h6>
                                                    <p class="fs-13 mb-0">MD/MS</p>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="badge bg-primary">2021 - 2023</span>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap gap-2 p-3 rounded border justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="avatar flex-shrink-0 bg-light text-dark">
                                                <i class="ti ti-book-2 fs-16"></i>
                                            </a>
                                            <div class="ms-2">
                                                <div>
                                                    <h6 class="fw-semibold fs-14 text-truncate mb-1">City of Hope National Medical Center</h6>
                                                    <p class="fs-13 mb-0">Super - Specialization</p>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="badge bg-primary">2023 - Present</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Education  -->

                        <!-- Start Experience  -->
                        <div class="accordion-item bg-white  mb-4">
                            <h2 class="accordion-header" id="about_experience_header">
                                <button class="accordion-button fs-16 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#about_experience" aria-expanded="false" aria-controls="about_experience">
                                    Experience
                                </button>
                            </h2>
                            <div id="about_experience" class="accordion-collapse collapse" aria-labelledby="about_experience_header" data-bs-parent="#BorderedaccordionExample">
                                <div class="accordion-body">
                                    <div class="p-3 rounded border mb-3">
                                        <h6 class="fs-14 fw-semibold mb-1">Cambridge University Hospital, NHS Foundation Trust Cambridge</h6>
                                        <p class="fs-13 mb-2">Jan 2022 - Jan 2023</p>
                                        <p class="mb-0">Experienced in a wide variety of medical settings, with particular expertise in diagnostics, primary care and emergency medicine.</p>
                                    </div>
                                    <div class="p-3 rounded border">
                                        <h6 class="fs-14 fw-semibold mb-1">Hill Medical Hospital, Newcastle</h6>
                                        <p class="fs-13 mb-2">Jan 2021 - Jan 2022</p>
                                        <p class="mb-0">Experienced in a wide variety of medical settings, with particular expertise in diagnostics, primary care and emergency medicine.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Experience  -->

                        <!-- Start Membership  -->
                        <div class="accordion-item bg-white  mb-4">
                            <h2 class="accordion-header" id="member_view_header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#member_view" aria-expanded="false" aria-controls="member_view">
                                    Membership
                                </button>
                            </h2>
                            <div id="member_view" class="accordion-collapse collapse" aria-labelledby="member_view_header" data-bs-parent="#BorderedaccordionExample">
                                <div class="accordion-body">
                                    <div class="p-3 rounded border mb-3">
                                        <h6 class="fs-14 fw-semibold mb-1">Affilate Member</h6>
                                        <p class="fs-13 mb-2">Jan 2022</p>
                                        <p class="mb-0">Affiliate members include related allied health professionals- evidence based (Dietitians, Physiotherapist, Occupational therapist and Clinical Psychologist) who will team up with allopathic physicians to support the Lifestyle Medicine movement in India through ISLM.</p>
                                    </div>
                                    <div class="p-3 rounded border">
                                        <h6 class="fs-14 fw-semibold mb-1">Group Head</h6>
                                        <p class="fs-13 mb-2">Jan 2022</p>
                                        <p class="mb-0">Physician members include the allopathic doctors only</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Membership  -->

                        <!-- Start Awards  -->
                        <div class="accordion-item bg-white">
                            <h2 class="accordion-header" id="awards_view_header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#awards_view" aria-expanded="false" aria-controls="awards_view">
                                    Awards
                                </button>
                            </h2>
                            <div id="awards_view" class="accordion-collapse collapse" aria-labelledby="awards_view_header" data-bs-parent="#BorderedaccordionExample">
                                <div class="accordion-body">
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="p-3 rounded border">
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="javascript:void(0);" class="avatar flex-shrink-0 bg-light text-dark">
                                                        <i class="ti ti-award fs-16"></i>
                                                    </a>
                                                    <div class="ms-2">
                                                        <div>
                                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="javascript:void(0);">McLaughlin Medal</a></h6>
                                                            <p class="fs-13 mb-0">Dec 2022</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-truncate line-clamb-2">Important research of sustained excellence in any branch of medical sciences</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="p-3 rounded border">
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="javascript:void(0);" class="avatar flex-shrink-0 bg-light text-dark">
                                                        <i class="ti ti-award fs-16"></i>
                                                    </a>
                                                    <div class="ms-2">
                                                        <div>
                                                            <h6 class="fw-semibold fs-14 text-truncate mb-1"><a href="javascript:void(0);">Chanchlani Global Health</a></h6>
                                                            <p class="fs-13 mb-0">Mar 2023</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-truncate line-clamb-2">Vital world-class research to explore the causes of blindness and vision loss...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                        <!-- End Awards  -->
                    </div>
                </div>
                <!-- col end -->
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