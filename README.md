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
