
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<p>Aqui se van aa crear empleado según se :)</p>
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="Nombre">Nombre</label>
    <input type="text" name='Nombre'>
    <br>

    <label for="ApellidoPaterno"> Apellido Paterno</label>
    <input type="text" name='ApellidoPaterno'>
    <br>

    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name=ApellidoMaterno>
    <br>

    <label for="Correo">Correo</label>
    <input type="email" name='Correo'>
    <br>

    <label for="Foto">Foto</label>
    <input type="file" name='Foto'>
    <br>

    <input type="submit" value='Enviar datos'>
</form>
<!--
<form action=''>
    <legend>Disabled fieldset example</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Disabled input</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Disabled select menu</label>
      <select id="disabledSelect" class="form-select">
        <option>Disabled select</option>
      </select>
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
        <label class="form-check-label" for="disabledFieldsetCheck">
          Can't check this
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
 -->
