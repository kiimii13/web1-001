@extends('layouts.app')

@section('titulo', 'Detalle del proyecto')

@section('contenido')
    <h2>Detalle del proyecto</h2>

    <p>
        <strong>ID:</strong>
        {{ $proyecto['id'] }}
    </p>

    <p>
        <strong>Nombre:</strong>
        {{ $proyecto['nombre'] }}
    </p>

    <p>
        <strong>Fecha de inicio:</strong>
        {{ $proyecto['fecha_inicio'] }}
    </p>

    <p>
        <strong>Estado:</strong>
        {{ $proyecto['estado'] }}
    </p>

    <p>
        <strong>Responsable:</strong>
        {{ $proyecto['responsable'] }}
    </p>

    <p>
        <strong>Monto:</strong>

        ${{ number_format(
            $proyecto['monto'],
            0,
            ',',
            '.'
        ) }}
    </p>

    <p>
        <a href="{{ route(
            'proyectos.edit',
            $proyecto['id']
        ) }}">
            Actualizar proyecto
        </a>

        |

        <a href="{{ route(
            'proyectos.confirm-delete',
            $proyecto['id']
        ) }}">
            Eliminar proyecto
        </a>

        |

        <a href="{{ route('proyectos.index') }}">
            Volver al listado
        </a>
    </p>
@endsection
