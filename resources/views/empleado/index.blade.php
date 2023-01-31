@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('message')}}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <a href="{{ url('/empleado/create') }}" class="btn btn-success mb-3">Crear Empleado</a>
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
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" height="100px" alt="img empleado">
                </td>
                <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">Editar</a>
                    |
                    <form action="{{ url('empleado/'.$empleado->id) }}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $empleados->links() !!}
</div>
@endsection
