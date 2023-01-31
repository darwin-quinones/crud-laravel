<h1>{{ $modo }} Empleado</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name='Nombre' value="{{ isset($empleado->Nombre) ? $empleado->Nombre : old('Nombre') }}">
</div>

<div class="form-group">
    <label for="ApellidoPaterno"> Apellido Paterno</label>
    <input class="form-control" type="text" name='ApellidoPaterno' value="{{ isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : old('ApellidoPaterno') }}">
</div>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input class="form-control" type="text" name='ApellidoMaterno' value="{{ isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : old('ApellidoMaterno') }}">
</div>

<div class="form-group">
    <label for="Correo">Correo</label>
    <input class="form-control" type="email" name='Correo' value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}">
</div>

<div class="form-group">
    @if(isset($empleado->Foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" height="100px" alt="img empleado">
    @endif
    <input type="file" class="form-control" name='Foto'>
    <br>
</div>
<input class="btn btn-success" type="submit" value='{{ $modo }} datos'>
<a class="btn btn-primary" href="{{ url('/empleado') }}">Regresar</a>
