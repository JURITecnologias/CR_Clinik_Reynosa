Ahora realizaremos el diseño del modulo de inventario.

## Requerimiento

primero revisa y capta el diseño de las paginas para que veas como se crea los componentes y estilos a utilizar:

front/src/form-basic-inputs.php
front/src/ui-buttons.php
front/src/tables-basic.php
front/src/form-input-groups.php

## Requerimiento 

ahora necesitamos crear una interface para poder dar entrada, salida y ajuste de consumibles, en la misma pantalla que se pueda realizar busquedas asi que agregemos una barra de search en la parte superios y necesitamos una tabla que muestre los movimeintos de consumibles a la fecha de hoy
ose ejemplo del 2026-03-15 al 2026-03-16 que tambien se puedan escojer la fecha y un boton de buscar, la tabla va a constar de los siguientes columnas

Codigo interno, nombre, unidad de medida, tipo movimiento, cantidad anterior, cantidad nueva, stock actual, fecha de movimiento(created at)

y un boton de  'ver detalle'


** referencia ** 
{
            "id": 6,
            "consumible_id": 3,
            "tipo_movimiento": "entrada",
            "cantidad": 10,
            "cantidad_anterior": 70,
            "cantidad_nueva": 80,
            "precio_unitario": "0.00",
            "costo_unitario": "0.00",
            "motivo": "Compra de insumos",
            "referencia_tipo": "compra",
            "referencia_id": 123,
            "user_id": 1,
            "created_at": "2026-03-15 20:33:29",
            "updated_at": "2026-03-15 20:33:29",
            "deleted_at": null,
            "consumible": {
                "id": 3,
                "categoria_id": 5,
                "created_at": "2025-10-14T01:55:38.000000Z",
                "updated_at": "2026-03-16T02:33:29.000000Z",
                "codigo_interno": "CON-001",
                "nombre": "Guantes de látex",
                "descripcion": "Guantes desechables para procedimientos médicos.",
                "unidad_medida": "caja",
                "stock_actual": 80,
                "stock_minimo": 20,
                "precio_unitario_promedio": "0.00",
                "costo_unitario_promedio": "0.00",
                "es_activo": 0,
                "uuid": "d7489957-707b-4a83-ae4a-2c190d1141f6",
                "deleted_at": null
            }
        },

*******

revisa la pagina de consultas.php y busca el elemento por id basic-addon1 el cual sirve para mostrar el total de registros
tambien dale una revisada al elementpo por id pagination_control el cual es el control del paginado 

agregemos un boton que diga realizar movimiento de inventario. el cuial va a llegar a otra pagina para llenar la informacion.

Se usara la pagina creada front/src/inventario-consumibles.php la cual ya tiene la base para trabajar.

