@extends('layouts.app')

@section('titulo', 'Eliminar proyecto')

@section('contenido')
    <h2>Eliminar proyecto</h2>

    <p>
        ¿Está seguro de que desea eliminar el siguiente proyecto?
    </p>

    <p>
        <strong>ID:</strong>
        {{ $proyecto['id'] }}
    </p>

    <p>
        <strong>Nombre:</strong>
        {{ $proyecto['nombre'] }}
    </p>

    <p>
        <strong>Responsable:</strong>
        {{ $proyecto['responsable'] }}
    </p>

    <p>
        <strong>Estado:</strong>
        {{ $proyecto['estado'] }}
    </p>

    <form
        action="{{ route(
            'proyectos.destroy',
            $proyecto['id']
        ) }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button type="submit">
            Confirmar eliminación
        </button>

        <a href="{{ route(
            'proyectos.show',
            $proyecto['id']
        ) }}">
            Cancelar
        </a>
    </form>
@endsection
