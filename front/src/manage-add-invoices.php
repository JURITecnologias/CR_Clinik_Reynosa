<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Page Header -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <h6 class="mb-0"><a href="manage-invoices.php"><i class="ti ti-arrow-left me-2"></i>invoices</a></h6>
                <a href="manage-invoices-details.php" class="btn btn-primary"><i class="ti ti-eye me-1"></i>Preview</a>
            </div>
            <!-- End Page Header -->   
                
            <div class="card mb-0">
                <div class="card-body">
                    <h6 class="mb-3">Company Info</h6>
                    <form action="manage-add-invoices.php">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-4">
                                <div class="bg-light rounded position-relative p-4 text-center mb-3">
                                    <i class="ti ti-upload fs-16 mb-2 d-block"></i>
                                    <p class="mb-0">Upload Your Company Logo</p>
                                    <input type="file" class="position-absolute top-0 start-0 opacity-0 w-100 h-100">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Invoice Number</label>
                                    <input type="text" class="form-control" value="123456">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" value="123456">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="123456">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" value="123456">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" value="123456">
                                </div>
                            </div>
                        </div>
                        <div class="border-top mt-3 pt-3 mb-3">
                            <h6 class="mb-3">Item Details</h6>
                            <div class="table-responsive table-nowrap border">
                                <table class="table border">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Price ($)</th>
                                            <th>Discount ($)</th>
                                            <th>Amount($)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><div><input type="text" class="form-control" value="Surgical Gloves"></div></td>
                                            <td>
                                                <div class="custom-increment cart">
                                                    <div class="position-relative">
                                                        <div class="position-absolute start-0 top-50 translate-middle-y">
                                                            <button type="button" class="decrement-btn btn btn-icon border-0"  data-type="minus" data-field="">
                                                                <span><i class="ti ti-minus"></i></span>
                                                            </button>
                                                        </div>
                                                        <input type="text" id="quantity" name="quantity" class="form-control text-center" value="10" style="width: 110px;">
                                                        <div class="position-absolute end-0 top-50 translate-middle-y">
                                                            <button type="button" class="increment-btn btn btn-icon border-0" data-type="plus" data-field="">
                                                                <span><i class="ti ti-plus"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="45">
                                                </div> 
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="$10">
                                                </div> 
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="40.50">
                                                </div> 
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><div><input type="text" class="form-control" value="Surgical Gloves"></div></td>
                                            <td>
                                                <div class="custom-increment cart">
                                                    <div class="position-relative">
                                                        <div class="position-absolute start-0 top-50 translate-middle-y">
                                                            <button type="button" class="decrement-btn1 btn btn-icon border-0"  data-type="minus" data-field="">
                                                                <span><i class="ti ti-minus"></i></span>
                                                            </button>
                                                        </div>
                                                        <input type="text" id="quantity1" name="quantity" class="form-control text-center" value="10" style="width: 110px;">
                                                        <div class="position-absolute end-0 top-50 translate-middle-y">
                                                            <button type="button" class="increment-btn1 btn btn-icon border-0" data-type="plus" data-field="">
                                                                <span><i class="ti ti-plus"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="45">
                                                </div> 
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="$10">
                                                </div> 
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="text" class="form-control" value="40.50">
                                                </div> 
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-soft-danger border-0 flex-shrink-0 rounded-circle d-linline-flex align-items-center gap-1"> <i class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="" class="add-items my-2 mx-3 btn btn-primary d-inline-flex align-items-center gap-2"><i class="ti ti-plus"></i>Add Item</a>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-4">
                                <div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-6">
                                            <h6 class="mb-0 fw-semibold fs-14">Amount</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="40.50">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-6 text-dark fw-medium">
                                            <h6 class="mb-0 fw-semibold fs-14">Tax (16%)</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="2.43">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-6 text-dark fw-medium">
                                            <h6 class="mb-0 fw-semibold fs-14">Discount (10%)</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="24">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-6 text-dark fw-medium">
                                            <h6 class="mb-0 fw-semibold fs-14">Shipping Charge</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="45">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-6 text-dark fw-medium">
                                            <h6 class="mb-0 fw-semibold fs-14">Total Amount</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control bg-light" value="78.21">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Terms & Conditions</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-3 border-top pt-3 mt-3">
                            <a href="invoice-details.php" class="btn btn-dark"><i class="ti ti-eye me-1"></i>Preview</a>
                            <button class="btn btn-info" type="submit"><i class="ti ti-message-share me-1"></i>Save Invoice</button>
                            <button class="btn btn-primary" type="button"><i class="ti ti-send me-1"></i>Send Invoice</button>
                        </div>
                    </form>
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