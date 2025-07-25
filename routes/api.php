<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ProyectoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//post
//Route::post('post', [RutaController::class, 'post']);

//get proyecto
//Route::get('proyecto/{id}', [ProyectoController::class, 'show']);

//post proyecto
Route::post('proyecto', [ProyectoController::class, 'post']);

//patch por id
Route::patch('proyecto/{id}', [ProyectoController::class, 'update']);

//delete por id
Route::delete('proyecto/{id}', [ProyectoController::class, 'delete']);



//get por id
//Route::get('proyecto/{id}', [ProyectoController::class, 'show']);


// get all proyectos
//Route::get('proyecto', [ProyectoController::class, 'get']);

// ruta para el controlador ProyectoController
//Route::get('proyecto', [ProyectoController::class, 'get']);