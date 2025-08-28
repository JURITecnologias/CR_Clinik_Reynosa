<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

        <!-- Start Content -->
		<div class="container-fuild position-relative z-1">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100 bg-white lock-screen-cover">

                <!-- start row-->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center overflow-auto flex-wrap vh-100">
                            <div class="col-md-8 mx-auto">
                                <div class="d-flex flex-column justify-content-lg-center p-3 flex-fill">
                                        <div class="card border-1 p-lg-3 shadow-md rounded-3 m-0">
                                            <div class="card-body">
                                                <div class="mb-4">
                                                    <a href="index.php">
                                                        <img src="assets/img/logo-dark.svg" class="img-fluid logo m-atuo" alt="Logo">
                                                    </a>
                                                </div>
                                                <div class="mb-3">
                                                    <h5 class="mb-1 fw-bold">Change Password</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group input-group-flat pass-group">
                                                        <input type="password" class="form-control pass-input">
                                                        <span class="input-group-text toggle-password ">
                                                            <i class="ti ti-eye-off"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group input-group-flat pass-group">
                                                        <input type="password" class="form-control pass-input">
                                                        <span class="input-group-text toggle-password ">
                                                            <i class="ti ti-eye-off"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <a href="login.php" class="btn bg-primary text-white w-100">Change Password</a>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                            </div> <!-- end row-->
                        </div>
                        
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="login-backgrounds login-covers bg-primary d-lg-flex align-items-center justify-content-center d-none flex-wrap position-relative h-100 z-0">
                            <div class="authentication-card">
								<div class="authen-overlay-item w-100">
                                    <div class="authen-head text-center">
                                        <h1 class="text-white fs-28 fw-bold mb-2">Your Wellness Journey Starts Here</h1>
                                        <p class="text-light fw-normal text-light mb-0">Our Medical Website Admin Template offers an intuitive interface for efficient administration and organization of medical data</p>
                                    </div>
								</div>
                                <div class="auth-person">
                                    <img src="assets/img/auth/auth-img-06.png" alt="doctor" class="img-fluid">
                                </div>
							</div>
                            <img src="assets/img/auth/auth-img-01.png" alt="shadow" class="position-absolute top-0 start-0">
                            <img src="assets/img/auth/auth-img-02.png" alt="bubble" class="img-fluid position-absolute top-0 end-0">
                            <img src="assets/img/auth/auth-img-03.png" alt="shadow" class="img-fluid position-absolute auth-img-01">
                            <img src="assets/img/auth/auth-img-04.png" alt="bubble" class="img-fluid position-absolute auth-img-02">
                            <img src="assets/img/auth/auth-img-05.png" alt="bubble" class="img-fluid position-absolute bottom-0">
                        </div>
                    </div> <!-- end row-->
                    
                </div>
                <!-- end row-->

            </div>
		</div>
		<!-- End Content -->
    
    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>