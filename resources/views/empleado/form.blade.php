<label for="Nombre">Nombre</label>
<input type="text" name='Nombre' value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}">
<br>

<label for="ApellidoPaterno"> Apellido Paterno</label>
<input type="text" name='ApellidoPaterno' value="{{ isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : '' }}">
<br>

<label for="ApellidoMaterno">Apellido Materno</label>
<input type="text" name='ApellidoMaterno' value="{{ isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : '' }}">
<br>

<label for="Correo">Correo</label>
<input type="email" name='Correo' value="{{ isset($empleado->Correo) ? $empleado->Correo : '' }}">
<br>

<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
    <img src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" height="100px" alt="img empleado">
@endif
    <input type="file" name='Foto'>
<br>

<input type="submit" value='Enviar datos'>
<a href="{{ url('/empleado') }}">Regresar</a>
