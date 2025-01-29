<?php


use Illuminate\Support\Facades\Route;

// Ruta para el Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para Pacientes
Route::get('/pacientes', [\App\Http\Controllers\PatientController::class, 'index'])->name('pacientes.index');

// Ruta para el Registro de Pacientes
Route::get('/pacientes/registro', [\App\Http\Controllers\PatientController::class, 'registro'])->name('pacientes.registro');

// Ruta para el Login
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');

// Ruta para el Registro de Usuarios
Route::get('/registro', [\App\Http\Controllers\UserController::class, 'registro'])->name('registro');
