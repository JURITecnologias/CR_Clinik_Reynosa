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
                    <h4 class="mb-1">Pharmacy</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                            <li class="breadcrumb-item active">Pharmacy</li>
                        </ol>
                    </div>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a>
                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="ti ti-square-rounded-plus me-1"></i>New Product</a>
                </div>
            </div>
            <!-- End Page Header -->
            
            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="d-inline-flex align-items-center mb-0">Total Products<span class="badge bg-danger ms-2">658</span></h6>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-md btn-outline-light d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-sort-descending-2 me-1"></i><span class="me-1">Sort By : </span> Newest
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
                            $jsonContent = file_get_contents('../assets/json/pharmacy.json');
                            if ($jsonContent !== false) {
                                $data = json_decode($jsonContent, true);
                            } else {
                                $data = [];
                            }
                        ?>
                        <table class="table mb-0 border">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th class="no-sort">Price</th>
                                    <th class="no-sort">Offer Price</th>
                                    <th>Purchase Date</th>
                                    <th>Expiry Date</th>
                                    <th>Stock</th>
                                    <th class="no-sort">Description</th>
                                    <th>Unit (ml/mg)</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $product): ?>
                                    <tr>
                                        <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_modal"><?= $product['id'] ?></a></td>
                                        <td><?= $product['name'] ?></td>
                                        <td><?= $product['price'] ?></td>
                                        <td><?= $product['offer_price'] ?></td>
                                        <td><?= $product['purchase_date'] ?></td>  
                                        <td><?= $product['expiry_date'] ?></td>   
                                        <td><?= $product['stock'] ?></td> 
                                        <td><p class="mb-0 text-truncate"><?= $product['description'] ?></p></td>                                 
                                        <td><?= $product['unit'] ?></td> 
                                        <td class="text-end">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown" aria-label="more options"><i class="ti ti-dots-vertical"></i></a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#view_modal"><i class="ti ti-eye me-1"></i>View Details</a>
                                                </li>  
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="ti ti-edit me-1"></i>Edit</a>
                                                </li>                                       
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table end -->
                </div>

            </div>
            <!-- card start -->

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