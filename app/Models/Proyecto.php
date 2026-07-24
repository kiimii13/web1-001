<?php

namespace App\Models;

class Proyecto
{
    /**
     * Datos estáticos usados por la aplicación.
     */
    private static function datos(): array
    {
        return [
            [
                'id' => 1,
                'nombre' => 'Sistema de Gestión de Clientes',
                'fecha_inicio' => '2026-07-01',
                'estado' => 'En proceso',
                'responsable' => 'María González',
                'monto' => 3500000,
            ],
            [
                'id' => 2,
                'nombre' => 'Plataforma de Ventas Web',
                'fecha_inicio' => '2026-07-15',
                'estado' => 'Pendiente',
                'responsable' => 'Carlos Soto',
                'monto' => 4800000,
            ],
            [
                'id' => 3,
                'nombre' => 'Sistema de Inventario',
                'fecha_inicio' => '2026-06-10',
                'estado' => 'Finalizado',
                'responsable' => 'Andrea Pérez',
                'monto' => 2900000,
            ],
        ];
    }

    /**
     * Obtiene todos los proyectos.
     */
    public static function obtenerTodos(): array
    {
        return self::datos();
    }

    /**
     * Obtiene un proyecto por su ID.
     */
    public static function obtenerPorId(int $id): ?array
    {
        foreach (self::datos() as $proyecto) {
            if ($proyecto['id'] === $id) {
                return $proyecto;
            }
        }

        return null;
    }

    /**
     * Simula la creación de un proyecto.
     */
    public static function crear(array $datos): array
    {
        $proyectos = self::datos();

        $nuevoId = max(array_column($proyectos, 'id')) + 1;

        return [
            'id' => $nuevoId,
            'nombre' => $datos['nombre'],
            'fecha_inicio' => $datos['fecha_inicio'],
            'estado' => $datos['estado'],
            'responsable' => $datos['responsable'],
            'monto' => $datos['monto'],
        ];
    }

    /**
     * Simula la actualización de un proyecto.
     */
    public static function actualizar(int $id, array $datos): ?array
    {
        $proyecto = self::obtenerPorId($id);

        if ($proyecto === null) {
            return null;
        }

        return [
            'id' => $id,
            'nombre' => $datos['nombre'],
            'fecha_inicio' => $datos['fecha_inicio'],
            'estado' => $datos['estado'],
            'responsable' => $datos['responsable'],
            'monto' => $datos['monto'],
        ];
    }

    /**
     * Simula la eliminación de un proyecto.
     */
    public static function eliminar(int $id): bool
    {
        return self::obtenerPorId($id) !== null;
    }
}
