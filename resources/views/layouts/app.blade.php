<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('titulo', 'Gestión de Proyectos')
    </title>
</head>

<body>
    <header>
        <h1>Tech Solutions</h1>

        <nav>
            <a href="{{ route('proyectos.index') }}">
                Listar proyectos
            </a>

            |

            <a href="{{ route('proyectos.create') }}">
                Agregar proyecto
            </a>
        </nav>

        <hr>
    </header>

    <main>
        @if (session('mensaje'))
            <p>
                <strong>{{ session('mensaje') }}</strong>
            </p>
        @endif

        @if (isset($mensaje))
            <p>
                <strong>{{ $mensaje }}</strong>
            </p>
        @endif

        @yield('contenido')
    </main>

    <footer>
        <hr>

        <p>
            Sistema de Gestión de Proyectos
        </p>
    </footer>
</body>
</html>
