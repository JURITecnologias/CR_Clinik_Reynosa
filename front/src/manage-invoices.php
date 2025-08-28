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
                    <h4 class="mb-1">Invoices</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                          
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light bg-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-outline-light bg-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon bg-white btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="manage-add-invoices.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>New Invoice</a>
                </div>
            </div>
            <!-- End Page Header -->   
                
            <!-- Start row -->
            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                <div>
                                    <p class="mb-1">Total Invoice</p>
                                    <h6 class="mb-0">$2,45,445</h6>
                                </div>
                                <span class="avatar rounded-circle badge-soft-primary"><i class="ti ti-components fs-24"></i></span>
                            </div>
                            <div>
                                <p class="d-flex align-items-center fs-13 mb-0"><span class="text-success me-1">+31%</span>Increased From Last Month</p>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                <div>
                                    <p class="mb-1">Unpaid Invoice</p>
                                    <h6 class="mb-0">$50,000</h6>
                                </div>
                                <span class="avatar rounded-circle badge-soft-pink"><i class="ti ti-clipboard-data fs-24"></i></span>
                            </div>
                            <div>
                                <p class="d-flex align-items-center fs-13 mb-0"><span class="text-danger me-1">-15%</span>Decreased From Last Month</p>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                <div>
                                    <p class="mb-1">Pending Invoice</p>
                                    <h6 class="mb-0">$45,000</h6>
                                </div>
                                <span class="avatar rounded-circle badge-soft-indigo"><i class="ti ti-cards fs-24"></i></span>
                            </div>
                            <div>
                                <p class="d-flex align-items-center fs-13 mb-0"><span class="text-success me-1">+48%</span>Increased From Last Month</p>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                <div>
                                    <p class="mb-1">Overdue Invoice</p>
                                    <h6 class="mb-0">$2,50,550</h6>
                                </div>
                                <span class="avatar rounded-circle badge-soft-orange"><i class="ti ti-calendar-event fs-24"></i></span>
                            </div>
                            <div>
                                <p class="d-flex align-items-center fs-13 mb-0"><span class="text-success me-1">+39%</span>Increased From Last Month</p>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

            </div>
            <!-- End row -->

            <!-- card start -->
            <div class="card mb-0">

                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="d-inline-flex align-items-center mb-0">Total Invoices<span class="badge bg-danger ms-2">658</span></h6>
                    <div class="d-flex align-items-center">
                        <!-- sort by -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-md btn-outline-light d-inline-flex align-items-center" data-bs-toggle="dropdown">
                            <i class="ti ti-sort-descending-2 me-1"></i><span class="me-1">Sort By : </span>  Newest
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-2">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Newest</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Oldest</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <!-- table start -->
                    <div class="table-responsive table-nowrap">
                        <?php 
                            $jsonContent = file_get_contents('../assets/json/manage-invoices.json');
                            if ($jsonContent !== false) {
                                $data = json_decode($jsonContent, true);
                            } else {
                                $data = [];
                            }
                        ?>
                        <table class="table border">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                    <th>Amount</th>
                                    <th>Amount Due</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $invoice): ?>
                                    <tr>
                                        <td><a href="invoice-details.php"><?= $invoice['id'] ?></a></td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-sm me-2"><img src="<?= $invoice['patient_image'] ?>" alt="patient"></a>
                                            <h6 class="mb-0 fs-14 fw-medium"><a href="#"><?= $invoice['patient_name'] ?></a></h6>
                                        </div>
                                    </td>
                                    <td><?= $invoice['created_date'] ?></td>
                                    <td><?= $invoice['amount'] ?></td>
                                    <td><?= $invoice['amount_due'] ?></td>
                                    <td><?= $invoice['due_date'] ?></td>      
                                    <td>
                                        <?php 
                                            $status = $invoice['status'];
                                            $colorMap = [
                                                'Paid' => 'success',
                                                'Pending' => 'warning',
                                                'Overdue' => 'danger'
                                            ];
                                            $color = $colorMap[$status] ?? 'info';
                                        ?>
                                        <span class="badge badge-soft-<?= $color ?>"><?= $invoice['status'] ?></span>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="manage-invoices-details.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-eye me-1"></i>Preview</a>
                                                </li>  
                                                <li>
                                                    <a href="manage-edit-invoices.php" class="dropdown-item d-flex align-items-center"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>                                       
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>

            </div>
            <!-- card end -->

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