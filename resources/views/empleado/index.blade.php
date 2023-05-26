<!-- //mostrar la lista de empleados :) -->
<!-- extension bootstrap "b-table-header" -->
<!-- creamos un enlace para poder mandarnos al formulario de creacion -->

<!-- Jalamos el template de ./layouts/app.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{ url('empleado/create') }}">Registrar nuevo empleado</a>
<table class="table table-ligth">
    <thead class="thead-ligth">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>        
        <!-- consultar la informacion de $datos['empleados'] = Empleado::paginate(5); en empleados.Controller.php -->
        @foreach( $empleados as $empleado )
        <tr></tr>
            <td>{{ $empleado->id }}</td>

            <td>
                <img src="{{ asset('storage').'/'.$empleado->foto}}" width="100" alt="" >
                <!-- {{ $empleado->foto }} -->

            
            </td>

            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellidoPaterno }}</td>
            <td>{{ $empleado->apellidoMaterno }}</td>
            <td>{{ $empleado->correo }}</td>
            <td>
                <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}">
                    Editar
                </a>
                <form action="{{ url('/empleado/'.$empleado->id ) }}" method="POST">
                    <!-- @csrf llave para el borrado y la incercion de datos -->
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Quieres Borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection