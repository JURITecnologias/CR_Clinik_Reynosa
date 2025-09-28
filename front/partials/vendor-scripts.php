<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
?>

    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>    

	<!-- Simplebar JS -->
	<script src="assets/plugins/simplebar/simplebar.min.js"></script>

<?php if ($page == 'index.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'nueva-consulta.php') {   ?>     
    <!-- Daterangepikcer JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<?php }?>          

<?php if ($page == 'add-doctors.php' || $page == 'add-patient.php' || $page == 'all-doctors-list.php' || $page == 'appointments.php' || $page == 'calendar.php' || $page == 'edit-doctors.php' || $page == 'edit-patient.php' || $page == 'form-pickers.php' || $page == 'index.php' || $page == 'kanban-view.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'notes.php'  || $page == 'patient-details-appointments.php' || $page == 'patient-details-visit-history.php' || $page == 'patients.php' || $page == 'pharmacy.php' || $page == 'plans-billings-settings.php' || $page == 'staffs.php' || $page == 'start-visits.php' || $page == 'todo.php' || $page == 'visits.php' || $page == 'widgets.php' || $page == 'nueva-consulta.php') {   ?>     
    <!-- Flatpickr JS -->
    <script src="assets/plugins/flatpickr/flatpickr.min.js"></script>
<?php }?>

<?php if ($page == 'all-doctors-list.php' || $page == 'appointment-consultation.php' || $page == 'data-tables.php' || $page == 'lab-results.php' || $page == 'widgets.php' || 'medicamentos-catalog.php') {   ?>     
    <!-- Datatable JS -->
    <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/js/dataTables.bootstrap5.min.js"></script>
<?php }?>  

<?php if ($page == 'calendar.php') {   ?>     
    <!-- Fullcalendar JS -->
    <script src="assets/plugins/fullcalendar/index.global.min.js"></script>
    <script src="assets/plugins/fullcalendar/calendar-data.js"></script>
<?php }?> 

<?php if ($page == 'file-manager.php' || $page == 'social-feed.php') {   ?> 
    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<?php }?> 

<?php if ($page == 'email-compose.php' || $page == 'form-editors.php' || $page == 'kanban-view.php' || $page == 'notes.php' || $page == 'todo.php' || $page == 'widgets.php') {   ?>   
    <!-- Quill Editor JS -->
    <script src="assets/plugins/quill/quill.min.js"></script>
    <script src="assets/js/form-quill.js"></script>
<?php }?>  

<?php if ($page == 'video-call.php') {   ?> 
    <!-- Swiper JS -->
    <script src="assets/plugins/swiper/swiper-bundle.min.js"></script>
<?php }?>

<?php if ($page == 'chart-apex.php' || $page == 'index.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'widgets.php') {   ?>     
    <!-- ApexChart JS -->
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
<?php }?>  

<?php if ($page == 'chart-c3.php') {   ?> 
    <!-- Chart JS -->
    <script src="assets/plugins/c3-chart/d3.v5.min.js"></script>
    <script src="assets/plugins/c3-chart/c3.min.js"></script>
    <script src="assets/plugins/c3-chart/chart-data.js"></script>
<?php }?>

<?php if ($page == 'chart-flot.php') {   ?> 
    <!-- Chart JS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/plugins/flot/jquery.flot.pie.js"></script>
    <script src="assets/plugins/flot/chart-data.js"></script>
<?php }?>

<?php if ($page == 'chart-js.php' || $page == 'index.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'widgets.php') {   ?> 
    <!-- Chart JS -->
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/plugins/chartjs/chart-data.js"></script>
<?php }?>

<?php if ($page == 'chart-morris.php') {   ?> 
    <!-- Chart JS -->
    <script src="assets/plugins/morris/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/morris/chart-data.js"></script>
<?php }?>

<?php if ($page == 'chart-peity.php') {   ?> 
    <!-- Chart JS -->
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/plugins/peity/chart-data.js"></script>
<?php }?>

<?php if ($page == 'form-fileupload.php') {   ?> 
    <!-- Dropzone File Js -->
    <script src="assets/plugins/dropzone/dropzone-min.js"></script>

    <!-- File Upload js -->
    <script src="assets/js/form-fileupload.js"></script>
<?php }?>

<?php if ($page == 'form-mask.php') {   ?> 
    <!-- Inputmask JS -->
	<script src="assets/plugins/inputmask/inputmask.min.js"></script>
<?php }?>

<?php if ($page == 'form-wizard.php') {   ?> 
    <!-- Wizrd JS -->
	<script src="assets/plugins/vanilla-wizard/js/wizard.min.js"></script>

    <!-- Wizard JS -->
    <script src="assets/js/form-wizard.js"></script>
<?php }?>

<?php if ($page == 'search-result.php' || $page == 'social-feed.php' || $page == 'ui-lightbox.php') {   ?> 
    <!-- Glightbox JS -->
    <script src="assets/plugins/lightbox/glightbox.min.js"></script>
    <script src="assets/plugins/lightbox/lightbox.js"></script>
<?php }?>

<?php if ($page == 'kanban-view.php' || $page == 'ui-dragula.php') {   ?> 
    <!-- Dragula Js-->
    <script src="assets/plugins/dragula/dragula.min.js"></script>
    <script src="assets/js/dragula.js"></script>
<?php }?>

