<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo', 'Gestión de Proyectos')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-green-50 text-gray-800">
    <header class="bg-green-700 text-white shadow">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <h1 class="text-2xl font-bold">
                Tech Solutions
            </h1>

            @auth
                <nav class="flex justify-between items-center mt-4">
                    <div class="flex gap-4">
                        <a
                            href="{{ route('proyectos.index') }}"
                            class="hover:underline"
                        >
                            Listar proyectos
                        </a>

                        <a
                            href="{{ route('proyectos.create') }}"
                            class="hover:underline"
                        >
                            Agregar proyecto
                        </a>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="bg-white text-green-700 px-4 py-2 rounded-md hover:bg-green-100"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                </nav>
            @endauth
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-8">
        @if (session('mensaje'))
            <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded-md mb-5">
                {{ session('mensaje') }}
            </div>
        @endif

        @if (isset($mensaje))
            <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded-md mb-5">
                {{ $mensaje }}
            </div>
        @endif

        @yield('contenido')
    </main>

    <footer class="border-t border-green-200 mt-8">
        <div class="max-w-6xl mx-auto px-6 py-4 text-center text-sm text-gray-600">
            Sistema de Gestión de Proyectos
        </div>
    </footer>
</body>

</html>
