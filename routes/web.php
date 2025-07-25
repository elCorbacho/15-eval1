<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ProyectoController;


Route::get('/', function () {
    return view('welcome');
});

// ruta para el controlador RutaController
#Route::get('get', [RutaController::class, 'get']);
#Route::get('/usuario/{nombre}/{email}/{telefono}', [RutaController::class, 'usuario']);
#Route::get('/nuevo/{nombre}/{email}/{telefono}', [RutaController::class, 'nuevo']);


// get proyecto
Route::get('proyecto', [ProyectoController::class, 'get']);

//post
Route::post('proyecto', [ProyectoController::class, 'post']);

//delete por id
Route::delete('proyecto/{id}', [ProyectoController::class, 'delete']);

//patch por id
Route::patch('proyecto/{id}', [ProyectoController::class, 'update']);

//get por id
Route::get('proyecto/{id}', [ProyectoController::class, 'show']);


//vista get para invocar forumario post
Route::get('/proyectos/crear', function() {
    return view('crear_proyecto');
});

