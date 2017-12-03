@extends('layouts.app')

@section('title', 'Cambiar Password')

@section('content')

	<form method="POST" class="form-horizontal" action="{{ route('rrhh.users.update', Auth::user()->id) }}">
		{{ method_field('PUT') }} {{ csrf_field() }}

		<h3>Cambiar clave</h3>
		<br>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Clave Actual</label>
			<div class="col-sm-8"><input type="password" class="form-control" name="password"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="newpassword">Nueva Clave</label>
			<div class="col-sm-8"><input type="password" class="form-control" name="newpassword"></div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" name="" class="btn btn-primary" value="Cambiar Clave">
			</div>
		</div>

	</form>

@endsection