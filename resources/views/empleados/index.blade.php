@extends('welcome')

@section('content')
    <h2>Lista de empleados</h2>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm"><span class="fas fa-user-plus"></span> Crear</a>
    <hr>
    <table class="table table-striped">
        <thead>
            <th><span class="fas fa-user"></span> Nombre</th>
            <th>Email </th>
            <th><span class="fas fa-venus-mars"></span> Sexo</th>
            <th>Área</th>
            <th>Boletín</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            @php
                foreach ($empleados as $empleado) {
            @endphp
                <tr>
                    <td>{{ $empleado->empleado_nombres}}</td>
                    <td>{{ $empleado->empleado_email}}</td>
                    <td>
                        @if($empleado->empleado_sexo == "M")
                            Masculino
                        @else
                            Femenino
                        @endif
                    </td>
                    <td>
                        {{ $empleado->area->area_nombre }}
                    </td>
                    <td>
                        @if($empleado->empleado_boletin == "S")
                            Sí
                        @else
                            No
                        @endif
                    </td>
                    <td><a href="{{ route('empleados.edit', $empleado)}}"><span class="fas fa-edit"></span></a></td>
                    <td><a href="{{ route('empleados.destroy', $empleado)}}"><span class="fas fa-trash"></span></a></td>
                </tr>
            @php
                }
            @endphp
        </tbody>
    </table>
@endsection
