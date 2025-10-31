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
                <h4 class="mb-1"><?php if(!isset($_GET['e'])) { ?>Nuevo Kit de Consumibles<?php } else { ?>Editar Kit de Consumibles<?php } ?></h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><?php if(!isset($_GET['e'])) { ?>Nuevo Kit de Consumibles<?php } else { ?>Editar Kit de Consumibles<?php } ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>


        <?php include __DIR__ . '/../partials/loading-section.php'; ?>
        <div class="d-none" id="kit-form_container">
            <div id="kit-header" class="mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Información del Kit de Consumibles</h5>
                    </div>
                    <div class="card-body">
                        <form id="kitForm">
                            <div class="mb-3">
                                <label for="kit_nombre" class="form-label">Nombre del Kit</label>
                                <input type="text" class="form-control" id="kit_nombre" name="kit_nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="kit_descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="kit_descripcion" name="kit_descripcion" rows="1"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="hidden" id="kit_id" value="">
                                <button type="submit" class="btn btn-primary" onclick="GuardarKitConsumible()">Guardar</button>
                            </div>
                        </form>
            </div>
            <div id="kit-consumibles-details">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Consumibles en el Kit</h5>
                        <form class="p-2">
                            <div class="input-group">
                                <input type="hidden" id="selected_consumible_id" value="">
                                <input type="text" id="consumible_busqueda" class="form-control me-2" placeholder="Buscar consumible" style="width: 450px;">
                                <input type="number" id="consumible_cantidad" class="form-control me-2" placeholder="Cantidad" min="1" value="1">
                                <button type="button" class="btn btn-success" onclick="AgregarConsumibleAlKit()">Agregar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="kit_consumibles_container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Codigo Interno</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Unidad de Medida</th>
                                        <th>Cantidad A Utilizar</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="kit_consumibles_rows">
                                    <!-- Filas de consumibles se agregarán aquí dinámicamente -->
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php require_once '../partials/footer.php'; ?>
</div>

<!-- ========================
        End Page Content
    ========================= -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvents();
        const inputBuscarConsumible = document.getElementById("consumible_busqueda");
        const awesomplete = new Awesomplete(inputBuscarConsumible, {
            filter: () => { 
                return true;
            },
            sort: false,
            list: []
        });

        inputBuscarConsumible.addEventListener("input", async function() {

            const term = inputBuscarConsumible.value.trim();
            if (term.length < 2) return;

            const result = await getConsumibles(300, 1, term);
            if (result) {
                const onlyActiveItems= result.data.filter(c => c.es_activo);
                inputBuscarConsumible._consumibles = onlyActiveItems;
                const list = onlyActiveItems.map(m => m.codigo_interno+" - "+m.nombre);
                awesomplete.list = list;
            }
        });

        inputBuscarConsumible.addEventListener("awesomplete-selectcomplete", function(e) {
            const selectedName = e.text.value;
            const consumibles = inputBuscarConsumible._consumibles || [];
            const con = consumibles.find(m => m.codigo_interno+" - "+m.nombre === selectedName);

            if (con) {
                // Guarda el ID del consumible seleccionado
                document.getElementById("selected_consumible_id").value = con.id;
                // Puedes llenar otros campos aquí si lo necesitas
            }else {
                document.getElementById("selected_consumible_id").value = "";
            }
        });
    });

    function loadEvents(){
        const kit = "<?php echo isset($_GET['p']) ? $_GET['p'] : -1 ?>";
        if(kit === "-1") window.location.href = "kit-consumibles.php";
        LoadFormDataKitConsumible(kit);
    }
</script>

<?php
$content = ob_get_clean();
require_once '../partials/main.php';
