<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
$user= include(__DIR__ . '/../src/user_session.php');
?>    
    
    <!-- Topbar Start -->
    <header class="navbar-header">
        <div class="page-container topbar-menu">
            <div class="d-flex align-items-center gap-2">
                <!-- Sidebar Mobile Button -->
                <a id="mobile_btn" class="mobile-btn" href="#sidebar">
                    <i class="ti ti-menu-deep fs-24"></i>
                </a>

                <!-- Logo -->
                <a href="index.php" class="logo">

                    <!-- Logo Normal -->
                    <span class="logo-light">
                        <span class="logo-lg"><img src="assets/img/cruz-roja-logo-small-ligth.png" alt="logo"></span>
                    </span>

                    <!-- Logo Dark -->
                    <span class="logo-dark">
                        <span class="logo-lg"><img src="assets/img/cruz-roja-logo-small.png" alt="dark logo"></span>
                    </span>
                
                    <!-- Logo Sm -->
                    <span class="logo-small">
                        <span class="logo-lg"><img src="assets/img/cruz-roja-logo-small-ligth.png" alt="small logo"></span>
                    </span>

                </a>

                <button class="sidenav-toggle-btn btn border-0 p-0 active" id="toggle_btn2"> 
                    <i class="ti ti-arrow-bar-to-right"></i>
                </button> 
                
                <!-- Search -->
                <div class="me-auto d-flex align-items-center header-search d-lg-flex d-none">
                    <!-- Search -->
                    <div class="input-icon position-relative me-2">
                        <input type="text" class="form-control" placeholder="Search Keyword">
                        <span class="input-icon-addon d-inline-flex p-0 header-search-icon"><i class="ti ti-command"></i></span>
                    </div>
                    <!-- /Search -->
                </div>
                
            </div>

            <div class="d-flex align-items-center">
            
                <!-- Search -->
                <div class="me-auto d-flex align-items-center header-search d-lg-none d-sm-flex d-none">
                    
                    <div class="input-icon position-relative me-2">
                        <input type="text" class="form-control" placeholder="Search Keyword">
                        <span class="input-icon-addon d-inline-flex p-0 header-search-icon"><i class="ti ti-command"></i></span>
                    </div>
                </div>
                <!-- /Search -->

                <!-- Minimize -->
                <div class="header-item">
                    <div class="dropdown me-2">
                        <a href="javascript:void(0);" class="btn topbar-link btnFullscreen" aria-label="minimize"><i class="ti ti-minimize"></i></a>
                    </div> 
                </div> 
                <!-- Minimize -->   
                    
                <!-- Language Dropdown -->
                <!-- <div class="header-item">
                    <div class="dropdown me-2">
                        <button class="topbar-link btn" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/img/flags/us.svg" alt="flags" height="16">
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-end p-2">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/us.svg" alt="flags" class="me-1" height="16"> <span class="align-middle">English</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/de.svg" alt="flags" class="me-1" height="16"> <span class="align-middle">German</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/fr.svg" alt="flags" class="me-1" height="16"> <span class="align-middle">French</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="assets/img/flags/ae.svg" alt="flags" class="me-1" height="16"> <span class="align-middle">Arabic</span>
                            </a>                            
                        </div>
                    </div>
                </div> -->
            
                <!-- Notification Dropdown -->
                <div class="header-item">
                    <div class="dropdown me-2">
                    
                        <button class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-bell-check fs-16 animate-ring"></i>
                            <span class="notification-badge"></span>
                        </button>
                        
                        <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        
                            <div class="p-2 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Notificaciones</h6>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Notification Body -->
                            <div class="notification-body position-relative z-2 rounded-0" data-simplebar>
                                
                                <!-- Item-->
                                <div class="dropdown-item notification-item py-3 text-wrap border-bottom" id="notification-1">
                                    <div class="d-flex">
                                        <div class="me-2 position-relative flex-shrink-0">
                                            <img src="assets/img/avatars/avatar-28.jpg" class="avatar-md rounded-circle" alt="paciente">
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium text-dark">John Doe</p>
                                            <p class="mb-1 text-wrap">
                                                agregó una nueva <span class="fw-medium text-dark">cita de paciente.</span> 
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-12"><i class="ti ti-clock me-1"></i>hace 4 min</span>
                                                <div class="notification-action d-flex align-items-center float-end gap-2">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Marcar como leído" aria-label="Marcar como leído"></a>
                                                    <button class="btn rounded-circle p-0" data-dismissible="#notification-1">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Elemento-->
                                <div class="dropdown-item notification-item py-3 text-wrap border-bottom" id="notification-2">
                                    <div class="d-flex">
                                        <div class="me-2 position-relative flex-shrink-0">
                                            <img src="assets/img/avatars/avatar-39.jpg" class="avatar-md rounded-circle" alt="paciente">
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium text-dark">Thomas William</p>
                                            <p class="mb-1 text-wrap">
                                                reservó una nueva cita
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-12"><i class="ti ti-clock me-1"></i>hace 8 min</span>
                                                <div class="notification-action d-flex align-items-center float-end gap-2">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Marcar como leído" aria-label="Marcar como leído"></a>
                                                    <button class="btn rounded-circle p-0" data-dismissible="#notification-2">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Elemento-->
                                <div class="dropdown-item notification-item py-3 text-wrap border-bottom" id="notification-3">
                                    <div class="d-flex">
                                        <div class="me-2 position-relative flex-shrink-0">
                                            <img src="assets/img/avatars/avatar-12.jpg" class="avatar-md rounded-circle" alt="paciente">
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium text-dark">Sarah Anderson</p>
                                            <p class="mb-1 text-wrap">
                                                ha sido reservada exitosamente para el <span class="fw-medium text-dark">5 de abril a las 10:00 AM.</span>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-12"><i class="ti ti-clock me-1"></i>hace 15 min</span>
                                                <div class="notification-action d-flex align-items-center float-end gap-2">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Marcar como leído" aria-label="Marcar como leído"></a>
                                                    <button class="btn rounded-circle p-0" data-dismissible="#notification-3">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Elemento-->
                                <div class="dropdown-item notification-item py-3 text-wrap" id="notification-4">
                                    <div class="d-flex">
                                        <div class="me-2 position-relative flex-shrink-0">
                                            <img src="assets/img/avatars/avatar-08.jpg" class="avatar-md rounded-circle" alt="paciente">
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 fw-medium text-dark">Ann McClure</p>
                                            <p class="mb-1 text-wrap">
                                                canceló su cita programada para el <span class="fw-medium text-dark">5 de febrero de 2024</span>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-12"><i class="ti ti-clock me-1"></i>hace 20 min</span>
                                                <div class="notification-action d-flex align-items-center float-end gap-2">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Marcar como leído" aria-label="Marcar como leído"></a>
                                                    <button class="btn rounded-circle p-0" data-dismissible="#notification-4">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                            
                            <!-- Ver todo-->
                            <div class="p-2 rounded-bottom border-top text-center">
                                <a href="notifications.php" class="text-center text-decoration-underline fs-14 mb-0">
                                    Ver todas las notificaciones
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <?php if ($page !== 'layout-dark.php' && $page !== 'layout-fullwidth.php' && $page !== 'layout-hidden.php' && $page !== 'layout-hoverview.php' && $page !== 'layout-mini.php' && $page !== 'layout-rtl.php') {   ?>     
                    <!-- Light/Dark Mode Button -->
                    <div class="header-item d-flex me-2">
                        <button class="topbar-link btn topbar-link" id="light-dark-mode" type="button">
                            <i class="ti ti-moon fs-16"></i>
                        </button>
                    </div>
                <?php }?> 
                
                <!-- User Dropdown -->
                <div class="dropdown profile-dropdown d-flex align-items-center justify-content-center">
                    <a href="javascript:void(0);" class="topbar-link dropdown-toggle drop-arrow-none position-relative" data-bs-toggle="dropdown" data-bs-offset="0,22" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/img/avatars/avatar-31.jpg" width="32" class="rounded-2 d-flex" alt=patient">
                        <span class="online text-success"><i class="ti ti-circle-filled d-flex bg-white rounded-circle border border-1 border-white"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                    
                        <div class="d-flex align-items-center bg-light rounded p-2 mb-2">
                            <img src="assets/img/avatars/avatar-31.jpg" class="rounded-circle" width="42" height="42" alt="paciente">
                            <div class="ms-2">
                                <p class="fw-medium text-dark mb-0"><?php echo $user['user']['name'] ?></p>
                                <span class="d-block fs-13"><?php echo $user['roles'][0]?></span>
                            </div>
                        </div>

                        <!-- Elemento -->
                        <a href="general-settings.php" class="dropdown-item">
                            <i class="ti ti-user-circle me-1 align-middle"></i>
                            <span class="align-middle">Configuración de Perfil</span>
                        </a>

                        <!-- Elemento -->
                        <a href="notifications.php" class="dropdown-item">
                            <i class="ti ti-bell me-1 align-middle"></i>
                            <span class="align-middle">Notificaciones</span>
                        </a>

                        <!-- Elemento -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-help-circle me-1 align-middle"></i>
                            <span class="align-middle">Ayuda y Soporte</span>
                        </a>

                        <!-- Elemento -->
                        <a href="general-settings.php" class="dropdown-item">
                            <i class="ti ti-settings me-1 align-middle"></i>
                            <span class="align-middle">Configuración</span>
                        </a>            
                        
                        <!-- Elemento -->
                        <div class="pt-2 mt-2 border-top">
                            <a href="logout.php" class="dropdown-item text-danger">
                                <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Cerrar Sesión</span>
                            </a>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </header>
    <!-- Topbar End -->