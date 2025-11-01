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
                <h4 class="mb-1">Orden Clinica </h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Orden Clinica</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="orden-clinica-container">
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h5 class="d-inline-flex align-items-center mb-0">Informacion Basica del Paciente</h5>
                </div>
                <div class="card-body">
                    <!-- start row -->
                    <div class="row row-gap-3 align-items-center" id="info_paciente_container">
                        <div class="col-lg-6">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="mb-1 mt-1"><a href="javascript:MostrarInfoPacienteCard();">
                                            <span class="h2 text-primary" id="paciente_nombre"></span>
                                            <input type="hidden" id="paciente_id" value="">
                                        </a></h6>
                                    <p class="mb-0">Orden Clinica ID :<span id="orden_clinica_id"></span></p>
                                    <p class="mb-0">Estado Orden :<span id="estado_orden_clinica"></span></p>
                                    <p class="mb-0">Solicitado por :<span id="doctor_solicitante"></span></p>
                                    <input type="hidden" id="orden_clinica_id" value="">
                                    <input type="hidden" id="orden_clinica_estatus" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-3 bg-light rounded">
                                <div class="row row-gap-2">
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Edad / Género</h6>
                                        <p class="fs-13 mb-0 text-truncate"><span id="paciente_edad"></span> / <span id="paciente_genero"></span></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1 text-truncate">Fecha de Nacimiento</h6>
                                        <p class="fs-13 mb-0 text-truncate"><span id="paciente_fecha_nacimiento"></span></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h6 class="fs-14 fw-semibold mb-1">Fecha de Orden Clinica</h6>
                                        <p class="fs-13 mb-0 text-truncate"><span id="orden_clinica_fecha"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <div class="row mb-3" id="orden_clinica_container_details">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <h5 class="d-inline-flex align-items-center mb-0">Servicios Solicitados</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="servicios_solicitados_list">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                        <h5 class="d-inline-flex align-items-center mb-0">Consumibles Solicitados</h5>
                    </div>
                    <div class="card-body">
                        <div class="card bg-light mb-3" id="consumible_add_control">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="consumible_buscar" placeholder="Buscar consumible" style="width: 350px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="consumible_cantidad" placeholder="Cantidad" value="1" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <input type="hidden" id="consumible_seleccionado" value="">
                                        <button class="btn-save btn btn-icon btn-primary btn-lg rounded-circle d-none d-md-inline-flex " onclick="AddConsumibleSolicitado()">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                        <button class="btn-save btn btn-primary btn-block d-md-none" style="width: 100%;" onclick="AddConsumibleSolicitado()">
                                            <i class="ti ti-plus"></i> Agregar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Consumible / Kit</th>
                                        <th>Cantidad</th>
                                        <?php if(!isset($_GET['r'])): ?><th>Acciones</th><?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody id="consumibles_solicitados_table_body">
                                    <!-- Filas de consumibles solicitados se agregarán aquí dinámicamente -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="text-end">
                <button class="btn btn-lg btn-success" id="finalizar_orden_btn" onclick="ConfirmarTerminarOrden()">Finalizar</button>
            </div>
        </div>
    </div>


    <!-- Start Confirm Consulta Modal  -->
    <div class="modal fade" id="modal_confirmar_terminar_orden" tabindex="-1" aria-labelledby="modal_confirmar_terminar_ordenLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">
                <div class="modal-body text-center position-relative">
                    <div class="mb-2 position-relative z-1">
                        <span class="avatar avatar-md bg-success rounded-circle"><i class="ti ti-check fs-24"></i></span>
                    </div>
                    <h5 class="mb-1">Orden Clínica</h5>
                    <p class="mb-3">Desea terminar la orden para el paciente <br /><span id="nombre_paciente_seleccionado" class="h4"></span>?</p>
                    <div class="d-flex justify-content-center">
                        <input type="hidden" id="paciente_id_seleccionado" value="">
                        <button onclick="CerrarConfirmacionModal()" class="btn btn-white w-100 position-relative z-1 me-2" data-bs-dismiss="modal">Cancelar</button>
                        <button onclick="TerminarOrden()" class="btn btn-success w-100 position-relative z-1" data-bs-dismiss="modal">Sí, Terminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php require_once '../partials/footer.php'; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const inputConsumibleABuscar = document.getElementById("consumible_buscar");
        const awesomplete = new Awesomplete(inputConsumibleABuscar, {
            filter: () => {
                return true;
            },
            sort: false,
            list: []
        });

        inputConsumibleABuscar.addEventListener("blur", function() {
            if (inputConsumibleABuscar.value.trim() === "") {
                document.getElementById("consumible_seleccionado").value = "";
            }
        });

        inputConsumibleABuscar.addEventListener("input", async function() {

            const term = inputConsumibleABuscar.value.trim();
            if (term.length < 3) return;

            const result = await getConsumibles(100, 1, term, true);
            const consumibles = result.data.map(c => ({
                id: c.id,
                nombre: c.nombre,
                type: "consumible",
                display: c.nombre + " (Consumible)"
            }));
            const resultKits = await getKitconsumibles(100, 1, term, true);
            const activos = resultKits.data.filter(k => k.es_activo);
            const kits = activos.map(k => ({
                id: k.id,
                nombre: k.nombre,
                type: "kit",
                display: k.nombre + " (Kit)"
            }));
            const resultAll = [...consumibles, ...kits];
            if (resultAll && Array.isArray(resultAll)) {
                // Guarda los medicamentos para selección posterior
                inputConsumibleABuscar._consumibles = resultAll;
                const list = resultAll.map(m => m.display);
                awesomplete.list = list;
            }
            document.getElementById("consumible_seleccionado").value = "";
        });

        inputConsumibleABuscar.addEventListener("awesomplete-selectcomplete", function(e) {
            const selectedName = e.text.value;
            const consumibles = inputConsumibleABuscar._consumibles || [];
            const consumible = consumibles.find(m => m.display === selectedName);

            if (consumible) {
                document.getElementById("consumible_seleccionado").value = obfuscate(JSON.stringify(consumible));
            }
        });

        loadEvent();
    });

    function loadEvent() {

        const id = "<?php echo isset($_GET['p']) ? $_GET['p'] : ''; ?>";
        const r = <?php echo isset($_GET['r']) ? 'true' : 'false'; ?>;
        const readonly = r == 'true' ? true : false;
        console.log("readonly:", r);
        LoadOrdenATender(id, r);
    }
</script>

<?php
$content = ob_get_clean();
require_once '../partials/main.php';
