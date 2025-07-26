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
//Route::get('proyecto/{id}', [ProyectoController::class, 'show']);

// Rutas para el controlador ProyectoController



//GET PARA obtener todos los proyectos
Route::get('/proyectos', [ProyectoController::class, 'get']);

// POST para crear un nuevo proyecto
Route::post('/proyectos', [ProyectoController::class, 'post']);


// Ruta para mostrar el formulario de creación de proyecto
Route::get('/proyectos/crear', function() {
    return view('crear_proyecto');
});



// Ruta para buscar y editar proyecto desde el formulario
Route::get('/proyectos/editar/buscar', [ProyectoController::class, 'buscarEditar']);
Route::get('/proyecto/buscar', [ProyectoController::class, 'buscarProyecto']);



// Ruta para mostrar el formulario de eliminación de proyecto
Route::get('/proyectos/eliminar', function() {
    return view('eliminar_proyecto');
});

// Ruta para procesar la eliminación desde el formulario (POST)
Route::post('/proyectos/eliminar', [ProyectoController::class, 'delete']);


// Ruta para mostrar el formulario de edición de proyecto
Route::get('/proyectos/editar/{id}', [ProyectoController::class, 'edit']);


// Ruta para actualizar el proyecto (PATCH desde formulario)
Route::patch('/proyectos/editar/{id}', [ProyectoController::class, 'update']);


// Ruta para mostrar el formulario de búsqueda de proyecto a editar
Route::get('/proyectos/editar', function() {
    return view('buscar_editar');
});