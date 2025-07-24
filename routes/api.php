<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ruta para el controlador RutaController
Route::get('get', [RutaController::class, 'get']);

//post
Route::post('post', [RutaController::class, 'post']);