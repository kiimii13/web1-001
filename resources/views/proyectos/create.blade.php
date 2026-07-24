@extends('layouts.app')

@section('titulo', 'Crear proyecto')

@section('contenido')
    <h2>Agregar proyecto</h2>
<x-valor-uf
    :fecha="$uf['fecha']"
    :valor="$uf['valor']"
/>
    @if ($errors->any())
        <h3>Existen errores en el formulario:</h3>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form
        action="{{ route('proyectos.store') }}"
        method="POST"
    >
        @csrf

        <p>
            <label for="nombre">
                Nombre:
            </label>

            <br>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
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
                value="{{ old('fecha_inicio') }}"
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
                <option value="">
                    Seleccione un estado
                </option>

                <option
                    value="Pendiente"
                    @selected(old('estado') === 'Pendiente')
                >
                    Pendiente
                </option>

                <option
                    value="En proceso"
                    @selected(old('estado') === 'En proceso')
                >
                    En proceso
                </option>

                <option
                    value="Finalizado"
                    @selected(old('estado') === 'Finalizado')
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
                value="{{ old('responsable') }}"
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
                value="{{ old('monto') }}"
                required
            >
        </p>

        <button type="submit">
            Crear proyecto
        </button>

        <a href="{{ route('proyectos.index') }}">
            Cancelar
        </a>
    </form>
@endsection
