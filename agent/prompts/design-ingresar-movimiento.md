
## Requisito

primero revisa y capta el diseño de las paginas para que veas como se crea los componentes y estilos a utilizar:

front/src/form-basic-inputs.php
front/src/ui-buttons.php
front/src/tables-basic.php
front/src/form-input-groups.php

## Requerimientos
necesitamos hacer unas pantallas para registrar movimientos de inventarios y ver el detalle de inventario, para esto vamos a utilizar las paginas :

## Diseño
la pantalla se dividira en dos partes, la parte derecha contendra la lista de movimientos capturados, de lado izquierdo el formulario
en la pagina registrar-movimiento-consumo.php aqui tiene que ir el diseño. el formulario no bebe ser tan grande. solo que ocupe 3 terceras partes de 12 en bootstrap y la otra parte la tabla de los movimientos.

## Formulario de captura
n formulario para dar entrada, salida o reajuste de material,  el formulario deberia de tener:
- consumible: estos campos debe tener una lupa para abrir un modal y buscar los consumibles por codigo interno o nombre de consumible y  tener un boton de buscar en el modal tambien tendra una tabla para mostrar los consumibles la tabla mostrara :
    1. Codigo Interno
    2. Nombre 
    3.Unidad 
    4. Stock actual
    5. un boton para seleccionar el consumible. 
por el momento solo necesitamos diseñar la pantalla asi que mete ejemplos y placeholders.
una vez seleccionado este se pondra en el formulario, en el formulario debemos presentar 3 campos
Codigo interno, nombre de consumible y en input type hiden uuid del consumible. 

- Tipo de movimieto: este sera un select con tres opciones
0. Selecciones la opcion  value: -1
1. Entrada value: entrada
2. Salida vale: 'salida'
3. Ajuste value: 'ajuste'

-Cantidad de movimiento: un input tipo numerico que no acepte negativos.

y el boton de procesar.

asi quedaria el formulario:

Llenado por el Usuario:
Codigo interno:
Nombre:
Tipo de movimiento:
Cantidad de movimiento:

Boton : Agregar movimiento
Escondidos:
consumible_uuid

## Tabla de movimientos capturados
En la tabla debe de contener las columnas:

Codigo Interno
Nombre de cosumible
Unidad
Stock actual
Tipo de movimiento capturado
Movimiento capturado
Opciones

aqui llenara la informacion que se vaya capturando.

esta en los registros en la columna  de opciones tendra un boton de eliminar.

## Notas

- Solo se requiere el diseño de la pantalla no funcionalidad en js se requiere por el momento
- poner mockup data para ver como se ve la tabla
- utilizar los patrones que se vienen manejando con las pantallas (utilizar referencias en  front/src/orden-clinica.php, front/src/add-doctors.php, usuarios-settings.php)



