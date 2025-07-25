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
        $proyectos = [
        [
            'id' => 1,
            'nombre' => 'Proyecto Alpha',
            'fecha_inicio' => '2025-01-01',
            'estado' => 'Activo',
            'responsable' => 'Juan Pérez',
            'monto' => 10000
        ],
        [
            'id' => 2,
            'nombre' => 'Proyecto Beta',
            'fecha_inicio' => '2025-02-15',
            'estado' => 'Finalizado',
            'responsable' => 'Ana Gómez',
            'monto' => 20000
        ]
    ];
    //return response()->json($proyectos, 200);
    $proyecto = $proyectos[0];
    return view('obtener_proyectos', compact('proyectos'));
    }


//----------------------------------------
//METODO POST CON DATOS EN DURO
//----------------------------------------
    public function post(Request $request)
    {
    // Proyectos en duro
    $proyectos = [
        [
            'id' => 1,
            'nombre' => 'Proyecto Alpha',
            'fecha_inicio' => '2025-01-01',
            'estado' => 'Activo',
            'responsable' => 'Juan Pérez',
            'monto' => 10000
        ],
        [
            'id' => 2,
            'nombre' => 'Proyecto Beta',
            'fecha_inicio' => '2025-02-15',
            'estado' => 'Finalizado',
            'responsable' => 'Ana Gómez',
            'monto' => 20000
        ]
    ];

    // Calcular el nuevo id
    $nuevoId = collect($proyectos)->max('id') + 1;

    // Genera el proyecto con los datos recibidos
    $proyecto = [
        'id' => $nuevoId,
        'nombre' => $request->input('nombre'),
        'fecha_inicio' => $request->input('fecha_inicio'),
        'estado' => $request->input('estado'),
        'responsable' => $request->input('responsable'),
        'monto' => $request->input('monto')
    ];
    return response()->json($proyecto, 201);
    }


//----------------------------------------
//METODO PATCH POR ID CON DATOS EN DURO
//----------------------------------------

    public function update(Request $request, $id)
{
    // Proyectos en duro
    $proyectos = [
        [
            'id' => 1,
            'nombre' => 'Proyecto Alpha',
            'fecha_inicio' => '2025-01-01',
            'estado' => 'Activo',
            'responsable' => 'Juan Pérez',
            'monto' => 10000
        ],
        [
            'id' => 2,
            'nombre' => 'Proyecto Beta',
            'fecha_inicio' => '2025-02-15',
            'estado' => 'Finalizado',
            'responsable' => 'Ana Gómez',
            'monto' => 20000
        ]
    ];

    // Buscar el proyecto por id
    $index = array_search($id, array_column($proyectos, 'id'));

    if ($index === false) {
        return response()->json(['error' => 'Proyecto no encontrado'], 404);
    }

    // Actualizar los datos
    $proyectos[$index]['nombre'] = $request->input('nombre', $proyectos[$index]['nombre']);
    $proyectos[$index]['fecha_inicio'] = $request->input('fecha_inicio', $proyectos[$index]['fecha_inicio']);
    $proyectos[$index]['estado'] = $request->input('estado', $proyectos[$index]['estado']);
    $proyectos[$index]['responsable'] = $request->input('responsable', $proyectos[$index]['responsable']);
    $proyectos[$index]['monto'] = $request->input('monto', $proyectos[$index]['monto']);

    return response()->json($proyectos[$index], 200);
}


//----------------------------------------
//METODO DELETE POR ID CON DATOS EN DURO
//----------------------------------------
    public function delete($id)
    {
        // Proyectos en duro
        $proyectos = [
            [
                'id' => 1,
                'nombre' => 'Proyecto Alpha',
                'fecha_inicio' => '2025-01-01',
                'estado' => 'Activo',
                'responsable' => 'Juan Pérez',
                'monto' => 10000
            ],
            [
                'id' => 2,
                'nombre' => 'Proyecto Beta',
                'fecha_inicio' => '2025-02-15',
                'estado' => 'Finalizado',
                'responsable' => 'Ana Gómez',
                'monto' => 20000
            ]
        ];

        // Buscar el proyecto por id
        $index = array_search($id, array_column($proyectos, 'id'));

        if ($index === false) {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }

        // Eliminar el proyecto del arreglo
        array_splice($proyectos, $index, 1);

        return response()->json(['mensaje' => 'Proyecto eliminado'], 200);
    }


    //----------------------------------------
    //METODO GET POR ID CON DATOS EN DURO
    //----------------------------------------



    public function show($id)
    {
        // Proyectos en duro
        $proyectos = [
            [
                'id' => 1,
                'nombre' => 'Proyecto Alpha',
                'fecha_inicio' => '2025-01-01',
                'estado' => 'Activo',
                'responsable' => 'Juan Pérez',
                'monto' => 10000
            ],
            [
                'id' => 2,
                'nombre' => 'Proyecto Beta',
                'fecha_inicio' => '2025-02-15',
                'estado' => 'Finalizado',
                'responsable' => 'Ana Gómez',
                'monto' => 20000
            ]
        ];

        // Buscar el proyecto por id
        $proyecto = collect($proyectos)->firstWhere('id', (int)$id);

        if ($proyecto) {
            return response()->json($proyecto, 200);
        } else {
            return response()->json(['error' => 'Proyecto no encontrado'], 404);
        }
    }
}
