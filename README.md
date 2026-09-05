# IPSS_WEB1-001

Proyecto desarrollado para la asignatura **Desarrollo Web I** utilizando Laravel.

El proyecto corresponde a un sistema básico de gestión de proyectos y ha sido construido progresivamente durante las evaluaciones del ramo.

## Evaluación 1

En la primera evaluación se construyó la estructura inicial de la aplicación y se trabajó principalmente con información simulada dentro del proyecto.

Se implementaron:

* Rutas para la gestión de proyectos.
* Controlador `ProyectoController`.
* Modelo `Proyecto` con datos estáticos.
* Listado de proyectos.
* Visualización individual de proyectos.
* Creación simulada de proyectos.
* Actualización simulada de proyectos.
* Eliminación simulada de proyectos.
* Validación de formularios.
* Uso de vistas Blade.
* Layout general reutilizable.
* Consulta simulada del valor de la UF.
* Campos como nombre, fecha de inicio, estado, responsable y monto.

En esta etapa los proyectos todavía no tenían persistencia real en una base de datos, ya que los datos eran definidos directamente dentro del modelo.

## Evaluación 2

En la segunda evaluación se evolucionó el proyecto para utilizar persistencia real, autenticación de usuarios y conexión con MySQL.

### Base de datos

Se configuró Laravel para conectarse a una base de datos MySQL llamada:

`desarrollo_software_1`

La configuración correspondiente fue incorporada tanto en:

* `.env`
* `.env.example`

Las principales tablas utilizadas son:

* `users`
* `proyectos`

### Eloquent ORM

El modelo `Proyecto` dejó de trabajar con datos estáticos y pasó a utilizar **Eloquent ORM**.

Esto permite trabajar con la tabla `proyectos` de MySQL mediante métodos de Laravel como:

* `Proyecto::all()`
* `Proyecto::create()`
* `Proyecto::findOrFail()`
* `$proyecto->update()`
* `$proyecto->delete()`

De esta manera, los proyectos poseen persistencia real en la base de datos.

### Registro de usuarios

Se implementó un formulario de registro que permite ingresar:

* Nombre
* Correo
* Clave

La clave se almacena de forma segura utilizando:

`bcrypt()`

Después del registro, el usuario queda autenticado automáticamente en la aplicación.

### Inicio de sesión

Se implementó un formulario de inicio de sesión que valida:

* Correo
* Clave

La clave ingresada se compara con el hash almacenado mediante `Hash::check()`.

### Middleware de autenticación

Las rutas asociadas a la gestión de proyectos fueron protegidas mediante el middleware:

`auth`

Esto impide que un usuario sin sesión iniciada pueda acceder directamente al módulo de proyectos.

### Cierre de sesión

Se agregó la funcionalidad de cierre de sesión utilizando `Auth::logout()` y la invalidación de la sesión actual.

### Asociación de proyectos con usuarios

La tabla `proyectos` incorpora el campo:

`created_by`

Este campo almacena el ID del usuario autenticado que creó cada proyecto.

### Mejoras visuales

Se incorporaron mejoras visuales utilizando **Tailwind CSS** de manera básica.

Se mejoraron principalmente:

* Layout general.
* Navegación.
* Tabla de proyectos.
* Inicio de sesión.
* Registro de usuarios.
* Botones y mensajes.
* Uso de una línea visual basada en tonos verdes.

## Tecnologías utilizadas

* PHP
* Laravel
* MySQL
* Eloquent ORM
* Blade
* Tailwind CSS
* Vite
* Laragon
* Git
* GitHub
* Visual Studio Code

## Control de versiones

El proyecto mantiene la versión anterior en la rama principal:

`main`

El desarrollo correspondiente a la Evaluación 2 se encuentra en:

`evaluacion-2`

## Objetivo académico

El proyecto permite comprender de manera progresiva cómo una aplicación Laravel pasa desde una estructura con datos simulados a una aplicación conectada a una base de datos real, incorporando persistencia, modelos Eloquent, autenticación, seguridad básica y control de acceso.

## Evaluación 3

En la tercera evaluación se desarrolló una **API RESTful** para administrar los proyectos almacenados en MySQL.

La API funciona de forma independiente de las vistas Blade y responde con datos en formato JSON.

Para mantener la aplicación anterior, se conservaron dos controladores:

```text
app/Http/Controllers/ProyectoController.php
app/Http/Controllers/Api/ProyectoController.php
```

El primero administra las vistas web y el segundo procesa las solicitudes de la API.

### Rutas de la API

Las rutas se encuentran definidas en:

```text
routes/api.php
```

Laravel las registra con el prefijo automático `/api`.

