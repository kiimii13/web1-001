@extends('layouts.app')

@section('titulo', 'Registro de Usuario')

@section('contenido')
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-green-700 mb-6">
            Registro de Usuario
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block mb-1 font-semibold">
                    Nombre
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="correo" class="block mb-1 font-semibold">
                    Correo
                </label>

                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="{{ old('correo') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2"
                    required
                >
            </div>

            <div class="mb-6">
                <label for="clave" class="block mb-1 font-semibold">
                    Clave
                </label>

                <input
                    type="password"
                    id="clave"
                    name="clave"
                    class="w-full border border-gray-300 rounded-md px-3 py-2"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-green-700 text-white py-2 rounded-md hover:bg-green-800"
            >
                Registrarse
            </button>
        </form>

        <p class="text-center mt-5">
            ¿Ya tienes una cuenta?

            <a
                href="{{ route('login') }}"
                class="text-green-700 font-semibold hover:underline"
            >
                Iniciar sesión
            </a>
        </p>
    </div>
@endsection
