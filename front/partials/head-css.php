<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
?>  

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="assets/img/cruz-roja-ico.ico">

<?php if ($page !== 'layout-mini.php' && $page !== 'layout-hoverview.php' && $page !== 'layout-hidden.php' && $page !== 'layout-fullwidth.php' && $page !== 'layout-rtl.php' && $page !== 'layout-dark.php' && $page !== 'login.php' && $page !== 'sign-up.php' && $page !== 'forgot-password.php' && $page !== 'change-password.php' && $page !== 'error-404.php' && $page !== 'error-500.php' && $page !== 'coming-soon.php' && $page !== 'under-maintenance.php' && $page !== 'lock-screen.php') {   ?> 
    <!-- Theme Config Js -->
    <script src="assets/js/theme-script.js"></script>
<?php }?>  

<?php if ($page !== 'layout-rtl.php') {   ?> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<?php }?>  

<?php if ($page === 'layout-rtl.php') {   ?> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
<?php }?>  

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="assets/plugins/simplebar/simplebar.min.css">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="assets/plugins/tabler-icons/tabler-icons.min.css">  
    
<?php if ($page == 'icon-bootstrap.php') {   ?> 
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/bootstrap/bootstrap-icons.min.css">
<?php }?>  

<?php if ($page == 'icon-feather.php') {   ?> 
    <!-- Feather CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">
<?php }?>  

<?php if ($page == 'icon-flag.php') {   ?> 
    <!-- Flag CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
<?php }?>  


    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">


<?php if ($page == 'icon-ionic.php') {   ?> 
    <!-- Ionic CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/ionic/ionicons.css">
<?php }?>  

<?php if ($page == 'icon-material.php') {   ?> 
    <!-- Material CSS -->
    <link rel="stylesheet" href="assets/plugins/material/materialdesignicons.css">
<?php }?>  

<?php if ($page == 'icon-pe7.php') {   ?> 
    <!-- Pe7 CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/pe7/pe-icon-7.css">
<?php }?>  

<?php if ($page == 'icon-remix.php') {   ?> 
    <!-- Remix Icon CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/remix/remixicon.css">
<?php }?>  

<?php if ($page == 'icon-simpleline.php') {   ?> 
    <!-- Simpleline CSS -->
    <link rel="stylesheet" href="assets/plugins/simpleline/simple-line-icons.css">
<?php }?>  

<?php if ($page == 'icon-themify.php') {   ?> 
    <!-- Themify CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/themify/themify.css">
<?php }?> 

<?php if ($page == 'icon-typicon.php') {   ?> 
    <!-- Typicon CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/typicons/typicons.css">
<?php }?> 

<?php if ($page == 'icon-weather.php') {   ?> 
    <!-- Weather CSS -->
    <link rel="stylesheet" href="assets/plugins/icons/weather/weathericons.css">
<?php }?>     

<?php if ($page == 'add-doctors.php' || $page == 'add-patient.php' || $page == 'all-doctors-list.php' || $page == 'appointments.php' || $page == 'calendar.php' || $page == 'edit-doctors.php' || $page == 'edit-patient.php' || $page == 'form-pickers.php' || $page == 'index.php' || $page == 'kanban-view.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'notes.php'  || $page == 'patient-details-appointments.php' || $page == 'patient-details-visit-history.php' || $page == 'patients.php' || $page == 'pharmacy.php' || $page == 'plans-billings-settings.php' || $page == 'staffs.php' || $page == 'start-visits.php' || $page == 'todo.php' || $page == 'visits.php' || $page == 'widgets.php' || $page == 'nueva-consulta.php') {   ?>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="assets/plugins/flatpickr/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php }?> 

<?php if ($page == 'all-doctors-list.php' || $page == 'appointment-consultation.php' || $page == 'data-tables.php' || $page == 'lab-results.php' || $page == 'widgets.php') {   ?>     
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/css/dataTables.bootstrap5.min.css">
<?php }?>  

<?php if ($page == 'index.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php') {   ?>     
    <!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
<?php }?>        

<?php if ($page == 'email-compose.php' || $page == 'form-editors.php' || $page == 'kanban-view.php' || $page == 'notes.php' || $page == 'todo.php' || $page == 'widgets.php') {   ?>   
    <!-- Quill css -->
    <link rel="stylesheet" href="assets/plugins/quill/quill.core.css">
    <link rel="stylesheet" href="assets/plugins/quill/quill.snow.css"> 
<?php }?>  

<?php if ($page == 'form-editors.php') {   ?> 
    <link rel="stylesheet" href="assets/plugins/quill/quill.bubble.css">
<?php }?>  

<?php if ($page == 'video-call.php') {   ?> 
    <!-- Swiper css -->
    <link rel="stylesheet" href="assets/plugins/swiper/swiper-bundle.min.css">
<?php }?>

<?php if ($page == 'chart-c3.php') {   ?> 
    <!-- ChartC3 CSS -->
    <link rel="stylesheet" href="assets/plugins/c3-chart/c3.min.css">
<?php }?>

<?php if ($page == 'chart-morris.php') {   ?> 
    <!-- Morris CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
<?php }?>

<?php if ($page == 'search-result.php' || $page == 'social-feed.php' || $page == 'ui-lightbox.php') {   ?> 
    <!-- Glightbox CSS -->
    <link rel="stylesheet" href="assets/plugins/lightbox/glightbox.min.css">
<?php }?>

<?php if ($page == 'ui-rangeslider.php') {   ?> 
    <!-- Range Slider CSS -->
    <link rel="stylesheet" href="assets/plugins/nouislider/nouislider.min.css">
<?php }?>

<?php if ($page == 'ui-sweetalerts.php') {   ?> 
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
<?php }?>

<?php if ($page == 'add-doctors.php' || $page=='citas.php' || $page == 'add-patient.php' || $page == 'appointments.php' || $page == 'all-doctors-list.php' || $page == 'appearance-settings.php' || $page == 'appointment-consultation.php' || $page == 'change-password.php' || $page == 'calendar.php' || $page == 'edit-doctors.php' || $page == 'edit-patient.php' || $page == 'email-compose.php' || $page == 'form-select.php' || $page == 'general-settings.php' || $page == 'index.php' || $page == 'kanban-view.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'notes.php' || $page == 'patient-details-appointments.php' || $page == 'patient-details-visit-history.php' || $page == 'patients.php' || $page == 'pharmacy.php' || $page == 'plans-billings-settings.php' || $page == 'security-settings.php' || $page == 'staffs.php' || $page == 'start-visits.php' || $page == 'todo.php' || $page == 'visits.php' || $page == 'widgets.php' || $page=="nueva-consulta.php") {   ?>     
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<?php }?>     

<?php if( $page == 'nueva-consulta.php' || $page == 'citas.php' || $page=='patients.php' || $page=="agregar-kit.php") { ?>
    <!-- Awesomplete CSS -->
    <link rel="stylesheet" href="assets/plugins/awesomplete/awesomplete.css" />
    <script src="assets/plugins/awesomplete/awesomplete.js"></script>
<?php } ?>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css" id="app-style">