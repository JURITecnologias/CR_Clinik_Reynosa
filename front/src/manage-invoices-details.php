<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                        <h6 class="mb-0"><a href="manage-invoices.php"><i class="ti ti-arrow-left me-2"></i>Invoices</a></h6>
                        <div class="d-flex align-items-center ">
                            <button class="btn btn-outline-light bg-white me-2" type="button"><i class="ti ti-file-download me-1"></i>Download PDF</button>
                            <button class="btn btn-outline-light bg-white" type="button"><i class="ti ti-printer me-1"></i>Print</button>
                        </div>
                    </div>
                    <!-- End Page Header -->   
                    
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="bg-light rounded p-3 mb-3">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="invoice-logo">
                                        <img src="assets/img/logo-dark.svg" alt="logo-dark" class="logo-white">
                                        <img src="assets/img/logo.svg" class="logo-dark" alt="logo">
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-success mb-1">Paid</span>
                                        <h6 class="mb-0">#INV5465</h6>
                                    </div>
                                </div>
                                <div class="row align-items-center gy-4">
                                    <div class="col-lg-5">
                                        <div>
                                            <h6 class="mb-2 fs-16 fw-bold">Invoice From</h6>
                                            <h6 class="fs-14 mb-2">Dreams Medical Center</h6>
                                            <p class="mb-1">15 Hodges Mews, High Wycombe HP12 3JL, <br> United Kingdom</p>
                                            <p class="mb-0">Phone : +1 45659 96566</p>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-5">
                                        <div>
                                            <h6 class="mb-2 fs-16 fw-bold">Bill To</h6>
                                            <h6 class="fs-14 mb-2">Andrew Fletcher</h6>
                                            <p class="mb-1">1147 Rohan Drive Suite, Burlington, VT / 8202115 <br> United Kingdom</p>
                                            <p class="mb-0">Phone : +1 36254 56589</p>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-2">
                                        <div>
                                            <div><img src="assets/img/icons/qr-code.svg" alt="qr-code"></div>
                                        </div>
                                    </div> <!-- end col -->

                                </div>
                            </div>
                            <h6 class="mb-3">Items Details</h6>
                            <div class="table-responsive table-nowrap mb-4">
                                <table class="table border">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Item Details</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Syringes & Needles</td>
                                            <td>2</td>
                                            <td>$200.00</td>
                                            <td>$396.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Face Masks (3-ply/N95)</td>
                                            <td>1</td>
                                            <td>$350.00</td>
                                            <td>$365.75</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Catheters</td>
                                            <td>1</td>
                                            <td>$399.00</td>
                                            <td>$398.90</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Surgical Drapes</td>
                                            <td>4</td>
                                            <td>$100.00</td>
                                            <td>$396.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-7">
                                    <div class="mb-3">
                                        <h6 class="mb-2">Terms and Conditions</h6>
                                        <p class="mb-1"> 1. Goods once sold cannot be taken back or exchanged.</p>
                                        <p class="mb-1"> 2. We are not the manufacturers the company provides warranty</p>
                                        <div class="bg-soft-info text-info rounded mt-3 p-3">
                                            <p class="mb-0"><span class="fw-semibold">Note :</span> Please ensure payment is made within 7 days of invoice date,</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 mb-0 fw-semibold">Amount</h6>
                                            <h6 class="fs-14 mb-0 fw-semibold">$1,793.12</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 mb-0 fw-semibold">CGST (9%)</h6>
                                            <h6 class="fs-14 mb-0 fw-semibold">$18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 mb-0 fw-semibold">SGST (9%)</h6>
                                            <h6 class="fs-14 mb-0 fw-semibold">$18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h6 class="fs-14 mb-0 fw-semibold">Discount (25%)</h6>
                                            <h6 class="fs-14 mb-0 fw-semibold text-danger">- $18</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                                            <h6 class="mb-0">Total (USD)</h6>
                                            <h6 class="mb-0">$1,972.43</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end border-top pt-3">
                                <div class="mb-1 signature"><img src="assets/img/icons/signature.svg" alt="sign"></div>
                                <p class="mb-0">Authorized Sign</p>
                            </div>
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