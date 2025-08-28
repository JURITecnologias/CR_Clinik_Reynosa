<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

        <!-- Start Content -->
		<div class="container-fuild position-relative z-1">
			<div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100 lock-screen-cover">

				<!-- start row -->
				<div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
					<div class="col-lg-4 mx-auto">
						<form action="index.php" class="d-flex justify-content-center align-items-center">
							<div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
								<div class="card border-1 p-lg-3 shadow-md rounded-3">
									<div class="card-body">
                                        <div class="mb-4 text-center">
                                            <a href="index.php">
                                                <img src="assets/img/logo-dark.svg" class="img-fluid logo m-atuo" alt="Logo">
                                            </a>
                                        </div>
										<div class="text-center mb-3">
											<h5 class="mb-1 fs-20 fw-bold">Welcome Back!</h5>
										</div>
                                        <div class="text-center mb-3">
                                            <span class="avatar avatar-xxxl rounded-circle flex-shrink-0">
                                                <img src="assets/img/avatars/avatar-31.jpg" class="rounded-circle" alt="img">
                                            </span>
                                        </div>

										<div class="mb-3">
											<div class="input-group input-group-flat pass-group">
                                                <input type="password" class="form-control pass-input">
                                                <span class="input-group-text toggle-password ">
                                                    <i class="ti ti-eye-off"></i>
                                                </span>
                                            </div>
										</div>

										<div>
											<button type="submit" class="btn bg-primary text-white w-100">Login</button>
										</div>
                                        
									</div><!-- end card body -->
								</div><!-- end card -->
							</div>
						</form>
					</div><!-- end col -->
				</div>
				<!-- end row -->

			</div>
		</div>
		<!-- End Content -->
    
    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>