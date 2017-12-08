@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')

@include('rrhh.submenu')

	<form method="POST" class="form-horizontal" action="{{ route('rrhh.users.update',$user->id) }}">
		{{ method_field('PUT') }} {{ csrf_field() }}

		<div class="form-group">
			<label class="col-sm-2 control-label" for="name">Run</label>
			<div class="col-sm-8"><p class="form-control-static">{{$user->runFormat()}}</p></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="name">Nombre</label>
			<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{$user->name}}"></div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">Correo</label>
			<div class="col-sm-8"><input type="email" class="form-control" name="email" value="{{$user->email}}"></div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-2">
				<input type="submit" name="" class="btn btn-primary" value="Actualizar">
			</div>
			</form>

			<div class="col-sm-2 pull-right">
				<form method="POST" action="{{ route('rrhh.users.destroy', $user->id) }}" style="display: inline;">
					{{ method_field('DELETE') }} {{ csrf_field() }}
					<button class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Eliminar</button>
				</form>
			</div>
			

			<div class="col-sm-2 pull-right">
				<form method="POST" action="{{ route('rrhh.users.password.reset', $user->id) }}" style="display: inline;">
					{{ method_field('DELETE') }} {{ csrf_field() }}
					<button class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Restaurar clave</button>
				</form>
			</div>
		</div>

@endsection