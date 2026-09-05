<?php

use App\Http\Controllers\Api\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('proyectos', ProyectoController::class);
