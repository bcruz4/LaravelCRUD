<!-- formulario que tendran datos en comun con create y edit  -->

<h1>  {{$modo}} Empleado  </h1>

<!-- Muestra los errores de valores no ingresado en en form -->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach( $errors->all() as $error)
        <li>
            {{ $error }}
             @endforeach
        </li>
    </ul>
</div>

@endif

<div class="form-group"> 
    <label for="Nombre">Nombre</label>    
    <input type="text" class= "form-control" name="Nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:''}}" id="Nombre">
</div>

<div class="form-group"> 
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" class= "form-control" name="ApellidoPaterno" value ="{{isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:''}}" id="ApellidoPaterno">
</div>
    
<div class="form-group"> 
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" class= "form-control" name="ApellidoMaterno" value ="{{isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:''}}" id="ApellidoMaterno">
</div>

<div class="form-group"> 
    <label for="Correo">Correo</label>
    <input type="text" class= "form-control" name="Correo" value ="{{isset($empleado->correo)?$empleado->correo:''}}" id="Correo">
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
 
