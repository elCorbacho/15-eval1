<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RutaController;
use App\Http\Controllers\ProyectoController;


// Ruta para la página de inicio, redirige a la lista de proyectos
Route::get('/', function () {
    //return view('welcome');
    return redirect('/proyectos');
});

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




//---------------------------------------
// RUTAS CON VISTAS
//---------------------------------------

// Ruta para listar todos los proyectos con GET
Route::get('/proyectos', [ProyectoController::class, 'get']);



//-----------------------------------------------------------------------------
//RUTAS PARA AGREGAR PROYECTO VIA JSON Y VISTAS
    // POST para crear un nuevo proyecto
Route::post('/proyectos', [ProyectoController::class, 'post']);

    // Ruta para mostrar el formulario de creación de proyecto
Route::get('/proyectos/crear', function() {
    return view('crear_proyecto');
});
//-----------------------------------------------------------------------------


//-----------------------------------------------------------------------------
//RUTAS PARA GESTIONAR EL DELETE VIA JSON Y VISTAS
    // Ruta para mostrar el formulario de eliminación de proyecto
Route::get('/proyectos/eliminar', function() {
    return view('eliminar_proyecto');
});

    // Ruta para procesar la eliminación desde el formulario (POST)
Route::post('/proyectos/eliminar', [ProyectoController::class, 'delete']);

//-----------------------------------------------------------------------------


//-----------------------------------------------------------------------------
//RUTAS PARA ACTUALIZAR PROYECTO VIA JSON Y VISTAS
    // Ruta para mostrar el formulario de búsqueda de proyecto a editar
Route::get('/proyectos/editar', function() {
    return view('buscar_editar');
});

    // Ruta para buscar y editar proyecto desde el formulario
Route::get('/proyectos/editar/buscar', [ProyectoController::class, 'buscarEditar']);

    // Ruta para mostrar el formulario de edición de proyecto
Route::get('/proyectos/editar/{id}', [ProyectoController::class, 'edit']);

    // Ruta para procesar la edición desde el formulario (PATCH)
Route::patch('/proyectos/editar/{id}', [ProyectoController::class, 'update']);

//-----------------------------------------------------------------------------




//-----------------------------------------------------------------------------
//RUT OBTENER UN PROYECTO POR ID VIA JSON
//-----------------------------------------------------------------------------
Route::get('/proyecto/buscar', [ProyectoController::class, 'buscarProyecto']);

//-----------------------------------------------------------------------------



