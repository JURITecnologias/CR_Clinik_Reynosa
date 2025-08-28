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
                    <h4 class="mb-1">Terms & Conditions</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Terms & Conditions</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <p>Welcome to Dreams EMR platform. This platform is designed to help healthcare providers efficiently manage patient information, streamline workflows, and ensure secure access to medical records.</p>
                    <h6 class="mb-3">Acceptance of Terms</h6>
                    <p class="mb-3">By accessing or using our Dreams EMR, you agree to be bound by these Terms & Conditions. If you do not agree, please do not use the Platform.</p>
                    <h6 class="mb-3">Eligibility</h6>
                    <p class="mb-3">The Platform is intended for use by licensed healthcare professionals, authorized staff, and institutions. You affirm that you have the authority to enter into this agreement on behalf of your organization.</p>
                    <h6 class="mb-3">User Responsibilities</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">Maintain the confidentiality of login credentials.</li>
                        <li class="mb-2">Ensure all information entered into the Platform is accurate and up to date.</li>
                        <li class="mb-2">Use the Platform solely for lawful and authorized medical purposes.</li>
                        <li>Immediately report any unauthorized use of your account.</li>
                    </ul>
                    <h6 class="mb-3">Data Privacy & Security</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">We comply with applicable healthcare data protection laws (e.g., HIPAA, GDPR where applicable).</li>
                        <li class="mb-2">Patient data is encrypted and stored securely.</li>
                        <li>You are responsible for complying with your local and national privacy laws when accessing or entering patient information.</li>
                    </ul>
                    <h6 class="mb-3">Access & Usage Rights</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">You are granted a non-transferable, non-exclusive right to use the Platform.</li>
                        <li>You may not modify, reverse engineer, or redistribute any part of the Platform without prior written consent.</li>
                    </ul>
                    <h6 class="mb-3">Data Ownership</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">All patient records and data entered into the Platform remain the property of the healthcare provider or institution.</li>
                        <li>We do not claim ownership over the medical data but may access it to provide support, maintenance, or when legally required.</li>
                    </ul>
                    <h6 class="mb-3">System Availability</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">While we aim for high uptime, we do not guarantee uninterrupted access.</li>
                        <li>Scheduled maintenance or unforeseen issues may temporarily affect availability.</li>
                    </ul>
                    <h6 class="mb-3">Limitations of Liability</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">We are not liable for medical decisions made based on data in the Platform.</li>
                        <li>Our total liability for any claim shall not exceed the amount paid by the user for Platform access in the past 12 months.</li>
                    </ul>
                    <h6 class="mb-3">Termination</h6>
                    <ul class="mb-3 ps-3">
                        <li class="mb-2">We reserve the right to suspend or terminate access if these Terms are violated.</li>
                        <li>You may terminate usage by notifying us and ceasing all use of the Platform.</li>
                    </ul>
                    <h6 class="mb-3">Modifications</h6>
                    <p class="mb-0">We may revise these Terms at any time. Continued use of the Platform after changes are posted indicates acceptance of the revised Terms.</p>
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