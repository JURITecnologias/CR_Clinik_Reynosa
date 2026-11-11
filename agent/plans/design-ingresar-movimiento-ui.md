## Plan: Diseño Movimientos Inventario Consumibles

Maquetar (solo UI, sin funcionalidad JS) las pantallas para capturar movimientos y ver detalle, siguiendo los patrones existentes del front: Page Header con breadcrumb, cards, input-groups, modal Bootstrap, tablas responsive y botones con iconos `ti`.

**Steps**
1. Confirmar patrones UI a replicar (referencias existentes)
   - Page Header/breadcrumb: usar el mismo wrapper `page-wrapper` → `content` → header con `.breadcrumb-arrow` y acciones a la derecha.
   - Input-groups: replicar `input-group` + `input-group-text` y botones anexos.
   - Tablas: usar `table-responsive` (y donde aplique `table-nowrap`), `table mb-0 border`, `thead.table-light`.
   - Modal: usar markup Bootstrap (`modal fade` → `modal-dialog` → `modal-content`), botón trigger con `data-bs-toggle="modal"`.

2. Diseñar la pantalla de captura en [front/src/registrar-movimiento-consumo.php](front/src/registrar-movimiento-consumo.php)
   - Mantener el Page Header existente.
   - Agregar un `row` principal con dos columnas:
     - Izquierda (form): `col-xl-3 col-lg-4` (equivalente a 3/12 en XL y 4/12 en LG para mantener legibilidad).
     - Derecha (tabla): `col-xl-9 col-lg-8`.
   - Columna izquierda: Card “Registrar movimiento” con formulario compacto:
     - Consumible:
       - Campo “Código interno” (readonly/placeholder) + botón con lupa que abre modal.
       - Campo “Nombre” (readonly/placeholder).
       - Input hidden `consumible_uuid`.
     - Tipo de movimiento: `select` con opciones: “Seleccione” value `-1`, “Entrada” `entrada`, “Salida” `salida`, “Ajuste” `ajuste`.
     - Cantidad de movimiento: input numérico con `min="0"` (sin negativos).
     - Botón principal: “Agregar movimiento”.
   - Columna derecha: Card “Movimientos capturados” con tabla mockup (HTML estático):
     - Columnas: Código Interno, Nombre, Unidad, Stock actual, Tipo de movimiento capturado, Movimiento capturado, Opciones.
     - En Opciones: botón “Eliminar” por fila (mockup).

3. Agregar modal de búsqueda de consumibles en [front/src/registrar-movimiento-consumo.php](front/src/registrar-movimiento-consumo.php)
   - Modal Bootstrap con `modal-dialog modal-lg` (decisión).
   - Contenido modal:
     - Barra de búsqueda (input + botón “Buscar”) para buscar por código interno o nombre (solo visual).
     - Tabla de consumibles mockup con columnas: Código Interno, Nombre, Unidad, Stock actual, Seleccionar.
     - Botón “Seleccionar” por fila (solo visual).

4. Diseñar pantalla de detalle en [front/src/detalle-movimiento-consumo.php](front/src/detalle-movimiento-consumo.php)
   - Ajustar el título (actualmente dice “Consulta”) a “Detalle Movimiento Consumible”.
   - Agregar Card “Detalle del movimiento” con campos básicos (placeholders/readonly):
     - Código interno, Nombre, Unidad, Tipo movimiento, Cantidad, Fecha.
   - Mantener el link de regreso existente.

5. Consistencia visual
   - Reusar clases existentes: `.card-header` + `.card-title`, `.mb-3`, `.form-label`, `.form-control`, `.btn btn-primary`, `.btn-outline-light`, iconos `ti`.
   - En tablas, usar el patrón de acciones del proyecto (botón simple o dropdown); para este requerimiento usar botón eliminar directo.

**Relevant files**
- [front/src/registrar-movimiento-consumo.php](front/src/registrar-movimiento-consumo.php) — maquetación 2 columnas, formulario, tabla mock, modal `modal-lg`.
- [front/src/detalle-movimiento-consumo.php](front/src/detalle-movimiento-consumo.php) — card de detalle con campos básicos.

**UI references (patterns to copy)**
- [front/src/form-input-groups.php](front/src/form-input-groups.php) — patrones de `input-group`.
- [front/src/tables-basic.php](front/src/tables-basic.php) — tablas básicas + dropdown.
- [front/src/consultas.php](front/src/consultas.php) — header + controles (registros/paginación) y tabla `table-responsive table-nowrap`.
- [front/src/add-doctors.php](front/src/add-doctors.php) — layout `col-xl-3/col-xl-9` tipo sidebar + contenido.

**Verification**
1. Abrir [front/src/registrar-movimiento-consumo.php](front/src/registrar-movimiento-consumo.php) en el navegador y validar:
   - En desktop: form a la izquierda, tabla a la derecha.
   - En móvil: columnas apiladas, sin desbordes.
   - Modal abre con el botón de lupa y muestra tabla mock.
2. Abrir [front/src/detalle-movimiento-consumo.php](front/src/detalle-movimiento-consumo.php) y validar que el card muestra los campos básicos y respeta el estilo de cards/forms.

**Decisions**
- Detalle: solo campos básicos (no el JSON completo) por ahora.
- Modal: usar `modal-lg`.
- Tabla derecha en registrar: solo mockup (sin JS funcional).
