<?php

ob_start(); ?>

<!-- ========================
        Start Page Content
    ========================= -->

<div class="page-wrapper">

    <!-- Start Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div class="breadcrumb-arrow">
                <h4 class="mb-1">Registrar Movimiento Consumible</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="inventario-consumibles.php">Inventario consumibles</a></li>
                        <li class="breadcrumb-item active">Registrar Movimiento Consumible</li>
                    </ol>
                </div>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <a href="inventario-consumibles.php" class="fw-medium d-flex align-items-center"><i class="ti ti-arrow-left me-1"></i>Regresar a Inventario Consumibles</a>
            </div>
        </div>

        <!-- End Page Header -->
        <div id="alert_placeholder" class="mb-3"></div>

        <div class="row g-4">
            <div class="col-xl-3 col-lg-4">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Registrar movimiento</div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Código interno</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Seleccione consumible" id="input_codigo_interno" readonly>
                                    <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalBuscarConsumible">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre del consumible" id="input_nombre" readonly>
                                <input type="hidden" name="consumible_uuid" id="input_consumible_uuid" value="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo de movimiento</label>
                                <select class="form-select" id="select_tipo_movimiento">
                                    <option value="-1">Seleccione</option>
                                    <option value="entrada">Entrada</option>
                                    <option value="salida">Salida</option>
                                    <option value="ajuste">Ajuste</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad</label>
                                <input type="number" class="form-control" min="0" placeholder="0" id="input_cantidad">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Motivo</label>
                                <input type="text" class="form-control" placeholder="Motivo del movimiento" id="input_motivo">
                            </div>
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary" onclick="AgregarItemMovimientoSessionStorage()">Agregar movimiento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="card-title mb-0">Movimientos capturados</div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <button type="button" class="btn btn-success" onclick="ShowConfirmacionProcesarMovimientos()">
                                <i class="ti ti-check me-1"></i>Procesar movimientos
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-none" id="loading_search_movimientos">
                            <div class="d-flex align-items-center justify-content-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0 border" id="table_movimientos_capturados">
                                <thead class="table-light">
                                    <tr>
                                        <th>Código Interno</th>
                                        <th>Nombre</th>
                                        <th>Unidad</th>
                                        <th>Stock actual</th>
                                        <th>Tipo capturado</th>
                                        <th>Movimiento capturado</th>
                                        <th>Motivo</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>CNS-001</td>
                                        <td>Guantes quirúrgicos</td>
                                        <td>Caja</td>
                                        <td>120</td>
                                        <td><span class="badge bg-success-subtle text-success">Entrada</span></td>
                                        <td>+30</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-danger btn-sm" type="button"><i class="ti ti-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CNS-014</td>
                                        <td>Vendas elásticas</td>
                                        <td>Paquete</td>
                                        <td>60</td>
                                        <td><span class="badge bg-warning-subtle text-warning">Ajuste</span></td>
                                        <td>-4</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-danger btn-sm" type="button"><i class="ti ti-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CNS-030</td>
                                        <td>Jeringas 5ml</td>
                                        <td>Unidad</td>
                                        <td>250</td>
                                        <td><span class="badge bg-danger-subtle text-danger">Salida</span></td>
                                        <td>-50</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-danger btn-sm" type="button"><i class="ti ti-trash"></i></button>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalBuscarConsumible" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar consumible</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Buscar por código o nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ej. CNS-001 o Guantes" id="input_search_consumables">
                        <button class="btn btn-primary" type="button" onclick="searchConsumablesInModal()"><i class="ti ti-search me-1"></i>Buscar</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="d-none" id="loading_search">
                        <div class="d-flex align-items-center justify-content-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-nowrap mb-0 border d-none" id="table_search_results">
                        <thead class="table-light">
                            <tr>
                                <th>Código Interno</th>
                                <th>Nombre</th>
                                <th>Unidad</th>
                                <th>Stock actual</th>
                                <th class="text-center">Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div id="modalProcesarMovimientos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalProcesarMovimientosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-danger border-0">
                <h4 class="modal-title" id="modalProcesarMovimientosLabel">Procesar movimientos</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">¿Está seguro de que desea procesar estos movimientos?</h5>
                <p>Esta acción no se puede deshacer. </p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="categoria_id_eliminar" value="">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="ProcesarMovimientosCapturados()">Procesar</button>
            </div>
        </div> <!-- end modal content -->
    </div> <!-- end modal dialog -->
</div> <!-- end modal -->



<?php require_once '../partials/footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadEvent();
    });


    function loadEvent() {
        LoadTableMovimientosCapturados();
    }
</script>

<!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php'; ?>