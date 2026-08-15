@extends('layouts.app')

@section('titulo', 'Listado de proyectos')



@section('contenido')
    <h2>Listado de proyectos</h2>
<x-valor-uf
    :fecha="$uf['fecha']"
    :valor="$uf['valor']"
/>


    @if (empty($proyectos))
        <p>No existen proyectos registrados.</p>
    @else
       <table class="w-full border-collapse bg-white shadow-sm rounded-lg overflow-hidden">
    <thead class="bg-green-100">
        <tr>
            <th class="border-b border-green-200 px-4 py-3 text-left">ID</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Nombre</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Fecha de inicio</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Estado</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Responsable</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Monto</th>
            <th class="border-b border-green-200 px-4 py-3 text-left">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($proyectos as $proyecto)
            <tr class="border-b border-gray-200 hover:bg-green-50">
                <td class="px-4 py-3">{{ $proyecto['id'] }}</td>
                <td class="px-4 py-3">{{ $proyecto['nombre'] }}</td>
                <td class="px-4 py-3">{{ $proyecto['fecha_inicio'] }}</td>
                <td class="px-4 py-3">{{ $proyecto['estado'] }}</td>
                <td class="px-4 py-3">{{ $proyecto['responsable'] }}</td>
                <td class="px-4 py-3">
                    ${{ number_format($proyecto['monto'], 0, ',', '.') }}
                </td>
                <td class="px-4 py-3">
                    <a href="{{ route('proyectos.show', $proyecto['id']) }}" class="text-green-700 hover:underline">
                        Ver
                    </a>

                    |

                    <a href="{{ route('proyectos.edit', $proyecto['id']) }}" class="text-green-700 hover:underline">
                        Actualizar
                    </a>

                    |

                    <a href="{{ route('proyectos.confirm-delete', $proyecto['id']) }}" class="text-red-600 hover:underline">
                        Eliminar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    @endif
@endsection
