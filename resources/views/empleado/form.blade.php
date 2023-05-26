//formulario que tendran datos en comun con create y edit 
<br>

<label for="Nombre">Nombre</label>
    
    <input type="text" name="Nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:''}}" id="Nombre">
    <br>

    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="ApellidoPaterno" value ="{{isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:''}}" id="ApellidoPaterno">
    <br>

    <label for="ApellidoMaterno">Apellido Materno</labe l>
    <input type="text" name="ApellidoMaterno" value ="{{isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:''}}" id="ApellidoMaterno">
    <br>

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" value ="{{isset($empleado->correo)?$empleado->correo:''}}" id="Correo">
    <br>

    <label for="Foto">Foto</label>
    @if (isset($empleado->foto))
    <img src="{{ asset('storage').'/'.$empleado->foto}}" width="100" alt="">
    @endif
    
    <input type="file" name="Foto" value=""  id="Foto">
    <br>

    <input type="submit" value="Guardar datos">
    <a href="{{ url('empleado/') }}">Volver</a>
    <br>