
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<p>Aqui se van a crear empleado según se :)</p>
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('empleado.form')

</form>
