<?php
ob_start();
include(__DIR__ . '/../src/user_session.php');
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
                <h4 class="mb-1">Pacientes</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Pacientes</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="patients.php" class="btn btn-icon btn-white active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Grid" data-bs-original-title="Cuadricula"><i class="ti ti-layout-grid"></i></a>
                <a href="all-patients-list.php" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="List" data-bs-original-title="Lista"><i class="ti ti-layout-list"></i></a>
                <!-- <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh"><i class="ti ti-refresh"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><i class="ti ti-printer"></i></a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Download" data-bs-original-title="Download"><i class="ti ti-cloud-download"></i></a> -->
                <a href="add-patient.php" class="btn btn-primary"><i class="ti ti-square-rounded-plus me-1"></i>Nuevo Paciente</a>
            </div>
        </div>
        <div id="alert_placeholder"></div>
        <!-- End Page Header -->

        <div class="input-group mb-3">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar por nombre de paciente" aria-label="Buscar por nombre de paciente" aria-describedby="button-addon2"
                value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="LookForUserByName()">Buscar</button>
        </div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <!-- row start -->
        <div id="pacientes_grid_section" class="d-none">
            <div class="card" id="controls_row">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php
                            // Obtener el parámetro 'registros' del querystring, valor por defecto 10
                            $registros = isset($_GET['registros']) ? intval($_GET['registros']) : 50;
                            ?>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text" id="basic-addon1">Registros</span>
                                <select class="form-select form-select-sm" id="example-select-1" name="registros" onchange="window.location.search = '?registros=' + this.value;">
                                    <option value="50" <?php echo $registros == 50 ? 'selected' : ''; ?>>50</option>
                                    <option value="100" <?php echo $registros == 100 ? 'selected' : ''; ?>>100</option>
                                    <option value="300" <?php echo $registros == 300 ? 'selected' : ''; ?>>300</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Columna 3: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 4: Puedes agregar contenido aquí -->
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0 pagination_control" id="pagination_pacientes">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                        <div class="col">
                            <!-- Columna 5: Puedes agregar contenido aquí -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" id="pacientes_container">

            </div>
        </div>

        <!-- row start -->

        <!-- <div class="text-center">
                <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center"><i class="ti ti-loader-2 me-1"></i>Load More</a>
            </div> -->

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>
<!-- Start Modal  -->
<div class="modal fade" id="delete_paciente_modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="mb-2">
                    <span class="avatar avatar-md rounded-circle bg-danger"><i class="ti ti-trash fs-24"></i></span>
                </div>
                <h6 class="fs-16 mb-1">Confirmar Eliminación</h6>
                <p class="mb-3">¿Estás seguro que deseas eliminar este registro?</p>
                <div class="d-flex justify-content-center gap-2">
                    <input type="hidden" id="delete_paciente_id" value="">
                    <input type="hidden" id="delete_paciente_referer" value="">
                    <a href="javascript:void(0);" class="btn btn-white w-100" data-bs-dismiss="modal">Cancelar</a>
                    <a href="javascript:RemovePaciente();" class="btn btn-danger w-100" id="confirm_delete_paciente">Sí, Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal  -->

<!-- Start Confirm Consulta Modal  -->
<div class="modal fade" id="modal_confirmar_consulta">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <div class="modal-body text-center position-relative">
                <div class="mb-2 position-relative z-1">
                    <span class="avatar avatar-md bg-primary rounded-circle"><i class="ti ti-activity fs-24"></i></span>
                </div>
                <h5 class="mb-1">Creacion de consulta</h5>
                <p class="mb-3">Desea crear una nueva consulta para el paciente <br /><span id="nombre_paciente_seleccionado" class="h4"></span>?</p>
                <div class="d-flex justify-content-center">
                    <input type="hidden" id="paciente_id_seleccionado" value="">
                    <button onclick="CerrarConfirmacionModal()" class="btn btn-white w-100 position-relative z-1 me-2" data-bs-dismiss="modal">Cancelar</button>
                    <button onclick="CrearConsulta()" class="btn btn-success w-100 position-relative z-1" data-bs-dismiss="modal">Sí, Crear</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Confirm Consulta Modal  -->


