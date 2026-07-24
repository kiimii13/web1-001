@extends('layouts.app')

@section('titulo', 'Listado de proyectos')



@section('contenido')
    <h2>Listado de proyectos</h2>
<x-valor-uf
    :fecha="$uf['fecha']"
    :valor="$uf['valor']"
/>
    <p>
        <a href="{{ route('proyectos.create') }}">
            Agregar nuevo proyecto
        </a>
    </p>

    @if (empty($proyectos))
        <p>No existen proyectos registrados.</p>
    @else
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>
                            {{ $proyecto['id'] }}
                        </td>

                        <td>
                            {{ $proyecto['nombre'] }}
                        </td>

                        <td>
                            {{ $proyecto['fecha_inicio'] }}
                        </td>

                        <td>
                            {{ $proyecto['estado'] }}
                        </td>

                        <td>
                            {{ $proyecto['responsable'] }}
                        </td>

                        <td>
                            ${{ number_format(
                                $proyecto['monto'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </td>

                        <td>
                            <a href="{{ route(
                                'proyectos.show',
                                $proyecto['id']
                            ) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route(
                                'proyectos.edit',
                                $proyecto['id']
                            ) }}">
                                Actualizar
                            </a>

                            |

                            <a href="{{ route(
                                'proyectos.confirm-delete',
                                $proyecto['id']
                            ) }}">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
