<?php

use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('proyectos.index');
});

Route::get(
    '/proyectos/{proyecto}/eliminar',
    [ProyectoController::class, 'confirmDelete']
)->name('proyectos.confirm-delete');

Route::resource('proyectos', ProyectoController::class);
