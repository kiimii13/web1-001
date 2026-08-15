<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProyectoController extends Controller
{
    /**
     * Lista todos los proyectos.
     */
    public function index(): View
    {
        $proyectos = Proyecto::all();

        $uf = $this->obtenerUfPorFecha(
            now()->format('Y-m-d')
        );

        return view('proyectos.index', compact(
            'proyectos',
            'uf'
        ));
    }

    /**
     * Muestra el formulario para crear un proyecto.
     */
    public function create(): View
    {
        $uf = $this->obtenerUfPorFecha(
            now()->format('Y-m-d')
        );

        return view('proyectos.create', compact('uf'));
    }

    /**
     * Procesa la creación de un proyecto.
     */
    public function store(Request $request): View
    {
        $datos = $this->validarProyecto($request);

        $datos['created_by'] = Auth::id();

        $proyecto = Proyecto::create($datos);

        return view('proyectos.show', [
            'proyecto' => $proyecto,
            'mensaje' => 'Proyecto creado correctamente.',
        ]);
    }

    /**
     * Muestra un proyecto por su ID.
     */
    public function show(int $proyecto): View
    {
        $proyectoEncontrado = Proyecto::findOrFail($proyecto);

        return view('proyectos.show', [
            'proyecto' => $proyectoEncontrado,
        ]);
    }

    /**
     * Muestra el formulario de actualización.
     */
    public function edit(int $proyecto): View
    {
        $proyectoEncontrado = Proyecto::findOrFail($proyecto);

        return view('proyectos.edit', [
            'proyecto' => $proyectoEncontrado,
        ]);
    }

    /**
     * Procesa la actualización de un proyecto.
     */
    public function update(
        Request $request,
        int $proyecto
    ): View {
        $datos = $this->validarProyecto($request);

        $proyectoActualizado = Proyecto::findOrFail($proyecto);

        $proyectoActualizado->update($datos);

        return view('proyectos.show', [
            'proyecto' => $proyectoActualizado,
            'mensaje' => 'Proyecto actualizado correctamente.',
        ]);
    }

    /**
     * Muestra la confirmación de eliminación.
     */
    public function confirmDelete(int $proyecto): View
    {
        $proyectoEncontrado = Proyecto::findOrFail($proyecto);

        return view('proyectos.delete', [
            'proyecto' => $proyectoEncontrado,
        ]);
    }

    /**
     * Procesa la eliminación de un proyecto.
     */
    public function destroy(int $proyecto): RedirectResponse
    {
        $proyectoEncontrado = Proyecto::findOrFail($proyecto);

        $proyectoEncontrado->delete();

        return redirect()
            ->route('proyectos.index')
            ->with(
                'mensaje',
                'Proyecto eliminado correctamente.'
            );
    }

    /**
     * Simula la consulta del valor de la UF según una fecha.
     */
    public function obtenerUfPorFecha(string $fecha): array
    {
        $valoresUf = [
            '2026-07-21' => 39580.12,
            '2026-07-22' => 39595.48,
            '2026-07-23' => 39610.35,
            '2026-07-24' => 39625.80,
        ];

        return [
            'fecha' => $fecha,
            'valor' => $valoresUf[$fecha] ?? 39610.35,
        ];
    }

    /**
     * Valida los datos comunes de creación y actualización.
     */
    private function validarProyecto(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:100'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);
    }
}