| Método   | Endpoint              | Descripción                    | Respuesta exitosa |
| -------- | --------------------- | ------------------------------ | ----------------- |
| `GET`    | `/api/proyectos`      | Lista todos los proyectos      | `200 OK`          |
| `POST`   | `/api/proyectos`      | Crea un proyecto               | `201 Created`     |
| `GET`    | `/api/proyectos/{id}` | Busca un proyecto por ID       | `200 OK`          |
| `PUT`    | `/api/proyectos/{id}` | Actualiza un proyecto completo | `200 OK`          |
| `DELETE` | `/api/proyectos/{id}` | Elimina un proyecto            | `204 No Content`  |

### Campos del proyecto

Para crear o actualizar un proyecto se utilizan los siguientes campos:

```json
{
    "nombre": "Implementación API REST",
    "fecha_inicio": "2026-09-10",
    "estado": "En desarrollo",
    "responsable": "Kim",
    "monto": 1250000,
    "created_by": 1
}
```

El campo `created_by` debe contener el ID de un usuario existente en la tabla `users`.

### Validaciones

La API verifica que:

* Todos los campos estén presentes.
* Los campos obligatorios no estén vacíos.
* `nombre`, `estado` y `responsable` sean textos válidos.
* `fecha_inicio` contenga una fecha válida.
* `monto` sea numérico y no negativo.
* `created_by` corresponda a un usuario existente.

Cuando los datos no cumplen las validaciones, Laravel responde con:

```text
422 Unprocessable Content
```

### Códigos HTTP utilizados

| Código | Significado                                      |
| ------ | ------------------------------------------------ |
| `200`  | Consulta o actualización realizada correctamente |
| `201`  | Proyecto creado correctamente                    |
| `204`  | Proyecto eliminado; respuesta sin contenido      |
| `404`  | Proyecto no encontrado                           |
| `422`  | Datos recibidos que no cumplen las validaciones  |


### Pruebas y evidencias

Las operaciones de la API fueron verificadas mediante Postman.

La colección exportada se encuentra en:

```text
docs/postman/Evaluacion-3-API-Proyectos.postman_collection.json
```

Esta colección permite ejecutar las solicitudes utilizadas para:

* Listar proyectos.
* Crear proyectos.
* Buscar proyectos por ID.
* Actualizar proyectos.
* Eliminar proyectos.
* Comprobar respuestas `404`.
* Comprobar las validaciones y la respuesta `422`.

Las capturas de las pruebas realizadas, junto con sus resultados y códigos HTTP, se encuentran en:

```text
docs/postman/Eva3_cerda_kimberly.pdf
```

Para recibir correctamente las respuestas de error en formato JSON, las solicitudes incluyen:

```text
Accept: application/json
```

Las solicitudes que envían datos también utilizan:

```text
Content-Type: application/json
```

## Ejecución del proyecto

### Requisitos

* PHP 8.2 o superior.
* Composer.
* MySQL.
* Node.js y npm.
* Laragon u otro servidor local compatible.

### Preparación

Instalar las dependencias de PHP:

```bash
composer install
```

Instalar las dependencias del frontend:

```bash
npm install
```

Crear el archivo de configuración local:

```bash
copy .env.example .env
```

Generar la clave de Laravel:

```bash
php artisan key:generate
```

Configurar la conexión con MySQL en `.env` y ejecutar las migraciones:

```bash
php artisan migrate
```

Compilar los recursos visuales:

```bash
npm run build
```

### Dirección local

En el entorno utilizado durante el desarrollo, la aplicación web se ejecuta en:

```text
http://ipss-web1-001.test:8085
```

Durante la ejecución local, la API puede consultarse mediante:

```text
http://ipss-web1-001.test:8085/api/proyectos
```

El dominio y el puerto pueden variar según la configuración del servidor local. Esta dirección no corresponde a una publicación en Internet.

## Tecnologías utilizadas

* PHP
* Laravel 11
* MySQL
* Eloquent ORM
* API RESTful
* JSON
* Blade
* Tailwind CSS
* Vite
* Postman
* Laragon
* Git
* GitHub
* Visual Studio Code

## Control de versiones

El proyecto conserva cada etapa en una rama independiente:

* `main`: versión inicial del proyecto.
* `evaluacion-2`: persistencia, autenticación y mejoras visuales.
* `evaluacion-3-api`: API RESTful y operaciones CRUD mediante HTTP.

## Objetivo académico

El proyecto permite comprender progresivamente cómo una aplicación Laravel evoluciona desde datos simulados hacia una aplicación conectada a MySQL, con persistencia, autenticación, vistas web y una API RESTful.

La Evaluación 3 permite aplicar rutas API, controladores, modelos Eloquent, validaciones, respuestas JSON y códigos HTTP adecuados para crear, consultar, actualizar y eliminar información.
