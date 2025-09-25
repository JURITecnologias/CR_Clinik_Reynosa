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
                <h4 class="mb-1">Consulta</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Consulta</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="consultas.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Regresar a Consultas</a>
            </div>
        </div>

        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>
        <!-- start basic information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Informacion Basica del Paciente</h5>
            </div>
            <div class="card-body">
                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                <!-- start row -->
                <div class="row row-gap-3 align-items-center d-none" id="info_paciente_container">
                    <div class="col-lg-6">
                        <div class="d-sm-flex align-items-center">
                            <!-- <a href="javascript:void(0);" class="avatar avatar-xxl me-3 flex-shrink-0">
                                    <img src="assets/img/avatars/avatar-05.jpg" alt="img" class="rounded">
                                </a> -->
                            <div>
                                <h6 class="mb-1 mt-1"><a href="javascript:MostrarInfoPacienteCard();">
                                        <span class="h2 text-primary" id="paciente_nombre"></span>
                                        <input type="hidden" id="paciente_id" value="">
                                    </a></h6>
                                <p class="mb-0">Consulta ID :<span id="consulta_id"></span></p>
                                <input type="hidden" id="consulta_id" value="">
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
                                    <h6 class="fs-14 fw-semibold mb-1">Fecha de Consulta</h6>
                                    <p class="fs-13 mb-0 text-truncate"><span id="consulta_fecha"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" id="btn_ver_historial_medico" onclick="">Historial Medico</button>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end basic information -->

        <!-- start vitals information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Signos Vitales</h5>
            </div>
            <div class="card-body pb-0">

                <!-- start row -->
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Temperatura<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_temperatura">
                                <span class="input-group-text">°C</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_temperatura"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Frecuencia Cardiaca<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_frecuencia_cardiaca">
                                <span class="input-group-text">bpm</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_frecuencia_cardiaca"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Frecuencia Respiratoria<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_frecuencia_respiratoria">
                                <span class="input-group-text">rpm</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_frecuencia_respiratoria"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Saturación Oxigeno<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_saturacion_oxigeno">
                                <span class="input-group-text">%</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_saturacion_oxigeno"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Presion Arterial<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_presion_arterial">
                                <span class="input-group-text">mmHg</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_presion_arterial"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Peso<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_peso">
                                <span class="input-group-text">kg</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_peso"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Talla<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_talla">
                                <span class="input-group-text">cm</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_talla"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Estatura<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="frm_signos_vitales_estatura">
                                <span class="input-group-text">cm</span>
                                <div class="invalid-feedback" id="invalid_frm_signos_vitales_estatura"></div>
                            </div>

                        </div>
                    </div>
                    <div class="text-end mb-3 col-12">
                        <input type="hidden" id="frm_signos_vitales_id" value="">
                        <button class="btn btn-primary" id="btn_guardar_signos_vitales" onclick="EditarSignosVitales()">Guardar</button>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end vitals information -->

        <!-- start complaint information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Motivo de Consulta/ Queja</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="mb-0">
                            <textarea class="form-control" id="frm_motivo_consulta" rows="2"></textarea>
                            <div class="invalid-feedback" id="invalid_frm_motivo_consulta"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->
        <!-- start Sintomas information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Sintomas</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="mb-0">
                            <textarea class="form-control" id="frm_sintomas" rows="2"></textarea>
                            <div class="invalid-feedback" id="invalid_frm_sintomas"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->

        <!-- start Diagnostico information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Diagnostico</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="mb-0">
                            <textarea class="form-control" id="frm_diagnostico" rows="2"></textarea>
                            <div class="invalid-feedback" id="invalid_frm_diagnostico"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end complaint information -->

        <!-- start Indicaciones information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Indicaciones</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row row-gap-3">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="mb-0">
                            <textarea class="form-control" id="frm_indicaciones" rows="2" id="frm_indicaciones"></textarea>
                            <div class="invalid-feedback" id="invalid_frm_indicaciones"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end assessment information -->

        <!-- start medications information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Medicamentos</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="frm_medicamento_nombre">Nombre de medicamento<span class="text-danger ms-1">*</span></label><br>
                            <input class="form-control form-control-lg awesomplete" id="frm_medicamento_nombre" type="text" placeholder="Escriba el nombre del medicamento" autocomplete="off" style="width: 550px; max-width: 550px;"/>
                        </div>
                    </div></div>
                <div class="row">
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="frm_medicamento_dosis">Dosis<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" id="frm_medicamento_dosis">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="frm_medicamento_duracion">Duracion de dosis<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" id="frm_medicamento_duracion">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="frm_medicamento_frecuencia">Frecuencia<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" id="frm_medicamento_frecuencia">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <input type="hidden" id="frm_medicamento_id" value="">
                        <button class="btn btn-icon btn-primary btn-lg mt-4 rounded-circle d-none d-md-inline-flex" onclick="appendMedicamentoToList()">
                            <i class="ti ti-plus"></i>
                        </button>
                        <button class="btn btn-primary btn-block mt-4 d-md-none" style="width: 100%;" onclick="appendMedicamentoToList()">
                            <i class="ti ti-plus"></i> Agregar
                        </button>
                    </div>
                </div>
                <hr class="mb-1 p-3 opacity-10" style="border-color: #d3d3d3;">
                <!-- end row -->
                <div id="lista_medicamentos" class="d-flex flex-wrap gap-3">
                    <!-- Medicamento cards will be appended here -->
                </div>

            </div>
        </div>
        <!-- end medications information -->

        <!-- start Servicios medicos information -->
        <div class="card">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Orden Clinica</h5>
            </div>
            <div class="card-body">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-8">
                        <div class="mb-3">
                            <label class="form-label">Servicio a solicitar <span class="text-danger ms-1">*</span></label>
                            <select class="form-control select2" data-toggle="select2">
                                <option value="">Seleccione un servicio</option>
                                <option value="consulta_general">Curaciones</option>
                                <option value="rayos_x">Rayos X</option>
                                <option value="laboratorio">Laboratorio</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-8 col-sm-10">
                        <div class="mb-3">
                            <label class="form-label" for="frm_servicio_solicitud">Solicitud<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" id="frm_servicio_solicitud">
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <button class="btn btn-icon btn-primary btn-lg mt-4 rounded-circle d-none d-md-inline-flex">
                            <i class="ti ti-plus"></i>
                        </button>
                        <button class="btn btn-primary btn-block mt-4 d-md-none" style="width: 100%;">
                            <i class="ti ti-plus"></i> Agregar
                        </button>
                    </div>
                </div>
                <hr class="mb-1 p-3 opacity-10" style="border-color: #d3d3d3;">
                <!-- end row -->
                <div id="lista_servicios" class="d-flex flex-wrap gap-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Curaciones</h5>
                                <p class="card-text">Solicitud: Limpieza y desinfección de herida</p>
                            </div>
                            <button class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Rayos X</h5>
                                <p class="card-text">Solicitud: Radiografía de tórax</p>
                            </div>
                            <button class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Laboratorio</h5>
                                <p class="card-text">Solicitud: Análisis de sangre completo</p>
                            </div>
                            <button class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end medications information -->

        <!-- start follow Up information -->
        <div class="card mb-0">
            <div class="card-header d-flex align-items-center flex-wrap gap-2 justify-content-between">
                <h5 class="d-inline-flex align-items-center mb-0">Crear cita de seguimiento</h5>
            </div>
            <div class="card-body pb-0">
                <!-- start row -->
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Siguiente Visita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                            <span class="input-group-text">
                                <i class="ti ti-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- start row for time -->
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label mb-0">Hora de la cita</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="input-group w-auto input-group-flat mb-3">
                            <input type="time" class="form-control" placeholder="HH:mm">
                            <span class="input-group-text">
                                <i class="ti ti-clock"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end row for time -->
            </div>
        </div>
        <!-- end follow Up information -->

        <div class="d-flex justify-content-end flex-wrap align-items-center gap-2 mt-3">
            <button onclick="GuardarConsulta()" class="btn btn-primary btn-lg">Guardar Datos de Consulta</button>
            <button href="javascript:void(0);" class="btn btn-success btn-lg">Imprimir Receta Médica</button>
        </div>

    </div>
    <!-- End Content -->

    <?php require_once '../partials/footer.php'; ?>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
        const input = document.getElementById("frm_medicamento_nombre");
        const awesomplete = new Awesomplete(input, {
            filter: () => { // We will provide a list that is already filtered ...
                return true;
            },
            sort: false, // ... and sorted.
            list: []
        });
        input.addEventListener("input", async function() {

            const term = input.value.trim();
            if (term.length < 2) return;

            const result = await searchMedicamentosByName(term);
            console.log("result:", result);
            if (result) {
                // Guarda los medicamentos para selección posterior
                input._medicamentos = result;
                const list = result.map(m => m.nombre);
                awesomplete.list = list;
                console.log("resultados:", awesomplete.list);
                console.log("Medicamentos encontrados:", list);
            }
        });

        // Al seleccionar una sugerencia
        input.addEventListener("awesomplete-selectcomplete", function(e) {
            const selectedName = input.value;
            const medicamentos = input._medicamentos || [];
            const med = medicamentos.find(m => m.nombre === selectedName);
            if (med) {
                if (med.concentracion) {
                    document.getElementById("frm_medicamento_dosis").value = med.concentracion;
                }
                // Guarda el ID del medicamento seleccionado
                document.getElementById("frm_medicamento_id").value = med.id;
                // Puedes llenar otros campos aquí si lo necesitas
            }
        });
    });


    function loadEvent() {
        const p = '<?php echo isset($_GET['p']) ? $_GET['p'] : 'null'; ?>';
        LoadConsulta(p);
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>