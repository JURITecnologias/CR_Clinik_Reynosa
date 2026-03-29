realizaremos el issue 28, ademas de ese contexto realizemos los cambios de la siguiente manera:

## PLAN
1. RESTAPI endpoints.
primero crearemos la capa de datos y servicios, despues crearemos el controlador y la ruta para la restAPI de inventarios


## Tareas
1. se requiere una tabla de control de inventario asi como el registro de entradas y salidas, se tiene que crear 
las migraciones en el backend/api-consulmdregister el cual tiene que estar relacionado con el modelo consumible(app/models/consumible) asi es la tabla en MySQL
{
	"table": "TablaDesconocida",
	"rows":
	[
		{
			"Field": "id",
			"Type": "bigint unsigned",
			"Null": "NO",
			"Key": "PRI",
			"Default": null,
			"Extra": "auto_increment"
		},
		{
			"Field": "categoria_id",
			"Type": "bigint unsigned",
			"Null": "YES",
			"Key": "MUL",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "created_at",
			"Type": "timestamp",
			"Null": "YES",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "updated_at",
			"Type": "timestamp",
			"Null": "YES",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "codigo_interno",
			"Type": "varchar(255)",
			"Null": "NO",
			"Key": "UNI",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "nombre",
			"Type": "varchar(255)",
			"Null": "NO",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "descripcion",
			"Type": "text",
			"Null": "YES",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "unidad_medida",
			"Type": "varchar(255)",
			"Null": "NO",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "stock_actual",
			"Type": "int",
			"Null": "NO",
			"Key": "",
			"Default": "0",
			"Extra": ""
		},
		{
			"Field": "stock_minimo",
			"Type": "int",
			"Null": "NO",
			"Key": "",
			"Default": "0",
			"Extra": ""
		},
		{
			"Field": "precio_unitario_promedio",
			"Type": "decimal(8,2)",
			"Null": "NO",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "costo_unitario_promedio",
			"Type": "decimal(8,2)",
			"Null": "NO",
			"Key": "",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "es_activo",
			"Type": "tinyint(1)",
			"Null": "NO",
			"Key": "",
			"Default": "1",
			"Extra": ""
		},
		{
			"Field": "uuid",
			"Type": "char(36)",
			"Null": "NO",
			"Key": "UNI",
			"Default": null,
			"Extra": ""
		},
		{
			"Field": "deleted_at",
			"Type": "timestamp",
			"Null": "YES",
			"Key": "",
			"Default": null,
			"Extra": ""
		}
	]
}
Debera controlar entradas, salidas y el inventario actual tambein en las transacciones de entradas y salidas registraremos el precio y costo unitario promedio el cual sale de la tabla anterior esto con el registrar el precio promedio. 
2. crear los models en app/models
3. Crear un servicio en app/services con las transacciones de entrada, salida y ajuste de inventarios
4. Crear controlador app/http/controllers, este debe de los metodos para poder ver los movimientos, uno que liste todos los movimientos y que lo podamos filtrar por fecha inicio y fecha fin, otro para ver el detalle del movimiento.
5. para las rutas (routes/api.php) tendemos  que usar el patron similar que se esta urilizando para la authenticacion,
roles y permisos. el rol seria check:Main|Admon para 'escribir', 'modificar' y 'borrar' para acciones de post, patch, put, delete.
el permiso de 'ver'   no contiene rol solo que tenga el permiso y para los metodos de get.

