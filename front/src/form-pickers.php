<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">Form Picker</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>                                                        
                        <li class="breadcrumb-item active">Form Picker</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- start row -->
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Flatpickr - Datepicker</h5>
                        </div>
                        <div class="card-body">
                            <form action="#">

                                <!-- start row -->
                                <div class="row gy-3">
                                    
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Basic</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">DateTime</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d.m.y" data-enable-time</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time>
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Human-Friendly Dates</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-altFormat="F j, Y"</code> attribute.</p>
                                            <input type="text" class="form-control flatpickr-input" data-provider="flatpickr" data-altFormat="F j, Y">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">MinDate and MaxDate</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-minDate="Your Min. Date" data-maxDate="Your Max. date"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-minDate="25 12, 2021" data-maxDate="29 12,2021">
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Default Date</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="Your Default Date"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-deafult-date="25 12,2021">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Disabling Dates</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-disable="true"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-disable-date="15 12,2021">
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Selecting Multiple Dates</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-multiple-date="true"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-multiple-date="true">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Range</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-range-date="true">
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Inline</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true"</code> attribute.</p>
                                            <input type="text" class="form-control d-none" data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Week Numbers</label>
                                            <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y" data-week-number</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" data-week-number>
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row -->

                            </form> <!-- end form -->                                

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

            </div>
            <!-- end row -->

            <!-- start row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Flatpickr - Timepicker</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">

                                <!-- start row -->
                                <div class="row gy-3">

                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">Timepicker</label>
                                            <p class="text-muted">Set <code>data-provider="timepickr" data-time-basic="true"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="timepickr" data-time-basic="true" id="timepicker-example">
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-lg-6">
                                        <div>
                                            <label class="form-label mb-0">24-hour Time Picker</label>
                                            <p class="text-muted">Set <code>data-provider="timepickr" data-time-hrs="true"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="timepickr" data-time-hrs="true" id="timepicker-24hrs">
                                        </div>
                                    </div> <!-- end col -->
                                    
                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Time Picker w/ Limits</label>
                                            <p class="text-muted">Set <code>data-provider="timepickr" data-min-time="Min.Time" data-max-time="Max.Time"</code>attribute.</p>
                                            <input type="text" class="form-control" data-provider="timepickr" data-min-time="13:00" data-max-time="16:00">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Preloading Time</label>
                                            <p class="text-muted">Set <code>data-provider="timepickr" data-default-time="Your Default Time"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="timepickr" data-default-time="16:45">
                                        </div>
                                    </div> <!-- end col -->                                        

                                </div>
                                <!-- end row -->

                                <!-- start row -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Inline</label>
                                            <p class="text-muted">Set <code>data-provider="timepickr" data-time-inline="Your Default Time"</code> attribute.</p>
                                            <input type="text" class="form-control" data-provider="timepickr" data-time-inline="11:42">
                                        </div>
                                    </div> <!-- end col -->                                        

                                </div>
                                <!-- end row -->

                            </form> <!-- end form -->
                            
                        </div> <!-- end card-body -->                           
                    </div> <!-- end card -->                        
                </div> <!-- end col -->

            </div>
            <!-- end row -->
                            
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