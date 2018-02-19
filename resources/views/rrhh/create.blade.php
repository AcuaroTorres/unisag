@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<h3>Nuevo usuario</h3>

<form method="POST" action="{{ route('rrhh.users.store') }}">
	{{ csrf_field() }}
	
	<div class="row">
		<div class="col-4">

			<fieldset class="form-group">
				<label for="formGroupIDInput">ID</label>
				<input type="number" class="form-control" id="formGroupIDInput" name="id" required="required" value="min="{6" min="{6"} max="99999999" step="">
			</fieldset>

		</div>
		<div class="col-2">

			<fieldset class="form-group">
				<label for="formGroupDVInput">DV</label>
				<input type="text" class="form-control" id="formGroupDVInput" name="dv" required="required" title="Digito verificador">
			</fieldset>

		</div>
	</div>
	
	<fieldset class="form-group">
		<label for="formGroupNameInput">Nombre</label>
		<input type="text" class="form-control" id="formGroupNameInput" placeholder="Nombre" name="name" required="required">
	</fieldset>

	<fieldset class="form-group">
		<label for="formGroupEmailInput">Email</label>
		<input type="email" class="form-control" id="formGroupEmailInput" placeholder="Email" name="email" required="required">
	</fieldset>

	<button type="submit" class="btn btn-primary">Crear</button>

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