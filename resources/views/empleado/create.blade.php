<!-- formulario de creacion de empleado -->

 <!-- enctype="multipart/form-data" == sirve para adjuntar datos -->

@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- @ include( 'empleado.form' ); hace referencia a la carpeta /empleado/form.blade.php // quitar los espacios-->

    @include('empleado.form',['modo'=>'Crear'])
    
</form>
</div>
@endsection