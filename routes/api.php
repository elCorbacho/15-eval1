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


//---------------------------------------
// RUTAS TIPO API
//---------------------------------------
//get proyecto
Route::get('proyecto', [ProyectoController::class, 'get']);
//post
Route::post('proyecto', [ProyectoController::class, 'post']);
//delete por id
Route::delete('proyecto/{id}', [ProyectoController::class, 'delete']);
//patch por id
Route::patch('proyecto/{id}', [ProyectoController::class, 'update']);
//get por id
//Route::get('proyecto/{id}', [ProyectoController::class, 'show']);
//Rutas para el controlador ProyectoController


//get por id
//Route::get('proyecto/{id}', [ProyectoController::class, 'show']);


// get all proyectos
//Route::get('proyecto', [ProyectoController::class, 'get']);

// ruta para el controlador ProyectoController
//Route::get('proyecto', [ProyectoController::class, 'get']);