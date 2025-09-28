<?php ob_start();?>

    <!-- ========================
        Inicio del Contenido de la Página
    ========================= -->

    <div class="page-wrapper">

        <!-- Inicio del Contenido -->
        <div class="content">

            <!-- Encabezado de Página -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div class="breadcrumb-arrow">
                    <h4 class="mb-1">Detalles del Paciente</h4>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>                            
                            <li class="breadcrumb-item active">Detalles del Paciente</li>
                        </ol>
                    </div>
                </div>
                <a href="patients.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Volver a Pacientes</a>
            </div>
            <!-- Fin Encabezado de Página -->
            <div id="alert_placeholder" class="mb-3"></div>
            <!-- inicio pestañas -->
                <ul class="nav nav-tabs nav-item-primary mb-3 border-bottom pb-4 mb-4 d-flex align-items-center gap-2">
                <li class="nav-item">
                    <a href="paciente-detalle.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Perfil del Paciente
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="paciente-consultas-previas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold active">
                        Consultas Previas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="paciente-citas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Citas programadas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="paciente-ordenes-clinicas.php?b=<?php echo  $_GET['b']; ?>" class="nav-link border rounded fw-semibold">
                        Ordenes Clinicas
                    </a>
                </li>
            </ul>
            <!-- fin pestañas -->
             <?php include __DIR__ . '/../partials/loading-section.php'; ?>

            <!-- inicio fila -->
            <div class="row d-none" id="patient-detail-container">
                <div class="accordion" id="ultimas-consultas-accordion"></div>
            </div>
            <!-- fin fila -->

        </div>
        <!-- Fin del Contenido -->     

        <?php require_once '../partials/footer.php'; ?>

    </div>
    
    <!-- ========================
        Fin del Contenido de la Página
    ========================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });

    function loadEvent() {
        const urlParams = new URLSearchParams(window.location.search);
        const pacienteIdEncoded = urlParams.get('b');
        if (pacienteIdEncoded) {
            const pacienteId = atob(pacienteIdEncoded);
            console.log('ID del paciente decodificado:', pacienteId);
            LoadConsultasPreviasPaciente(pacienteId);
        }
    }
</script>
<?php
$content = ob_get_clean();

require_once '../partials/main.php';