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
                    <h4 class="mb-1">Kanban</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>    
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Applications</a></li>                        
                            <li class="breadcrumb-item active">Kanban</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                </div>
            </div>
            <!-- End Page Header -->            

            <div class="d-flex gap-3 align-items-start overflow-auto project-status" data-plugin="dragula" data-containers='["drag-one", "drag-two", "drag-three", "drag-four"]'>

                <div class="card flex-fill flex-shrink-0 mb-0">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 d-flex align-items-center">To Do<span class="badge ms-2 bg-danger rounded-circle count-circle">2</span></h5>
                        <a href="#" class="btn btn-icon btn-light"><i class="ti ti-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="kanban-drag" id="drag-one">

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success">Low</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Settings Page</h6>
                                    <p class="mb-3">Implement the settings page to manage <br> user preferences</p>
                                    <span class="d-block mb-1">Progress : 0%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar rounded" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-10.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-08.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-07.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-02.jpg" alt="user">
                                            </span>
                                            <a href="#" class="avatar avatar-rounded bg-dark fs-12 text-white">5+</a>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>0</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>0</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-warning">Medium</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Applications Page</h6>
                                    <p class="mb-3">Implement the Applications pages to <br> manage tools for seamless productivity.</p>
                                    <span class="d-block mb-1">Progress : 0%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar rounded" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-13.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-14.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-15.jpg" alt="user">
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>0</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>0</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        
                        </div>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add-task">
                                <i class="ti ti-square-rounded-plus me-2"></i> New Task
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card flex-fill flex-shrink-0 mb-0">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 d-flex align-items-center">In Progress<span class="badge ms-2 bg-danger rounded-circle count-circle">3</span></h5>
                        <a href="#" class="btn btn-icon btn-light"><i class="ti ti-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="kanban-drag" id="drag-two">

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-warning">Medium</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Error Pages</h6>
                                    <p class="mb-3">Design and integrate custom error pages <br> for user experience during issues.</p>
                                    <span class="d-block mb-1">Progress : 40%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar bg-indigo rounded" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-10.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-08.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-07.jpg" alt="user">
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>08</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>03</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success">Low</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">UI Pages</h6>
                                    <p class="mb-3">Develop and refine UI pages to ensure a <br> user-friendly and intuitive interface</p>
                                    <span class="d-block mb-1">Progress : 70%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar rounded bg-orange" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-20.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-21.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-22.jpg" alt="user">
                                            </span>
                                            <a href="#" class="avatar avatar-rounded bg-dark fs-12 text-white">4+</a>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>10</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>06</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-danger">High</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Customizer</h6>
                                    <p class="mb-3">Build a customizer panel to allow users to <br> personalize layout, theme, and UI settings </p>
                                    <span class="d-block mb-1">Progress : 50%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar rounded bg-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-23.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-24.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-25.jpg" alt="user">
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>12</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>04</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        
                        </div>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add-task">
                                <i class="ti ti-square-rounded-plus me-2"></i> New Task
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card flex-fill flex-shrink-0 mb-0">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 d-flex align-items-center">Completed<span class="badge ms-2 bg-danger rounded-circle count-circle">2</span></h5>
                        <a href="#" class="btn btn-icon btn-light"><i class="ti ti-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="kanban-drag" id="drag-three">

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success">Low</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Dashboard</h6>
                                    <p class="mb-3">Create an interactive dashboard to display <br> key metrics and system summaries</p>
                                    <span class="d-block mb-1">Progress : 100%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar bg-success rounded" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-10.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-08.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-07.jpg" alt="user">
                                            </span>
                                            <a href="#" class="avatar avatar-rounded bg-dark fs-12 text-white">5+</a>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>15</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>12</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                            <div class="card kanban-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-warning">Medium</span>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="mb-2">Authentication Pages</h6>
                                    <p class="mb-3">Develop authentication pages including <br> login, registration & password management</p>
                                    <span class="d-block mb-1">Progress : 100%</span>
                                    <div class="progress progress-sm flex-grow-1 mb-3">
                                        <div class="progress-bar rounded bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="avatar-list-stacked avatar-group-sm me-3">
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-25.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-26.jpg" alt="user">
                                            </span>
                                            <span class="avatar avatar-rounded">
                                                <img src="assets/img/avatars/avatar-27.jpg" alt="user">
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center me-2"><i class="ti ti-message me-1"></i>10</a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center"><i class="ti ti-paperclip me-1"></i>06</a>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        
                        </div>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add-task">
                                <i class="ti ti-square-rounded-plus me-2"></i> New Task
                            </a>
                        </div>
                    </div>
                </div>                  
                
            </div>

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