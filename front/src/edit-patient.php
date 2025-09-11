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
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>                            
                            <li class="breadcrumb-item active">Editar Paciente</li>
                        </ol>
                    </div>
                </div>
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Volver a Pacientes</a>
            </div>
            <!-- Fin Encabezado de Página -->
            <!-- row start -->
             <div class="row vertical-tab">
            <div class="col-xl-3 col-lg-4">
                <div class="nav flex-column nav-pills vertical-tab mb-lg-0 mb-4">
                    <button class="nav-link active fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-info-circle fs-16 me-2"></i>Información Básica</button>
                    <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-files fs-16 me-2"></i>Antecedentes Médicos</button>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="patient-form-wizard flex-fill">

                    <!-- basic information -->
                    <div class="form-wizard-content active">
                        <form action="add-patient.php" id="form-add-paciente">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Informacion Basica</h5>
                                </div>
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nombre(s)<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm_add_paciente_nombres">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Apellido(s)<span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control" id="frm_add_paciente_apellidos">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fecha Nacimiento<span class="text-danger ms-1">*</span></label>
                                                <div class="input-group w-auto input-group-flat ">
                                                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" id="frm_add_paciente_fecha_nacimiento">
                                                    <span class="input-group-text">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Edad<span class="text-danger ms-1">*</span></label>
                                                <input type="number" class="form-control disable" readonly id="frm_add_paciente_edad">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sexo<span class="text-danger ms-1">*</span></label>
                                                <select class="form-select" id="frm_add_paciente_sexo">
                                                    <option value="">Seleccionar</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">CURP</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_curp">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">NSS(Numero de seguro social)</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_nss">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Estado Civil</label>
                                                <select class="select" id="frm_add_paciente_estado_civil">
                                                    <option value="">Select</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Soltero">Soltero</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Sin definir">Sin definir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Ocupación</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_ocupacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Información de Contacto</h5>
                                </div>
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                                <input type="email" class="form-control" id="frm_add_paciente_email">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Teléfono</label>
                                                <input class="form-control" name="phone" type="tel" id="frm_add_paciente_telefono">
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Número de Emergencia</label>
                                                <input class="form-control" name="emergency_phone" type="text" id="frm_add_paciente_telefono_emergencia">
                                            </div>
                                        </div> -->
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contacto de Emergencia</label>
                                                <input class="form-control" name="emergency_contact" type="text" id="frm_add_paciente_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Direccion</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_direccion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger text-bg-danger alert-dismissible d-none" role="alert" id="error-message-container">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Error - </strong> <span id="error-message"></span>
                            </div>
                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                                <input type="hidden" id="paciente_id" value="">
                                <button type="button" class="btn btn-primary " id="save-basic-info" onclick="EditPacienteBasicInfo()">Continuar</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-wizard-content">
                        <form action="add-patient.php">
                            <div class="card pb-0">
                                <div class="card-header">
                                    <h5 class="mb-0">Antecedentes Médicos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Enfermedades Crónicas</label>
                                                <input class="form-control" name="chronic_diseases" type="text" id="frm_add_paciente_enfermedades_cronicas">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Hospitalizaciones Previas</label>
                                                <input class="form-control" name="previous_hospitalizations" type="text" id="frm_add_paciente_hospitalizaciones_previas">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Medicamentos actuales</label>
                                                <input class="form-control" name="current_medications" type="text" id="frm_add_paciente_medicamentos_actuales">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Alergias</label>
                                                <input class="form-control" name="allergies" type="text" id="frm_add_paciente_alergias">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Vacunas Recientes</label>
                                                <input class="form-control" name="recent_vaccinations" type="text" id="frm_add_paciente_vacunas_recientes">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Antecedentes Familiares</label>
                                                <input class="form-control" name="family_history" type="text" id="frm_add_paciente_antecedentes_familiares">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-6 d-flex align-items-center mb-3" style="height: 100%;">
                                            <div class="w-100 d-flex justify-content-between align-items-center" style="min-height: 80px;">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="frm_add_paciente_transfusiones">
                                                    <label class="form-check-label" for="frm_add_paciente_transfusiones">Transfusiones</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="frm_add_paciente_fuma">
                                                    <label class="form-check-label" for="frm_add_paciente_fuma">Fuma</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="frm_add_paciente_alcohol">
                                                    <label class="form-check-label" for="frm_add_paciente_alcohol">Alcohol</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="frm_add_paciente_apoyo_psicologico">
                                                    <label class="form-check-label" for="frm_add_paciente_apoyo_psicologico">Apoyo Psicologico</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Frecuencia Alcohol</label>
                                                <input class="form-control" name="frecuencia_alcohol" type="text" id="frm_add_paciente_frecuencia_alcohol">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Frecuencia Tabaco</label>
                                                <input class="form-control" name="frecuencia_tabaco" type="text" id="frm_add_paciente_frecuencia_tabaco">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sustancias Psicoactivas</label>
                                                <input class="form-control" name="frecuencia_sustancias_psicoactivas" type="text" id="frm_add_paciente_sustancias_psicoactivas">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Alimentacion</label>
                                                <input class="form-control" name="alimentacion" type="text" id="frm_add_paciente_alimentacion">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Actividad Fisica</label>
                                                <input class="form-control" name="actividad_fisica" type="text" id="frm_add_paciente_actividad_fisica">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-0">
                                                <label class="form-label">Notas</label>
                                                <textarea rows="4" class="form-control" placeholder="Notas" id="frm_add_paciente_notas"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                <button type="button" class="btn btn-white back-btn">Regresar</button>
                                <input type="hidden" id="paciente_historial_id" value="">
                                <button type="button" class="btn btn-primary" id="save-vitals" onclick="EditHistorialPaciente()">Guardar y Regresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- row end -->

        </div>
        <!-- End Content -->     

        <?php require_once '../partials/footer.php'; ?>

    </div>
    
    <!-- ========================
        End Page Content
    ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
         document.getElementById('frm_add_paciente_fecha_nacimiento').addEventListener('change', function() {
            const fechaNacimiento = this.value;
            const edad = calcularEdad(fechaNacimiento);
            document.getElementById('frm_add_paciente_edad').value = edad;
        });
    });

    function loadEvent() {
        const urlParams = new URLSearchParams(window.location.search);
        const pacienteIdEncoded = urlParams.get('b');
        if (pacienteIdEncoded) {
            const pacienteId = atob(pacienteIdEncoded);
            document.getElementById('paciente_id').value = pacienteId;
            loadPacienteInForm(pacienteId);
        }
    }
</script>
<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>