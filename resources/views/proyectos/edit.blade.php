@extends('layouts.app')

@section('titulo', 'Actualizar proyecto')

@section('contenido')
    <h2>
        Actualizar proyecto {{ $proyecto['id'] }}
    </h2>

    @if ($errors->any())
        <h3>Existen errores en el formulario:</h3>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form
        action="{{ route(
            'proyectos.update',
            $proyecto['id']
        ) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <p>
            <label for="nombre">
                Nombre:
            </label>

            <br>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old(
                    'nombre',
                    $proyecto['nombre']
                ) }}"
                required
            >
        </p>

        <p>
            <label for="fecha_inicio">
                Fecha de inicio:
            </label>

            <br>

            <input
                type="date"
                id="fecha_inicio"
                name="fecha_inicio"
                value="{{ old(
                    'fecha_inicio',
                    $proyecto['fecha_inicio']
                ) }}"
                required
            >
        </p>

        <p>
            <label for="estado">
                Estado:
            </label>

            <br>

            <select
                id="estado"
                name="estado"
                required
            >
                @php
                    $estadoSeleccionado = old(
                        'estado',
                        $proyecto['estado']
                    );
                @endphp

                <option
                    value="Pendiente"
                    @selected(
                        $estadoSeleccionado === 'Pendiente'
                    )
                >
                    Pendiente
                </option>

                <option
                    value="En proceso"
                    @selected(
                        $estadoSeleccionado === 'En proceso'
                    )
                >
                    En proceso
                </option>

                <option
                    value="Finalizado"
                    @selected(
                        $estadoSeleccionado === 'Finalizado'
                    )
                >
                    Finalizado
                </option>
            </select>
        </p>

        <p>
            <label for="responsable">
                Responsable:
            </label>

            <br>

            <input
                type="text"
                id="responsable"
                name="responsable"
                value="{{ old(
                    'responsable',
                    $proyecto['responsable']
                ) }}"
                required
            >
        </p>

        <p>
            <label for="monto">
                Monto:
            </label>

            <br>

            <input
                type="number"
                id="monto"
                name="monto"
                min="0"
                value="{{ old(
                    'monto',
                    $proyecto['monto']
                ) }}"
                required
            >
        </p>

        <button type="submit">
            Actualizar proyecto
        </button>

        <a href="{{ route(
            'proyectos.show',
            $proyecto['id']
        ) }}">
            Cancelar
        </a>
    </form>
@endsection
