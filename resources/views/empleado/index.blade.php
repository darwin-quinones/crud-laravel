
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Holiss empleados</p>
    <div class="table-responsive">
        @if(Session::has('message'))
            {{Session::get('message')}}
        @endif
        <a href="{{ url('/empleado/create') }}">Crear Empleado</a>
        <table class="table table-light">
            <thead class='thead-light'>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr class="">
                    <td>{{ $empleado->id}}</td>
                    <td>{{ $empleado->Nombre}}</td>
                    <td>{{ $empleado->ApellidoPaterno}}</td>
                    <td>{{ $empleado->ApellidoMaterno}}</td>
                    <td>{{ $empleado->Correo}}</td>
                    <td>
                        <img src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" height="100px" alt="img empleado">
                    </td>
                    <td>
                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">Editar</a>
                        |
                    <form action="{{ url('empleado/'.$empleado->id) }}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Borrar" onclick="return confirm('¿Quieres Borrar?')">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
