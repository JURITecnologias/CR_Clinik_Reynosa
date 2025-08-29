<?php ob_start(); ?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Usuarios</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="general-settings.php">Administraci&oacute;n</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- card start -->
        <div class="card mb-0">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Total de Usuarios<span class="badge bg-danger ms-2" id="total_users">0</span></h5>
                <div>
                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_user"><i class="ti ti-square-rounded-plus me-1"></i>Nuevo Usuario</a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-none mb-3" id="loading">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-primary m-2" role="status"></div>
                    </div>
                </div>
                <div class="table-responsive table-nowrap">
                    <table class="d-none table border mb-0" id="user_table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- card end -->

    </div>
    <!-- End Content -->


    <!-- modal add user-->
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Registor de Usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="loading_user_info" class="d-none"> 
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary m-2" role="status"></div>
                        </div>
                    </div>
                    <div id="user_info_form">
                        <div class="mb-3">
                            <label for="input-label" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="user_name" placeholder="Nombre de Usuario">
                        </div>
                        <div class="mb-3">
                            <label for="input-label" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="input-password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="user_password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Rol de Usuario</label>
                            <select class="form-select" id="role_select">
                            </select>
                        </div>
                        <div class="text-center" id="add_user_button">
                            <input type="hidden" id="edit_user_id" value="">
                            <button type="button" class="btn btn-primary btn-large bg-gradient" style="width: 70%; height: 45px;" onclick="AddUserRequest()">Guardar</button>
                        </div>
                        <!-- <div class="text-center" id="edit_user_button" class="d-none">
                            
                            <button type="button" class="btn btn-primary btn-large bg-gradient" style="width: 70%; height: 45px;" onclick="EditUser()">Guardar</button>
                        </div> -->
                    </div>
                    <div id="admin_password_change" class="d-none">
                        <div class="mb-3">
                            <label for="input-password" class="form-label">Cambiar Contraseña (Admin)</label>
                            <input type="password" class="form-control" id="admin_password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-large bg-gradient" style="width: 70%; height: 45px;" onclick="EditUser()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end modal content -->
        </div> <!-- end modal dialog -->
    </div> <!-- end modal -->

    <?php require_once '../partials/footer.php'; ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadusers();
    });

    function loadusers() {
        LoadUsers();
        LoadRolesSelect();
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->


<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>