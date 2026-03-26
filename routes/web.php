<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\StockMedicamentoController;
use App\Http\Controllers\RecetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('paises', PaisController::class);
Route::resource('ciudades', CiudadController::class);
Route::resource('sedes', SedeController::class);
Route::resource('roles', RolController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('modulos', ModuloController::class);
Route::patch('modulos/{modulo}/toggle-estado', [ModuloController::class, 'toggleEstado'])->name('modulos.toggle-estado');
Route::resource('turnos', TurnoController::class);
Route::resource('medicamentos', MedicamentoController::class);
Route::resource('stock-medicamentos', StockMedicamentoController::class);
Route::resource('recetas', RecetaController::class);
