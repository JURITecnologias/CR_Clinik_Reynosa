<?php
ob_start();
$user = include(__DIR__ . '/../src/user_session.php');
?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Doctors</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Doctors</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="doctors.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Grid View"><i class="ti ti-layout-grid"></i></a>
                <a href="all-doctors-list.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="List View"><i class="ti ti-layout-list"></i></a>
                <!-- <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a> -->



                <?php if (
                    $user &&
                    $user['roles'] &&
                    (
                        in_array('Admon', $user['roles']) ||
                        in_array('Main Admin', $user['roles']) ||
                        in_array('Doctor', $user['roles'])
                    )
                ): ?>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print" id="btn-print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download" id="btn-download"><i class="ti ti-cloud-download"></i></a>
                    <a href="add-doctors.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>Registrar Doctor</a>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Page Header -->
        <?php include __DIR__ . '/../partials/loading-section.php'; ?>

        <div id="doctor-list" class="d-none">
            <!-- card start -->
            <div class="card mb-0">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Total Doctors<span class="badge bg-danger ms-2" id="total-doctors">600</span></h5>
                    <div class="d-flex align-items-center">

                        <!-- sort by
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
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-nowrap" id="doctors-table-wrapper">

                        <table class="table mb-0 border" id="doctors-table">
                            <thead class="table-light">
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Nombre</th>
                                    <th>Titulo</th>
                                    <th>Experiencia</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th></th>
                                    <!-- <th>Status</th>
                                    <th class="no-sort"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- card start -->
        </div>
    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<!-- Start Modal  -->
    <div class="modal fade" id="delete_doctor_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-2">
                        <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h6 class="fs-16 mb-1">Confirmar Accion</h6>
                    <p class="mb-3">¿Estás seguro de que deseas eliminar este doctor?</p>
                    <div class="d-flex justify-content-center gap-2">
                        <input type="hidden" id="delete_doctor_id" value="">
                        <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancelar</a>
                        <a href="javascript:DeleteDoctor();" class="btn btn-danger w-100" id="confirm_delete_doctor">Sí, Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal  -->

<!-- ========================
        End Page Content
    ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
        const printBtn = document.getElementById('btn-print');
        if (printBtn) {
            printBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.print();
            });
        }

        const downloadBtn = document.getElementById('btn-download');
        if (downloadBtn) {
            downloadBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Selecciona el contenido que quieres exportar
                const element = document.querySelector('.content');
                html2pdf().set({
                    margin: 10,
                    filename: 'doctores.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                }).from(element).save();
            });
        }
    });

    function loadEvent() {
        loadDoctoresList();
    }
</script>
<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>