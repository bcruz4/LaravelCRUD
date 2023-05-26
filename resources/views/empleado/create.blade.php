//formulario de creacion de empleado

 <!-- enctype="multipart/form-data" == sirve para adjuntar datos -->

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- @ include( 'empleado.form' ); hace referencia a la carpeta /empleado/form.blade.php // quitar los espacios-->

    @include('empleado.form')
    
</form>