<!-- modal add cita -->
<div id="add-cita-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel">Nueva cita a paciente</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">Paciente</label>
                        <input type="text" style="width: 450px;" class="form-control" id="paciente_busqueda" placeholder="Buscar paciente...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Doctor</label>
                        <input type="text" class="form-control" style="width: 450px;" id="doctor_busqueda" placeholder="Buscar doctor...">
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Siguiente Visita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="frm_fecha_cita">
                            <span class="input-group-text">
                                <i class="ti ti-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Hora de la cita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="time" class="form-control" placeholder="HH:mm" id="frm_hora_cita">
                            <span class="input-group-text">
                                <i class="ti ti-clock"></i>
                            </span>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <input type="hidden" id="frm_paciente_id" value="">
                    <input type="hidden" id="frm_doctor_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="CrearCita('add-cita-modal',false)">Realizar cita</button>
                </div>
            </div> <!-- end modal content -->
        </div> <!-- end modal dialog -->
    </div> <!-- end modal -->
</div> <!-- end modal add cita -->

<!-- ========================
        End Page Content
    ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {

        const registros = <?php echo isset($_GET['registros']) ? intval($_GET['registros']) : 50; ?>;
        const busqueda = "<?php echo isset($_GET['busqueda']) ? addslashes($_GET['busqueda']) : ''; ?>";
        const pagina = <?php echo isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; ?>;

        loadPacientesGrid(registros, pagina, busqueda);

        const inputPacienteBusqueda = document.getElementById("paciente_busqueda");
        const inputDoctorBusqueda = document.getElementById("doctor_busqueda");

        const awesompleteServiciosMedicos = new Awesomplete(inputPacienteBusqueda, {
            minChars: 1,
            maxItems: 10,
            autoFirst: true,
            list: []
        });
        const awesompleteDoctores = new Awesomplete(inputDoctorBusqueda, {
            minChars: 1,
            maxItems: 10,
            autoFirst: true,
            list: []
        });

        inputPacienteBusqueda.addEventListener("input", async function() {

            const term = inputPacienteBusqueda.value.trim();
            if (term.length < 2) return;

            const result = await searchPatientByName(50, 1, term);
            if (result) {
                // Guarda los pacientes para selección posterior
                inputPacienteBusqueda._pacientes = result.data;
                inputPacienteBusqueda._pacientes.forEach(p => {
                    p.nombre_completo = `${p.nombre.charAt(0).toUpperCase() + p.nombre.slice(1).toLowerCase()} ${p.apellido.charAt(0).toUpperCase() + p.apellido.slice(1).toLowerCase()}`;
                });
                const list = result.data.map(m => m.nombre_completo);
                awesompleteServiciosMedicos.list = list;
            }
        });

        inputDoctorBusqueda.addEventListener("input", async function() {
            const term = inputDoctorBusqueda.value.trim();
            if (term.length < 2) return;

            const result = await getDoctorPorNombre(term);
            if (result) {
                // Guarda los doctores para selección posterior
                inputDoctorBusqueda._doctores = result;
                inputDoctorBusqueda._doctores.forEach(d => {
                    d.nombre_completo_format = `Dr. ${d.nombre_completo.charAt(0).toUpperCase() + d.nombre_completo.slice(1).toLowerCase()}`;
                });
                const list = result.map(m => m.nombre_completo_format);
                awesompleteDoctores.list = list;
            }
        });

        inputPacienteBusqueda.addEventListener("awesomplete-selectcomplete", function(e) {
            const selectedName = e.text.value;
            const pacientes = inputPacienteBusqueda._pacientes || [];
            const paciente = pacientes.find(p => p.nombre_completo === selectedName);

            if (paciente) {
                // Guarda el ID del paciente seleccionado
                document.getElementById("frm_paciente_id").value = paciente.id;
                // Puedes llenar otros campos aquí si lo necesitas
            } else {
                document.getElementById("frm_paciente_id").value = "";
            }
        });

        inputDoctorBusqueda.addEventListener("awesomplete-selectcomplete", function(e) {
            const selectedName = e.text.value;
            const doctores = inputDoctorBusqueda._doctores || [];
            const doctor = doctores.find(d => d.nombre_completo_format === selectedName);

            if (doctor) {
                // Guarda el ID del doctor seleccionado
                document.getElementById("frm_doctor_id").value = doctor.id;
                // Puedes llenar otros campos aquí si lo necesitas
            } else {
                document.getElementById("frm_doctor_id").value = "";
            }
        });

    }
</script>


<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>