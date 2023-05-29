<!-- //mostrar la lista de empleados :) -->
<!-- extension bootstrap "b-table-header" -->
<!-- creamos un enlace para poder mandarnos al formulario de creacion -->

<!-- Jalamos el template de ./layouts/app.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    @if( Session::has('mensaje' ))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    @endif

    

<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
<br>
<br>
<table class="table table-striped table-ligth">
  <thead>
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
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto}}" width="100" alt="" >
                <!-- {{ $empleado->foto }} -->

            
            </td>

            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellidoPaterno }}</td>
            <td>{{ $empleado->apellidoMaterno }}</td>
            <td>{{ $empleado->correo }}</td>
            <td>
                <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-secondary">
                    Editar
                </a>
                <!-- class="d-inline" alinea los botones en la fila -->
                <form action="{{ url('/empleado/'.$empleado->id ) }}" class="d-inline" method="POST">
                    <!-- @csrf llave para el borrado y la incercion de datos -->
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Quieres Borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection