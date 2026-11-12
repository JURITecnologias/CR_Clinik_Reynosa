# Entorno local con Docker

Desde la raíz del repositorio:

```sh
docker compose up --build -d
docker compose ps
```

El frontend queda en `http://localhost:8080/login.php` y la API en
`http://localhost:8080/bkend/public/api`. El puerto se cambia con
`CLINIK_HTTP_PORT`. La base MySQL usa un volumen local. Las contraseñas de
desarrollo se pueden cambiar con `CLINIK_DB_PASSWORD` y
`CLINIK_DB_ROOT_PASSWORD`; para una clave de aplicación estable, definir
`CLINIK_APP_KEY`.

Prueba básica desde PowerShell (usar el puerto configurado):

```powershell
(Invoke-WebRequest http://localhost:8080/login.php).StatusCode
(Invoke-WebRequest http://localhost:8080/bkend/public/).StatusCode
docker compose ps
```

Las dos respuestas HTTP deben ser `200` y `app` debe figurar como saludable.
Las rutas clínicas requieren autenticación y datos de prueba; esta comprobación
solo verifica que los dos sitios PHP se sirven desde el contenedor.

En una base nueva, ejecutar las migraciones explícitamente:

```sh
docker compose exec app php artisan migrate --force
```

No se cargan usuarios ni datos clínicos automáticamente. Para detener los
servicios sin borrar la base:

```sh
docker compose down
```
