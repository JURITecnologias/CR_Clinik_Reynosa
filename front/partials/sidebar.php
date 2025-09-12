<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
$user= include(__DIR__ . '/../src/user_session.php');
define('CR_CLINIK_ENV', getenv('CR_CLINIK_ENV') ?: 'Production');

function userHasAnyRole($user, $roles)
{
    if (isset($user['roles']) && is_array($user['roles'])) {
        foreach ($roles as $role) {
            if (in_array($role, $user['roles'])) {
                return true;
            }
        }
    }
    return false;
}
?>    
    
    <!-- Sidenav Menu Start -->
    <div class="sidebar" id="sidebar">
        
        <!-- Start Logo -->
        <div class="sidebar-logo">
            <div>
                <!-- Logo Normal -->
                <a href="index.php" class="logo logo-normal">
                    <img src="assets/img/LogoCruzRoja-nb-wl.png" alt="Logo" style="width:110px;">
                </a>

                <!-- Logo Small -->
                <a href="index.php" class="logo-small">
                    <img src="assets/img/LogoCruzRoja-nb.png" alt="Logo" style="height:55px;">
                </a>

                <!-- Logo Dark -->
                <a href="index.php" class="dark-logo">
                    <img src="assets/img/LogoCruzRoja-nb.png" alt="Logo" style="width:110px;">
                </a>
            </div>
            <button class="sidenav-toggle-btn btn border-0 p-0 active" id="toggle_btn"> 
                <i class="ti ti-arrow-bar-to-left"></i>
            </button>

            <!-- Sidebar Menu Close -->
            <button class="sidebar-close">
                <i class="ti ti-x align-middle"></i>
            </button>                
        </div>
        <!-- End Logo -->

        <!-- Sidenav Menu -->
        <div class="sidebar-inner m-2" data-simplebar>                
            <div id="sidebar-menu" class="sidebar-menu">
                <ul role="menu" aria-label="Main navigation menu">
                    <li class="menu-title" aria-disabled="true"><span>MAIN</span></li>

                    <li>
                        <a href="index.php" class="<?php echo ($page =='index.php' || $page =='/') ? 'active' : '' ;?>">
                            <i class="ti ti-layout-board"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <?php
                        $env = CR_CLINIK_ENV;
                        if (!$env || strtolower($env) === 'local') {
                    ?>
                    
                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='chat.php' || $page =='voice-call.php' || $page =='video-call.php' || $page =='calendar.php' || $page =='email.php' || $page =='email-details.php' || $page =='email-compose.php' || $page =='contacts.php' || $page =='contact-list.php' || $page =='invoice.php' || $page =='add-invoice.php' || $page =='edit-invoice.php' || $page =='invoice-details.php' || $page =='invoice-details.php' || $page =='todo.php' || $page =='notes.php' || $page =='kanban-view.php' || $page =='file-manager.php' || $page =='social-feed.php' || $page =='search-result.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-apps"></i><span>Applications <?php echo $env; ?></span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="chat.php" class="<?php echo ($page =='chat.php') ? 'active' : '' ;?>">Chat</a></li>
                            <li class="submenu submenu-two">
                                <a href="#">Calls<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="voice-call.php" class="<?php echo ($page =='voice-call.php') ? 'active' : '' ;?>">Voice Call</a></li>
                                    <li><a href="video-call.php" class="<?php echo ($page =='video-call.php') ? 'active' : '' ;?>">Video Call</a></li>
                                </ul>
                            </li>
                            <li><a href="calendar.php" class="<?php echo ($page =='calendar.php') ? 'active' : '' ;?>">Calendar</a></li>	
                            <li><a href="email.php" class="<?php echo ($page =='email.php' || $page =='email-details.php' || $page =='email-compose.php') ? 'active' : '' ;?>">Email</a></li>
                            <li><a href="contacts.php" class="<?php echo ($page =='contacts.php' || $page =='contact-list.php') ? 'active' : '' ;?>">Contacts</a></li>
                            <li class="submenu submenu-two">
                                <a href="#">Invoices<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="invoice.php" class="<?php echo ($page =='invoice.php' || $page =='add-invoice.php' || $page =='edit-invoice.php') ? 'active' : '' ;?>">Invoices</a></li>
                                    <li><a href="invoice-details.php" class="<?php echo ($page =='invoice-details.php') ? 'active' : '' ;?>">Invoice Details</a></li>
                                </ul>
                            </li>
                            <li><a href="todo.php" class="<?php echo ($page =='todo.php') ? 'active' : '' ;?>">To Do</a></li>
                            <li><a href="notes.php" class="<?php echo ($page =='notes.php') ? 'active' : '' ;?>">Notes</a></li>
                            <li><a href="kanban-view.php" class="<?php echo ($page =='kanban-view.php') ? 'active' : '' ;?>">Kanban Board</a></li>
                            <li><a href="file-manager.php" class="<?php echo ($page =='file-manager.php') ? 'active' : '' ;?>">File Manager</a></li>
                            <li><a href="social-feed.php" class="<?php echo ($page =='social-feed.php') ? 'active' : '' ;?>">Social Feed</a></li>
                            <li><a href="search-result.php" class="<?php echo ($page =='search-result.php') ? 'active' : '' ;?>">Search Result</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='layout-mini.php' || $page =='layout-hoverview.php' || $page =='layout-hidden.php' || $page =='layout-fullwidth.php' || $page =='layout-rtl.php' || $page =='layout-dark.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-layout-kanban"></i><span>Layouts</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="layout-mini.php" class="<?php echo ($page =='layout-mini.php') ? 'active' : '' ;?>">Mini</a></li>
                            <li><a href="layout-hoverview.php" class="<?php echo ($page =='layout-hoverview.php') ? 'active' : '' ;?>">Hover View</a></li>
                            <li><a href="layout-hidden.php" class="<?php echo ($page =='layout-hidden.php') ? 'active' : '' ;?>">Hidden</a></li>
                            <li><a href="layout-fullwidth.php" class="<?php echo ($page =='layout-fullwidth.php') ? 'active' : '' ;?>">Full Width</a></li>
                            <li><a href="layout-rtl.php" class="<?php echo ($page =='layout-rtl.php') ? 'active' : '' ;?>">RTL</a></li>
                            <li><a href="layout-dark.php" class="<?php echo ($page =='layout-dark.php') ? 'active' : '' ;?>">Dark</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="menu-title" aria-disabled="true"><span>SALUD</span></li>

                    <li>
                        <a href="patients.php" class="<?php echo ($page =='patients.php' || $page =='all-patients-list.php' || $page =='add-patient.php' || $page =='edit-patient.php' || $page =='patient-details.php' || $page =='patient-details-appointments.php' || $page =='patient-details-vital-signs.php' || $page =='patient-details-visit-history.php' || $page =='patient-details-lab-results.php' || $page =='patient-details-prescription.php' || $page =='patient-details-medical-history.php' || $page =='patient-details-documents.php') ? 'active' : '' ;?>">
                            <i class="ti ti-users"></i><span>Pacientes</span>
                        </a>
                    </li>

                    <li>
                        <a href="doctors.php" class="<?php echo ($page =='doctors.php' || $page =='all-doctors-list.php' || $page =='add-doctors.php' || $page =='edit-doctors.php' || $page =='doctor-details.php') ? 'active' : '' ;?>">
                            <i class="ti ti-stethoscope"></i><span>Doctores</span>
                        </a>
                    </li>

                    <li>
                        <a href="appointments.php" class="<?php echo ($page =='appointments.php' || $page =='appointment-consultation.php') ? 'active' : '' ;?>">
                            <i class="ti ti-calendar-time"></i><span>Citas</span>
                        </a>
                    </li>

                    <li>
                        <a href="visits.php" class="<?php echo ($page =='visits.php' || $page =='start-visits.php') ? 'active' : '' ;?>">
                            <i class="ti ti-e-passport"></i><span>Consultas</span>
                        </a>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='lab-results.php' || $page =='medical-results.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-test-pipe"></i><span>Laboratorio</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="lab-results.php" class="<?php echo ($page =='lab-results.php') ? 'active' : '' ;?>">Resultados de Laboratorio</a>
                            </li>
                            <li>
                                <a href="medical-results.php" class="<?php echo ($page =='medical-results.php') ? 'active' : '' ;?>">Resultados Médicos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="pharmacy.php" class="<?php echo ($page =='pharmacy.php') ? 'active' : '' ;?>">
                            <i class="ti ti-prescription"></i><span>Farmacia</span>
                        </a>
                    </li>

                    <li class="menu-title" aria-disabled="true"><span>Administraci&oacuten</span></li>

                    <li>
                        <a href="staffs.php" class="<?php echo ($page =='staffs.php') ? 'active' : '' ;?>">
                            <i class="ti ti-users-group"></i><span>Personal</span>
                        </a>
                    </li>

                    <li>
                        <a href="notifications.php" class="<?php echo ($page =='notifications.php') ? 'active' : '' ;?>">
                            <i class="ti ti-bell"></i><span>Notificaciones</span>
                        </a>
                    </li>                    

                    <li>
                        <a href="general-settings.php" class="<?php echo ($page =='general-settings.php' || $page =='security-settings.php' || $page =='preferences-settings.php' || $page =='appearance-settings.php' || $page =='security-settings.php' || $page =='notifications-settings.php' || $page =='user-permissions-settings.php' || $page =='permission-settings.php' || $page =='plans-billings-settings.php') ? 'active' : '' ;?>">
                            <i class="ti ti-settings"></i><span>Configuración</span>
                        </a>
                    </li>

                    <?php
                        
                        $requiredRoles = ['Admon', 'Main Admin'];
                        if (userHasAnyRole($user, $requiredRoles)) {
                    ?>
                    <li>
                        <a href="usuarios-settings.php" class="<?php echo ($page =='usuarios-settings.php' ) ? 'active' : '' ;?>">
                            <i class="ti ti-user-circle"></i><span>Usuarios</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li>
                        <a href="medicamentos-catalog.php" class="<?php echo ($page =='medicamentos-catalog.php' ) ? 'active' : '' ;?>">
                            <i class="ti ti-spray"></i><span>Medicamentos</span>
                        </a>
                    </li>
                    <li>
                        <a href="servicios-medicos-catalog.php" class="<?php echo ($page =='servicios-medicos-catalog.php' ) ? 'active' : '' ;?>">
                            <i class="ti ti-activity"></i><span>Servicios Medicos</span>
                        </a>
                    </li>

                    <?php
                        $env = CR_CLINIK_ENV;
                        if (!$env || strtolower($env) === 'local') {
                    ?>
                    <li class="menu-title" aria-disabled="true"><span>PAGES</span></li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='login.php' || $page =='sign-up.php' || $page =='forgot-password.php' || $page =='change-password.php' || $page =='lock-screen.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-lock-square-rounded"></i><span>Authentication</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="login.php" class="<?php echo ($page =='login.php') ? 'active' : '' ;?>">Login</a></li>
                            <li><a href="sign-up.php" class="<?php echo ($page =='sign-up.php') ? 'active' : '' ;?>">Sign Up</a></li>
                            <li><a href="forgot-password.php" class="<?php echo ($page =='forgot-password.php') ? 'active' : '' ;?>">Forgot Password</a></li>
                            <li><a href="change-password.php" class="<?php echo ($page =='change-password.php') ? 'active' : '' ;?>">Change Password</a></li>
                            <li><a href="lock-screen.php" class="<?php echo ($page =='lock-screen.php') ? 'active' : '' ;?>">Lock Screen</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='error-404.php' || $page =='error-500.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-face-id-error"></i><span>Error Pages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="error-404.php" class="<?php echo ($page =='error-404.php') ? 'active' : '' ;?>">Error 404</a></li>
                            <li><a href="error-500.php" class="<?php echo ($page =='error-500.php') ? 'active' : '' ;?>">Error 500</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='starter-page.php' || $page =='coming-soon.php' || $page =='under-maintenance.php' || $page =='privacy-policy.php' || $page =='terms-and-conditions.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-files"></i><span>Other Pages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="starter-page.php" class="<?php echo ($page =='starter-page.php') ? 'active' : '' ;?>">Starter Page</a></li>
                            <li><a href="coming-soon.php" class="<?php echo ($page =='coming-soon.php') ? 'active' : '' ;?>">Coming Soon</a></li>
                            <li><a href="under-maintenance.php" class="<?php echo ($page =='under-maintenance.php') ? 'active' : '' ;?>">Under Maintenance</a></li>
                            <li><a href="privacy-policy.php" class="<?php echo ($page =='privacy-policy.php') ? 'active' : '' ;?>">Privacy Policy</a></li>
                            <li><a href="terms-and-conditions.php" class="<?php echo ($page =='terms-and-conditions.php') ? 'active' : '' ;?>">Terms & Conditions</a></li>
                        </ul>
                    </li>   

                    <li class="menu-title" aria-disabled="true"><span>UI Interface</span></li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='ui-accordion.php' || $page =='ui-alerts.php' || $page =='ui-avatar.php' || $page =='ui-badges.php' || $page =='ui-breadcrumb.php' || $page =='ui-buttons.php' || $page =='ui-buttons-group.php' || $page =='ui-cards.php' || $page =='ui-carousel.php' || $page =='ui-collapse.php' || $page =='ui-dropdowns.php' || $page =='ui-ratio.php' || $page =='ui-grid.php' || $page =='ui-images.php' || $page =='ui-links.php' || $page =='ui-list-group.php' || $page =='ui-modals.php' || $page =='ui-offcanvas.php' || $page =='ui-pagination.php' || $page =='ui-placeholders.php' || $page =='ui-popovers.php' || $page =='ui-progress.php' || $page =='ui-scrollspy.php' || $page =='ui-spinner.php' || $page =='ui-nav-tabs.php' || $page =='ui-toasts.php' || $page =='ui-tooltips.php' || $page =='ui-typography.php' || $page =='ui-utilities.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-hierarchy"></i><span>Base UI</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="ui-accordion.php" class="<?php echo ($page =='ui-accordion.php') ? 'active' : '' ;?>">Accordion</a></li>
                            <li><a href="ui-alerts.php" class="<?php echo ($page =='ui-alerts.php') ? 'active' : '' ;?>">Alerts</a></li>
                            <li><a href="ui-avatar.php" class="<?php echo ($page =='ui-avatar.php') ? 'active' : '' ;?>">Avatar</a></li>
                            <li><a href="ui-badges.php" class="<?php echo ($page =='ui-badges.php') ? 'active' : '' ;?>">Badges</a></li>
                            <li><a href="ui-breadcrumb.php" class="<?php echo ($page =='ui-breadcrumb.php') ? 'active' : '' ;?>">Breadcrumb</a></li>
                            <li><a href="ui-buttons.php" class="<?php echo ($page =='ui-buttons.php') ? 'active' : '' ;?>">Buttons</a></li>
                            <li><a href="ui-buttons-group.php" class="<?php echo ($page =='ui-buttons-group.php') ? 'active' : '' ;?>">Button Group</a></li>
                            <li><a href="ui-cards.php" class="<?php echo ($page =='ui-cards.php') ? 'active' : '' ;?>">Card</a></li>
                            <li><a href="ui-carousel.php" class="<?php echo ($page =='ui-carousel.php') ? 'active' : '' ;?>">Carousel</a></li>
                            <li><a href="ui-collapse.php" class="<?php echo ($page =='ui-collapse.php') ? 'active' : '' ;?>">Collapse</a></li>
                            <li><a href="ui-dropdowns.php" class="<?php echo ($page =='ui-dropdowns.php') ? 'active' : '' ;?>">Dropdowns</a></li>
                            <li><a href="ui-ratio.php" class="<?php echo ($page =='ui-ratio.php') ? 'active' : '' ;?>">Ratio</a></li>
                            <li><a href="ui-grid.php" class="<?php echo ($page =='ui-grid.php') ? 'active' : '' ;?>">Grid</a></li>
                            <li><a href="ui-images.php" class="<?php echo ($page =='ui-images.php') ? 'active' : '' ;?>">Images</a></li>
                            <li><a href="ui-links.php" class="<?php echo ($page =='ui-links.php') ? 'active' : '' ;?>">Links</a></li>
                            <li><a href="ui-list-group.php" class="<?php echo ($page =='ui-list-group.php') ? 'active' : '' ;?>">List Group</a></li>
                            <li><a href="ui-modals.php" class="<?php echo ($page =='ui-modals.php') ? 'active' : '' ;?>">Modals</a></li>
                            <li><a href="ui-offcanvas.php" class="<?php echo ($page =='ui-offcanvas.php') ? 'active' : '' ;?>">Offcanvas</a></li>
                            <li><a href="ui-pagination.php" class="<?php echo ($page =='ui-pagination.php') ? 'active' : '' ;?>">Pagination</a></li>
                            <li><a href="ui-placeholders.php" class="<?php echo ($page =='ui-placeholders.php') ? 'active' : '' ;?>">Placeholders</a></li>
                            <li><a href="ui-popovers.php" class="<?php echo ($page =='ui-popovers.php') ? 'active' : '' ;?>">Popovers</a></li>
                            <li><a href="ui-progress.php" class="<?php echo ($page =='ui-progress.php') ? 'active' : '' ;?>">Progress</a></li>
                            <li><a href="ui-scrollspy.php" class="<?php echo ($page =='ui-scrollspy.php') ? 'active' : '' ;?>">Scrollspy</a></li>
                            <li><a href="ui-spinner.php" class="<?php echo ($page =='ui-spinner.php') ? 'active' : '' ;?>">Spinner</a></li>
                            <li><a href="ui-nav-tabs.php" class="<?php echo ($page =='ui-nav-tabs.php') ? 'active' : '' ;?>">Tabs</a></li>
                            <li><a href="ui-toasts.php" class="<?php echo ($page =='ui-toasts.php') ? 'active' : '' ;?>">Toasts</a></li>
                            <li><a href="ui-tooltips.php" class="<?php echo ($page =='ui-tooltips.php') ? 'active' : '' ;?>">Tooltips</a></li>
                            <li><a href="ui-typography.php" class="<?php echo ($page =='ui-typography.php') ? 'active' : '' ;?>">Typography</a></li>
                            <li><a href="ui-utilities.php" class="<?php echo ($page =='ui-utilities.php') ? 'active' : '' ;?>">Utilities</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='ui-dragula.php' || $page =='ui-clipboard.php' || $page =='ui-rangeslider.php' || $page =='ui-sweetalerts.php' || $page =='ui-lightbox.php' || $page =='ui-rating.php' || $page =='ui-scrollbar.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-whirl"></i><span>Advanced UI</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="ui-dragula.php" class="<?php echo ($page =='ui-dragula.php') ? 'active' : '' ;?>">Dragula</a></li>
                            <li><a href="ui-clipboard.php" class="<?php echo ($page =='ui-clipboard.php') ? 'active' : '' ;?>">Clipboard</a></li>
                            <li><a href="ui-rangeslider.php" class="<?php echo ($page =='ui-rangeslider.php') ? 'active' : '' ;?>">Range Slider</a></li>
                            <li><a href="ui-sweetalerts.php" class="<?php echo ($page =='ui-sweetalerts.php') ? 'active' : '' ;?>">Sweet Alerts</a></li>
                            <li><a href="ui-lightbox.php" class="<?php echo ($page =='ui-lightbox.php') ? 'active' : '' ;?>">Lightbox</a></li>
                            <li><a href="ui-rating.php" class="<?php echo ($page =='ui-rating.php') ? 'active' : '' ;?>">Rating</a></li>
                            <li><a href="ui-scrollbar.php" class="<?php echo ($page =='ui-scrollbar.php') ? 'active' : '' ;?>">Scrollbar</a></li>
                        </ul>
                    </li> 

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='form-basic-inputs.php' || $page =='form-checkbox-radios.php' || $page =='form-input-groups.php' || $page =='form-grid-gutters.php' || $page =='form-mask.php' || $page =='form-fileupload.php' || $page =='form-horizontal.php' || $page =='form-vertical.php' || $page =='form-floating-labels.php' || $page =='form-validation.php' || $page =='form-select.php' || $page =='form-wizard.php' || $page =='form-pickers.php' || $page =='form-editors.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-forms"></i><span>Forms</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);" class="<?php echo ($page =='form-basic-inputs.php' || $page =='form-checkbox-radios.php' || $page =='form-input-groups.php' || $page =='form-grid-gutters.php' || $page =='form-mask.php' || $page =='form-fileupload.php') ? 'active subdrop' : '' ;?>">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="form-basic-inputs.php" class="<?php echo ($page =='form-basic-inputs.php') ? 'active' : '' ;?>">Basic Inputs</a></li>
                                    <li><a href="form-checkbox-radios.php" class="<?php echo ($page =='form-checkbox-radios.php') ? 'active' : '' ;?>">Checkbox & Radios</a></li>
                                    <li><a href="form-input-groups.php" class="<?php echo ($page =='form-input-groups.php') ? 'active' : '' ;?>">Input Groups</a></li>
                                    <li><a href="form-grid-gutters.php" class="<?php echo ($page =='form-grid-gutters.php') ? 'active' : '' ;?>">Grid & Gutters</a></li>
                                    <li><a href="form-mask.php" class="<?php echo ($page =='form-mask.php') ? 'active' : '' ;?>">Input Masks</a></li>
                                    <li><a href="form-fileupload.php" class="<?php echo ($page =='form-fileupload.php') ? 'active' : '' ;?>">File Uploads</a></li>
                                </ul>
                            </li>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);" class="<?php echo ($page =='form-horizontal.php' || $page =='form-vertical.php' || $page =='form-floating-labels.php') ? 'active subdrop' : '' ;?>">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="form-horizontal.php" class="<?php echo ($page =='form-horizontal.php') ? 'active' : '' ;?>">Horizontal Form</a></li>
                                    <li><a href="form-vertical.php" class="<?php echo ($page =='form-vertical.php') ? 'active' : '' ;?>">Vertical Form</a></li>
                                    <li><a href="form-floating-labels.php" class="<?php echo ($page =='form-floating-labels.php') ? 'active' : '' ;?>">Floating Labels</a></li>
                                </ul>
                            </li>
                            <li><a href="form-validation.php" class="<?php echo ($page =='form-validation.php') ? 'active' : '' ;?>">Form Validation</a></li>
                            <li><a href="form-select.php" class="<?php echo ($page =='form-select.php') ? 'active' : '' ;?>">Form Select</a></li>
                            <li><a href="form-wizard.php" class="<?php echo ($page =='form-wizard.php') ? 'active' : '' ;?>">Form Wizard</a></li>
                            <li><a href="form-pickers.php" class="<?php echo ($page =='form-pickers.php') ? 'active' : '' ;?>">Form Picker</a></li>
                            <li><a href="form-editors.php" class="<?php echo ($page =='form-editors.php') ? 'active' : '' ;?>">Form Editors</a></li>
                        </ul>
                    </li> 

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='tables-basic.php' || $page =='data-tables.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-table"></i><span>Tables</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="tables-basic.php" class="<?php echo ($page =='tables-basic.php') ? 'active' : '' ;?>">Basic Tables </a></li>
                            <li><a href="data-tables.php" class="<?php echo ($page =='data-tables.php') ? 'active' : '' ;?>">Data Table </a></li>
                        </ul>
                    </li> 

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='chart-apex.php' || $page =='chart-c3.php' || $page =='chart-js.php' || $page =='chart-morris.php' || $page =='chart-flot.php' || $page =='chart-peity.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-chart-pie-3"></i><span>Charts</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="chart-apex.php" class="<?php echo ($page =='chart-apex.php') ? 'active' : '' ;?>">Apex Charts</a></li>
                            <li><a href="chart-c3.php" class="<?php echo ($page =='chart-c3.php') ? 'active' : '' ;?>">Chart C3</a></li>
                            <li><a href="chart-js.php" class="<?php echo ($page =='chart-js.php') ? 'active' : '' ;?>">Chart Js</a></li>
                            <li><a href="chart-morris.php" class="<?php echo ($page =='chart-morris.php') ? 'active' : '' ;?>">Morris Charts</a></li>
                            <li><a href="chart-flot.php" class="<?php echo ($page =='chart-flot.php') ? 'active' : '' ;?>">Flot Charts</a></li>
                            <li><a href="chart-peity.php" class="<?php echo ($page =='chart-peity.php') ? 'active' : '' ;?>">Peity Charts</a></li>
                        </ul>
                    </li> 

                    <li class="submenu">
                        <a href="javascript:void(0);" class="<?php echo ($page =='icon-fontawesome.php' || $page =='icon-tabler.php' || $page =='icon-bootstrap.php' || $page =='icon-remix.php' || $page =='icon-feather.php' || $page =='icon-ionic.php' || $page =='icon-material.php' || $page =='icon-pe7.php' || $page =='icon-simpleline.php' || $page =='icon-themify.php' || $page =='icon-weather.php' || $page =='icon-typicon.php' || $page =='icon-flag.php') ? 'active subdrop' : '' ;?>">
                            <i class="ti ti-icons"></i><span>Icons</span><span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="icon-fontawesome.php" class="<?php echo ($page =='icon-fontawesome.php') ? 'active' : '' ;?>">Fontawesome Icons</a></li>
                            <li><a href="icon-tabler.php" class="<?php echo ($page =='icon-tabler.php') ? 'active' : '' ;?>">Tabler Icons</a></li>
                            <li><a href="icon-bootstrap.php" class="<?php echo ($page =='icon-bootstrap.php') ? 'active' : '' ;?>">Bootstrap Icons</a></li>
                            <li><a href="icon-remix.php" class="<?php echo ($page =='icon-remix.php') ? 'active' : '' ;?>">Remix Icons</a></li>
                            <li><a href="icon-feather.php" class="<?php echo ($page =='icon-feather.php') ? 'active' : '' ;?>">Feather Icons</a></li>
                            <li><a href="icon-ionic.php" class="<?php echo ($page =='icon-ionic.php') ? 'active' : '' ;?>">Ionic Icons</a></li>
                            <li><a href="icon-material.php" class="<?php echo ($page =='icon-material.php') ? 'active' : '' ;?>">Material Icons</a></li>
                            <li><a href="icon-pe7.php" class="<?php echo ($page =='icon-pe7.php') ? 'active' : '' ;?>">Pe7 Icons</a></li>
                            <li><a href="icon-simpleline.php" class="<?php echo ($page =='icon-simpleline.php') ? 'active' : '' ;?>">Simpleline Icons</a></li>
                            <li><a href="icon-themify.php" class="<?php echo ($page =='icon-themify.php') ? 'active' : '' ;?>">Themify Icons</a></li>
                            <li><a href="icon-weather.php" class="<?php echo ($page =='icon-weather.php') ? 'active' : '' ;?>">Weather Icons</a></li>
                            <li><a href="icon-typicon.php" class="<?php echo ($page =='icon-typicon.php') ? 'active' : '' ;?>">Typicon Icons</a></li>
                            <li><a href="icon-flag.php" class="<?php echo ($page =='icon-flag.php') ? 'active' : '' ;?>">Flag Icons</a></li>
                        </ul>
                    </li> 

                    <li>
                        <a href="widgets.php" class="<?php echo ($page =='widgets.php') ? 'active' : '' ;?>">
                            <i class="ti ti-components"></i><span>Widgets</span>
                        </a>
                    </li> 
                    
                    <li class="menu-title" aria-disabled="true"><span>HELP</span></li>

                    <li>
                        <a href="javascript:void(0);"><i class="ti ti-file-type-doc"></i><span>Documentation</span></a>
                    </li> 

                    <li>
                        <a href="javascript:void(0);"><i class="ti ti-git-compare"></i>
                            <span>Changelog</span><span class="badge bg-success fs-10"></span> 
                        </a>
                    </li> 

                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <i class="ti ti-menu-order"></i><span>Multi Level</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);">Multilevel 1</a></li>
                            <li class="submenu submenu-two">
                                <a href="javascript:void(0);">Multilevel 2<span class="menu-arrow inside-submenu"></span></a>
                                <ul>
                                    <li><a href="javascript:void(0);">Multilevel 2.1</a></li>
                                    <li class="submenu submenu-two submenu-three">
                                        <a href="javascript:void(0);">Multilevel 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Multilevel 2.2.1</a></li>
                                            <li><a href="javascript:void(0);">Multilevel 2.2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">Multilevel 3</a></li>
                        </ul>
                    </li>
                     <?php
                    }
                    ?>           
                </ul>                   
            </div>
        </div>

    </div>
    <!-- Sidenav Menu End -->