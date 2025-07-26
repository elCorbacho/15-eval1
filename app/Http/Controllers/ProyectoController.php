<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
        public function proyecto($id, $nombre, $fecha_inicio, $estado, $responsable, $monto)
    {
        $proyecto = new Proyecto();
        $proyecto->id = $id;
        $proyecto->nombre = $nombre;
        $proyecto->fecha_inicio = $fecha_inicio;
        $proyecto->estado = $estado;
        $proyecto->responsable = $responsable;
        $proyecto->monto = $monto;
        dd($proyecto);
    }

    //----------------------------------------
    //METODO GET CON DATOS EN DURO JSON
    //----------------------------------------
    public function get()
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }


        return view('obtener_proyectos', compact('proyectos'));
    }

//----------------------------------------
//METODO POST CON JSON
//----------------------------------------
    public function post(Request $request)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Calcular el nuevo id
        $nuevoId = empty($proyectos) ? 1 : collect($proyectos)->max('id') + 1;

        // Genera el proyecto con los datos recibidos
        $proyecto = [
            'id' => $nuevoId,
            'nombre' => $request->input('nombre'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'estado' => $request->input('estado'),
            'responsable' => $request->input('responsable'),
            'monto' => $request->input('monto')
        ];

        // Agregar el nuevo proyecto al array
        $proyectos[] = $proyecto;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redirigir de vuelta al formulario con los datos del proyecto creado para el modal
        return redirect()->back()->with('proyecto_creado', $proyecto);

    }


//----------------------------------------
//METODO PATCH POR ID CON DATOS EN DURO
//----------------------------------------

    public function update(Request $request, $id)
{
    $ruta = base_path('database/proyectos.json');
    $proyectos = [];

    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $proyectos = json_decode($json, true);
    }

    // Buscar el proyecto por id
    $index = array_search((int)$id, array_column($proyectos, 'id'));

    if ($index === false) {
        return response()->json(['error' => 'Proyecto no encontrado'], 404);
    }

    // Actualizar los datos
    $proyectos[$index]['nombre'] = $request->input('nombre', $proyectos[$index]['nombre']);
    $proyectos[$index]['fecha_inicio'] = $request->input('fecha_inicio', $proyectos[$index]['fecha_inicio']);
    $proyectos[$index]['estado'] = $request->input('estado', $proyectos[$index]['estado']);
    $proyectos[$index]['responsable'] = $request->input('responsable', $proyectos[$index]['responsable']);
    $proyectos[$index]['monto'] = $request->input('monto', $proyectos[$index]['monto']);

    // Guardar el array actualizado en el archivo JSON
    file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Redirigir a la lista de proyectos con mensaje de éxito
    return redirect('/proyectos')->with('success', 'Proyecto actualizado correctamente');
}


//----------------------------------------
//METODO DELETE POR ID CON JSON
//----------------------------------------
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por id
        $index = array_search($id, array_column($proyectos, 'id'));

        if ($index === false) {
            // Redirigir a la vista de eliminar con mensaje de error
            return redirect()->back()->with('error', 'Proyecto no encontrado');
        }

        // Eliminar el proyecto del arreglo
        array_splice($proyectos, $index, 1);

        // Guardar el array actualizado en el archivo JSON
        file_put_contents($ruta, json_encode($proyectos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redirigir de vuelta a la vista de eliminar con mensaje de éxito
        return redirect()->back()->with('success', 'Proyecto eliminado');
    }


    //----------------------------------------
    //METODO GET POR ID con archivo JSON
    //----------------------------------------
    public function show($id)
    {
        $ruta = base_path('database/proyectos.json');
        $proyectos = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $proyectos = json_decode($json, true);
        }

        // Buscar el proyecto por id
        $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

        if ($proyecto) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }

    // ----------------------------------------
    // MÉTODO PARA BUSCAR PROYECTO POR ID Y MOSTRAR VISTA DESDE JSON
    // ----------------------------------------
    public function buscarProyecto(Request $request)
    {
        $proyecto = null;
        $notFound = false;

        if ($request->has('id')) {
            $ruta = base_path('database/proyectos.json');
            $proyectos = [];
            if (file_exists($ruta)) {
                $json = file_get_contents($ruta);
                $proyectos = json_decode($json, true);
            }
            $proyecto = collect($proyectos)->firstWhere('id', (int)$request->input('id'));
            if (!$proyecto) {
                $notFound = true;
            }
        }
        return view('buscar_proyecto', compact('proyecto', 'notFound'));
    }


//permite editar un proyecto existente
// muestra el formulario de edición con los datos del proyecto.
// Si no se encuentra el proyecto, muestra un mensaje de error.
    public function edit($id)
{
    $ruta = base_path('database/proyectos.json');
    $proyectos = [];

    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $proyectos = json_decode($json, true);
    }

    $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

    if (!$proyecto) {
        return redirect('/proyectos/editar')->with('error', 'Proyecto no encontrado');
    }

    return view('editar_proyecto', compact('proyecto'));
}

//permite buscar un proyecto por id y mostrar el formulario de edición
//para editarlo. Si no se encuentra el proyecto, muestra un mensaje de error.
    public function buscarEditar(Request $request)
        {
            $proyecto = null;
            $notFound = false;

            if ($request->has('id')) {
                $ruta = base_path('database/proyectos.json');
                $proyectos = [];
                if (file_exists($ruta)) {
                    $json = file_get_contents($ruta);
                    $proyectos = json_decode($json, true);
                }
                $proyecto = collect($proyectos)->first(function ($item) use ($request) {
                    return (int)$item['id'] === (int)$request->input('id');
                });
                if (!$proyecto) {
                    $notFound = true;
                }
            }
            return view('buscar_editar', compact('proyecto', 'notFound'));
        }
}