<?php if ($page == 'ui-clipboard.php') {   ?> 
    <!-- Clipboard JS -->
    <script src="assets/plugins/clipboard/clipboard.min.js"></script>
    <script src="assets/js/clipboard.js"></script>
<?php }?>

<?php if ($page == 'ui-rangeslider.php') {   ?> 
    <!-- noUiSlider js -->
    <script src="assets/plugins/nouislider/nouislider.min.js"></script>
    <script src="assets/plugins/wnumb/wNumb.min.js"></script>

    <!-- Rangeslider JS -->
    <script src="assets/js/range-slider.js"></script>
<?php }?>

<?php if ($page == 'ui-rating.php') {   ?> 
    <!-- Rater JS -->
    <script src="assets/plugins/rater-js/index.js"></script>
    <script src="assets/js/ratings.js"></script>
<?php }?>

<?php if ($page == 'ui-sweetalerts.php') {   ?> 
    <!-- Sweet Alerts js -->
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/js/sweetalerts.js"></script>
<?php }?>
<?php if ($page == 'add-doctors.php' || $page == 'add-patient.php' || $page == 'appointments.php' || $page == 'all-doctors-list.php' || $page == 'appearance-settings.php' || $page == 'appointment-consultation.php' || $page == 'change-password.php' || $page == 'calendar.php' || $page == 'edit-doctors.php' || $page == 'edit-patient.php' || $page == 'email-compose.php' || $page == 'form-select.php' || $page == 'general-settings.php' || $page == 'index.php' || $page == 'kanban-view.php' || $page == 'layout-dark.php' || $page == 'layout-fullwidth.php' || $page == 'layout-hidden.php' || $page == 'layout-hoverview.php' || $page == 'layout-mini.php' || $page == 'layout-rtl.php' || $page == 'notes.php' || $page == 'patient-details-appointments.php' || $page == 'patient-details-visit-history.php' || $page == 'patients.php' || $page == 'pharmacy.php' || $page == 'plans-billings-settings.php' || $page == 'security-settings.php' || $page == 'staffs.php' || $page == 'start-visits.php' || $page == 'todo.php' || $page == 'visits.php' || $page == 'widgets.php' || $page == 'nueva-consulta.php') {   ?>     
    <!-- Select2 JS -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<?php }?>   

<?php if ($page == 'chat.php') {   ?> 
    <!-- Coming Soon JS -->
    <script src="assets/js/chat.js"></script>
<?php }?>

<?php if ($page == 'coming-soon.php') {   ?> 
    <!-- Coming Soon JS -->
    <script src="assets/js/coming-soon.js"></script>
<?php }?>

    <!-- Main JS -->
    <script src="assets/js/script.js"></script>

    <!-- custom js -->
    <?php if($page == 'doctor-details.php' || $page == 'doctors.php' || $page == 'all-doctors-list.php' || $page == 'add-doctors.php' || $page == 'edit-doctors.php') {   ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <?php } ?> 

    <!-- App JS -->
    <script src="assets/js/app/common.js"></script>
    <script src="assets/js/app/config.js"></script>
    <script src="assets/js/app/auth.js"></script>
    
    <?php if ($page == 'login.php') {   ?>
    <script src="assets/js/app/login.js"></script>
    <?php } ?>

    <?php if ($page == 'usuarios-settings.php' || $page == 'add-doctors.php') {   ?>
    <script src="assets/js/app/users.js"></script>
    <script src="assets/js/app/roles.js"></script>
    <?php } ?>

    <?php if ($page == 'medicamentos-catalog.php' || $page == 'nueva-consulta.php') {   ?>
    <script src="assets/js/app/medicamentos.js"></script>
    <?php } ?>

    <?php if ($page == 'servicios-medicos-catalog.php' || $page=='nueva-consulta.php') {   ?>
    <script src="assets/js/app/servicios.js"></script>
    <?php } ?>

    <?php if ($page == 'doctors.php' || $page == 'all-doctors-list.php' || $page == 'add-doctors.php' || $page == 'edit-doctors.php' || $page == "doctor-details.php" || $page == 'horarios-doctores.php') {   ?>
    <script src="assets/js/app/doctors.js"></script>
    <?php } ?>

    <?php if ($page == 'patients.php' || $page == 'add-patient.php' || $page == 'edit-patient.php' || $page == "patient-details-appointments.php" || $page == "patient-details-visit-history.php" || $page == "all-patients-list.php" || $page == "paciente-detalle.php" || $page == "consultas.php" || $page == 'paciente-consultas-previas.php') {   ?>
    <script src="assets/js/app/pacientes.js"></script>
    <script src="assets/js/app/historial-paciente.js"></script>
    <?php } ?>

    <?php if ($page == 'horarios-doctores.php') {   ?>
    <script src="assets/js/app/horario-doctores.js"></script>
    <?php } ?>

    <?php if($page == 'consultas.php' || $page == 'nueva-consulta.php' || $page == 'paciente-consultas-previas.php' || $page == 'detalle-consulta.php') { ?>
    <script src="assets/js/app/consultas.js"></script>
    <?php } ?>

    <?php if($page == 'nueva-consulta.php' || $page == 'detalle-consulta.php') { ?>
    <script src="assets/js/app/signos-vitales.js"></script>
    <script src="assets/js/script.js"></script>
    <?php } ?>