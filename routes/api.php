<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SedeController;
use App\Http\Controllers\Api\DosisController;
use App\Http\Controllers\Api\MedicamentoController;
use App\Http\Controllers\Api\UsuarioController;

Route::get('/', function () {
    return 'Hello World';
    //EN LARAVEL: php artisan serve --port=8000
    //EN POSTMAN: http://localhost:8000/api
});

Route::get('/sedes', [SedeController::class, 'index']); // 

Route::get('/dosis', [DosisController::class, 'index']); // Obtener todas las dosis
Route::post('/dosis', [DosisController::class, 'store']); // Crear una nueva dosis
Route::get('/dosis/{id}', [DosisController::class, 'show']); // Obtener una dosis específica
Route::put('/dosis/{id}', [DosisController::class, 'update']); // Actualizar una dosis
Route::delete('/dosis/{id}', [DosisController::class, 'destroy']); // Eliminar una dosis

Route::get('/usuarios', [UsuarioController::class, 'index']); // Obtener todos los usuarios
Route::post('/usuarios', [UsuarioController::class, 'store']); // Crear un nuevo usuario
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']); // Obtener un usuario específico
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']); // Actualizar un usuario
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']); // Eliminar un usuario

Route::get('/medicamentos', [MedicamentoController::class, 'index']); 
Route::post('/medicamentos', [MedicamentoController::class, 'store']); 
Route::get('/medicamentos/{id}', [MedicamentoController::class, 'show']);
Route::put('/medicamentos/{id}', [MedicamentoController::class, 'update']); 
Route::delete('/medicamentos/{id}', [MedicamentoController::class, 'destroy']);
