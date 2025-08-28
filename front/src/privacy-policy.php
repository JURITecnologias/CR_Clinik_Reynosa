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
                    <h4 class="mb-1">Privacy Policy</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Privacy Policy</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <p>At Dreams EMR, we value your privacy and are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, share, and safeguard your data when you access</p>
                    <h6 class="mb-3">Information We Collect</h6>
                    <p class="mb-2">We may collect the following types of personal information:</p>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2"><strong class="text-dark">Personal Identifiable Information :</strong> Full name, Date of birth, Contact details (email address, phone number), Date of birth,  Gender.</li>
                        <li class="mb-2"><strong class="text-dark">Health and Wellness Information :</strong> Medical conditions (past and current), Allergies and medications, Diagnostic results (lab tests, imaging reports), Treatment records and progress notes. </li>
                        <li><strong class="text-dark">Optional Information :</strong>Emergency contact details, Consent forms or communication preferences. </li>
                    </ul>
                    <h6 class="mb-3">How We Use Your Information</h6>
                    <p class="mb-2">We may use the information we collect to:</p>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">Register and manage your patient profile.</li>
                        <li class="mb-2">Schedule and coordinate appointments.</li>
                        <li class="mb-2">Communicate with you and your healthcare providers.</li>
                        <li class="mb-2"> Track and review medical history for accurate diagnosis.</li>
                        <li>Identify potential allergies, interactions, or risks</li>
                    </ul>
                    <h6 class="mb-3">Sharing Your Information</h6>
                    <p class="mb-2">We will not sell or share your personal information with third parties except:</p>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">Doctors, nurses, specialists, and other licensed professionals directly involved in your care.</li>
                        <li>For consultation, diagnosis, treatment planning, and care coordination.</li>
                    </ul>
                    <h6 class="mb-3">Data Security</h6>
                    <p class="mb-3">We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, alteration, or disclosure. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>
                    <h6 class="mb-3">Data Retention</h6>
                    <p class="mb-3">We will retain your personal information for as long as necessary to fulfill the purposes outlined in this policy, or as required by law.</p>
                    <h6 class="mb-3">Your Rights</h6>
                    <p class="mb-2">You may have the following rights concerning your personal data:</p>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">Right to Access Your Medical Records.</li>
                        <li class="mb-2">Ask for your information not to be shared with certain people</li>
                        <li class="mb-2">The health care provider or insurance company.</li>
                        <li>Communication to be reached at a specific place</li>
                    </ul>
                    <h6 class="mb-3">Changes to This Policy</h6>
                    <p class="mb-0">We may update this policy from time to time. The latest version will always be available on the platform. Continued use of the Dreams EMR platform signifies your acceptance of any updates.</p>
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