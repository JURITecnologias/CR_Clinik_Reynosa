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
                <h4 class="mb-1">Horarios Doctores</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="general-settings.php">Administraci&oacute;n</a></li>
                        <li class="breadcrumb-item active">Horarios Doctores</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <?php include_once '../partials/loading-section.php'; ?>
        <div class="d-none" id="horarios_doctores_container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Horario de Doctor</h5>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="frm_doctor_select">Doctor</label>
                            <select class="form-select" id="frm_doctor_select">
                            </select>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Lista de Horarios</h5>
                    <div class="text-end">
                        <button class="btn btn-primary" id="btn_add_horario" data-bs-toggle="modal" data-bs-target="#add_horario_modal">Agregar Horario</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="horarios_table_body">
                            <!-- Los horarios se agregarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="alerts_container" class="">
        </div>

    </div>
    <!-- End Content -->




    <?php require_once '../partials/footer.php'; ?>

</div>

<!-- Standard modal content -->
<div id="add_horario_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_horario_modal-Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_horario_modal-Label">Agregar Horario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Dia</th>
                            <th>Horario Inicial</th>
                            <th>Horario Final</th>
                        </tr>
                    </thead>
                    <tbody id="horarios_modal_table_body">
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="lunes"></td>
                            <td>Lunes</td>
                            <td><input type="time" name="horario_inicial_lunes" class="form-control"></td>
                            <td><input type="time" name="horario_final_lunes" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="martes"></td>
                            <td>Martes</td>
                            <td><input type="time" name="horario_inicial_martes" class="form-control"></td>
                            <td><input type="time" name="horario_final_martes" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="miercoles"></td>
                            <td>Miercoles</td>
                            <td><input type="time" name="horario_inicial_miercoles" class="form-control"></td>
                            <td><input type="time" name="horario_final_miercoles" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="jueves"></td>
                            <td>Jueves</td>
                            <td><input type="time" name="horario_inicial_jueves" class="form-control"></td>
                            <td><input type="time" name="horario_final_jueves" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="viernes"></td>
                            <td>Viernes</td>
                            <td><input type="time" name="horario_inicial_viernes" class="form-control"></td>
                            <td><input type="time" name="horario_final_viernes" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="sabado"></td>
                            <td>Sabado</td>
                            <td><input type="time" name="horario_inicial_sabado" class="form-control"></td>
                            <td><input type="time" name="horario_final_sabado" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="dias[]" value="domingo"></td>
                            <td>Domingo</td>
                            <td><input type="time" name="horario_inicial_domingo" class="form-control"></td>
                            <td><input type="time" name="horario_final_domingo" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="horarios_modal_save_btn" onclick="modalSubmitHandler()">Guardar cambios</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        loadDoctoresSelect();
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->


<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>