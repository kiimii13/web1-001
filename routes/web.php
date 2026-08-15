<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('proyectos.index');
});

// Registro de usuario
Route::get('/registro', [AuthController::class, 'mostrarRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registro.store');

// Inicio de sesión
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get(
        '/proyectos/{proyecto}/eliminar',
        [ProyectoController::class, 'confirmDelete']
    )->name('proyectos.confirm-delete');

    Route::resource('proyectos', ProyectoController::class);
});
