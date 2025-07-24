<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;


Route::get('/', function () {
    return view('welcome');
});

// ruta para el controlador RutaController
Route::get('get', [RutaController::class, 'get']);
Route::get('/usuario/{nombre}/{email}/{telefono}', [RutaController::class, 'usuario']);
Route::get('/nuevo/{nombre}/{email}/{telefono}', [RutaController::class, 'nuevo']);


//post
Route::post('post', [RutaController::class, 'post']);



