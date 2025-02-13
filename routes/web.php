<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::get('/signup', function () {
    return view('authentication.signup');
})->name('signup');

Route::get('/patients', function () {
    return view('patients.lista');
})->name('signup');

Route::get('/patients/registro', function () {
    return view('patients.registrar_paciente');
})->name('signup');

Route::get('/documentation/', function () {
    return view('documentation');
})->name('signup');