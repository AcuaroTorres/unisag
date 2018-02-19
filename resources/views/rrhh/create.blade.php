@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<h3>Nuevo usuario</h3>

<form method="POST" action="{{ route('rrhh.users.store') }}">
  {{ csrf_field() }}

  <div class="form-group row">

    <label for="inputId" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-6">
      <input type="number" name="id" class="form-control" id="inputId" required="required" value="min="{6" min="{6"} max="99999999" step="">
    </div>

    <label for="inputDv" class="col-sm-2 col-form-label">DV</label>
    <div class="col-sm-2">
      <input type="text" name="dv" id="inputDv" class="form-control" required="required" title="Digito verificador">
    </div>

  </div>

  <div class="form-group row">
    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputNombre" required="required" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" required="required" placeholder="Email">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </div>

</form>





<script type="text/javascript">
  
  /*
  * Calcula digito verificador
  */
  $.calculaDigitoVerificador = function (rut) {
    // type check
    if (!rut || !rut.length || typeof rut !== 'string') {
      return -1;
    }
    // serie numerica
    var secuencia = [2,3,4,5,6,7,2,3];
    var sum = 0;
    //
    for (var i=rut.length - 1; i >=0; i--) {
      var d = rut.charAt(i)
      sum += new Number(d)*secuencia[rut.length - (i + 1)];
    };
    // sum mod 11
    var rest = 11 - (sum % 11);
    // si es 11, retorna 0, sino si es 10 retorna K,
    // en caso contrario retorna el numero
    return rest === 11 ? 0 : rest === 10 ? "K" : rest;
  };
  

  calculaDigitoVerificador("4678982");
</script>
@endsection