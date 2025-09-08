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
                <h4 class="mb-1">Pacientes</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Agregar Paciente</li>
                    </ol>
                </div>
            </div>
            <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Volver a Pacientes</a>
        </div>
        <!-- End Page Header -->

        <!-- row start -->
        <div class="row vertical-tab">
            <div class="col-xl-3 col-lg-4">
                <div class="nav flex-column nav-pills vertical-tab mb-lg-0 mb-4">
                    <button class="nav-link active fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-info-circle fs-16 me-2"></i>Información Básica</button>
                    <!-- <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-vector-spline fs-16 me-2"></i>Signos Vitales</button> -->
                    <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-files fs-16 me-2"></i>Antecedentes Médicos</button>
                    <!-- <button class="nav-link fw-medium d-flex align-items-center rounded"><span></span><i class="ti ti-vaccine fs-16 me-2"></i>Quejas</button> -->
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
                                    <!-- <div class="mb-3">
                                            <label class="form-label">Profile Image<span class="text-danger ms-1">*</span>  </label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="position-relative d-flex align-items-center border rounded">
                                                        <img src="assets/img/avatars/avatar-39.jpg" class="avatar avatar-xxl" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex flex-column align-items-start">
                                                    <div class="d-inline-flex align-items-start gap-2 flex-wrap">
                                                        <div class="drag-upload-btn btn btn-dark position-relative mb-2">
                                                            <i class="ti ti-arrows-exchange-2 me-1"></i>Change Image
                                                            <input type="file" class="form-control image-sign" multiple="">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-danger d-flex align-items-center gap-1"> <i class="ti ti-trash"></i>  Remove</a>
                                                        </div>
                                                    </div>
                                                    <span class="fs-13 text-body">Use JPEG, PNG, or GIF. Best size: 200x200 pixels. Keep it under 5MB</span>
                                                </div>
                                            </div>
                                        </div> -->
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
                                        <!-- <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Telefono</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_telefono">
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_direccion">
                                            </div>
                                        </div> -->
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
                                        <!-- <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ID</label>
                                                    <input type="text" class="form-control" value="#PT0005" disabled>
                                                </div>
                                            </div> -->
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
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Número de Emergencia</label>
                                                <input class="form-control" name="emergency_phone" type="text" id="frm_add_paciente_telefono_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contacto de Emergencia</label>
                                                <input class="form-control" name="emergency_contact" type="text" id="frm_add_paciente_contacto_emergencia">
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Direccion</label>
                                                <input type="text" class="form-control" id="frm_add_paciente_direccion">
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Country<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>United States</option>
                                                        <option>India</option>
                                                        <option>Canada</option>
                                                        <option>Germany</option>
                                                        <option>Brazil</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Los Angeles</option>
                                                        <option>San Francisco</option>
                                                        <option>San Jose</option>
                                                        <option>Fresno</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">State</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>California</option>
                                                        <option>Texas</option>
                                                        <option>New York</option>
                                                        <option>Florida</option>
                                                        <option>Illinois</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pin Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Referral Doctor’s Info</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Referred By<span class="text-danger ms-1">*</span></label>
                                                    <select class="select2" data-toggle="select2">
                                                        <option>Select</option>
                                                        <option>Dr. Andrew Clark</option>
                                                        <option>Dr. Katherine Brooks</option>
                                                        <option>Dr. Benjamin Harris</option>
                                                        <option>Dr. Laura Mitchell</option>
                                                        <option>Dr. Christopher Lewis</option>
                                                        <option>Dr. Natalie Foster</option>
                                                        <option>Dr. Jonathan Adams</option>
                                                        <option>Dr. Rebecca Scott</option>
                                                        <option>Dr. Samuel Turner</option>
                                                        <option>Dr. Victoria Evans</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Referred On<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group w-auto input-group-flat">
                                                        <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                        <span class="input-group-text">
                                                            <i class="ti ti-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Department<span class="text-danger ms-1">*</span></label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Anaesthesiology</option>
                                                        <option>Dental Surgery</option>
                                                        <option>Dermatology</option>
                                                        <option>ENT Surgery</option>
                                                        <option>General Medicine</option>
                                                        <option>Ophthalmology</option>
                                                        <option>Orthopaedics</option>
                                                        <option>Pediatrics </option>
                                                        <option>Radiology</option>
                                                        <option>Cardiology</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Other Information</h5>
                                    </div>
                                    <div class="card-body pb-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Notes if any</label>
                                                    <textarea rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <div class="alert alert-danger text-bg-danger alert-dismissible d-none" role="alert" id="error-message-container">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Error - </strong> <span id="error-message"></span>
                            </div>
                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                <?php include __DIR__ . '/../partials/loading-section.php'; ?>
                                <button type="button" class="btn btn-primary " id="save-basic-info" onclick="ValidaYContinuaHistoral()">Continuar</button>
                            </div>
                        </form>

                    </div>

                    <!-- vituals -->
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
                                <button type="button" class="btn btn-primary" id="save-vitals" onclick="AddPacienteAndHistorial()">Guardar y Agregar Paciente</button>
                            </div>
                        </form>
                    </div>

                    <!-- medical history -->
                    <div class="form-wizard-content">
                        <form action="add-patient.php">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Medical History</h5>
                                </div>
                                <div class="card-body">
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Allergy</option>
                                                    <option>Fever</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Reason</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Illness</label>
                                                <div class="input-group w-auto input-group-flat">
                                                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                    <span class="input-group-text">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Hospital Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Assessment done if any</label>
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Notes</label>
                                                <textarea rows="4" class="form-control" placeholder="Add Notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="mt-4 pt-4 border-top"></div>

                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Allergy</option>
                                                    <option>Fever</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Reason</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Illness</label>
                                                <div class="input-group w-auto input-group-flat">
                                                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" placeholder="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                    <span class="input-group-text">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Hospital Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Assessment done if any</label>
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label class="form-label">Notes</label>
                                                <textarea rows="4" class="form-control" placeholder="Add Notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="mt-4 pt-4 border-top">
                                        <a href="javascript:void(0);" class="text-orange d-linline-flex align-items-center gap-1 fw-medium"> <i class="ti ti-plus"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                <button type="button" class="btn btn-white back-btn">Back</button>
                                <button type="button" class="btn btn-primary next-tab-btn" id="save-medical-history">Save & Add Complaints</button>
                            </div>
                        </form>
                    </div>

                    <!-- complaints -->
                    <div class="form-wizard-content">
                        <form>
                            <div class="card pb-0">
                                <div class="card-header">
                                    <h5 class="mb-0">Complaints</h5>
                                </div>
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Patients Overall Health Condition</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Very Poor</option>
                                                    <option>Poor</option>
                                                    <option>Fair</option>
                                                    <option>Good</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheck4" checked>
                                                    <label class="form-check-label form-label mb-0" for="customCheck4">Does patient have any health Condition</label>
                                                </div>
                                                <input class="form-control" value="Fever, Cough, Headache">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="customCheck8" checked>
                                                    <label class="form-check-label form-label mb-0" for="customCheck8">Allergies if any Before</label>
                                                </div>
                                                <input class="form-control" value="Sore Throat">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end flex-wrap align-items-center gap-2">
                                <button type="button" class="btn btn-white back-btn">Back</button>
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">Save & Confirm</a>
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

    }
</script>
<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>