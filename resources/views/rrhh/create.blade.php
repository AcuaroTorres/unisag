@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Nuevo Usuario</h3>
  </div>
  <div class="panel-body">

  <form class="form-horizontal" method="post" action="">

    <div class="form-group">
      <label for="inputId" class="col-sm-2 control-label">Id:</label>
      <div class="col-sm-2">
        <input type="number" name="id" id="inputId" class="form-control" value="min="{6" min="{6"} max="8" step="" required="required" title="">
      </div>
    </div>
    
    <div class="form-group">
      <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-4">
        <input type="text" name="nombre" id="input" class="form-control" value="" required="required" pattern="" title="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputApellidop" class="col-sm-2 control-label">Apellido Paterno:</label>
      <div class="col-sm-4">
        <input type="text" name="apellidop" id="inputApellidop" class="form-control" value="" required="required" pattern="" title="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputApellidom" class="col-sm-2 control-label">Apellido Materno:</label>
      <div class="col-sm-4">
        <input type="text" name="apellidom" id="inputApellidom" class="form-control" value="" required="required" pattern="" title="">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
      <div class="col-sm-4">
        <input type="text" name="email" id="inputEmail" class="form-control" value="" required="required" pattern="" title="">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4 col-md-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    
  </form>
  </div>
</div>

@endsection