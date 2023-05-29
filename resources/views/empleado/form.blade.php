<!-- formulario que tendran datos en comun con create y edit  -->

<h1>  {{$modo}} Empleado  </h1>

<!-- Muestra los errores de valores no ingresado en en form -->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach( $errors->all() as $error)
        <li> {{ $error }}  </li>
    @endforeach        
    </ul>
</div>
@endif

<div class="form-group"> 
    <label for="nombre">Nombre</label>
    <!-- usamos : old('nombre') para recuperar datos anteriores ingresados en el form por un error de validacion -->
    <input type="text" class="form-control" name="nombre" 
    value="{{ isset($empleado->nombre) ? $empleado->nombre : old('nombre') }}" id="nombre">
</div>

<div class="form-group"> 
    <label for="apellidoPaterno">Apellido Paterno</label>
    <input type="text" class= "form-control" name="apellidoPaterno" 
    value ="{{ isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:old('apellidoPaterno') }}" id="apellidoPaterno">
</div>
    
<div class="form-group"> 
    <label for="apellidoMaterno">Apellido Materno</label>
    <input type="text" class= "form-control" name="apellidoMaterno" value ="{{isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:old('apellidoMaterno')}}" id="apellidoMaterno">
</div>

<div class="form-group"> 
    <label for="correo">Correo</label>
    <input type="text" class= "form-control" name="correo" value ="{{isset($empleado->correo)?$empleado->correo:old('correo') }}" id="correo">
</div>

<div class="form-group">
    <label for="Foto"></label>
    @if (isset($empleado->foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage/'.$empleado->foto) }}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value ="" id="Foto">
    <br>
</div>

<div class="form-group">
    <input  class="btn btn-primary" type="submit" value=" {{$modo}} datos">
    <a class="btn btn-success" href="{{ url('empleado/') }}">Volver</a>
</div>
 
