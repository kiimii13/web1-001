<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Lista todos los proyectos.
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return response()->json($proyectos, 200);
    }

    /**
     * Crea un nuevo proyecto.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:100'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto = Proyecto::create($datos);

        return response()->json($proyecto, 201);
    }

    /**
     * Busca un proyecto por su ID.
     */
    public function show(string $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado.',
            ], 404);
        }

        return response()->json($proyecto, 200);
    }

    /**
     * Actualiza un proyecto por su ID.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado.',
            ], 404);
        }

        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:100'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto->update($datos);

        return response()->json($proyecto, 200);
    }

    /**
     * Elimina un proyecto por su ID.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json([
                'message' => 'Proyecto no encontrado.',
            ], 404);
        }

        $proyecto->delete();

        return response()->noContent();
    }
}
