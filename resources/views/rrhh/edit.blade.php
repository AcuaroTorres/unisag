@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
@include('rrhh.submenu')
<form method="POST" class="form-horizontal" action="{{ route('rrhh.users.update',$user->id) }}">
	{{ method_field('PUT') }} {{ csrf_field() }}
	<div class="form-group">
		<label for="run">RUN</label>
		<input type="text" readonly class="form-control-plaintext" id="staticRUN" value="{{$user->runFormat()}}">
	</div>
	<div class="form-group">
		<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{$user->name}}">
	</div>
	<div class="form-group">
		<label for="email">Correo</label>
		<input type="email" class="form-control" name="email" value="{{$user->email}}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-sm btn-primary">
		<span class="fas fa-save" aria-hidden="true"></span> Actualizar</button>
	
		</form>
	
		<form method="POST" action="{{ route('rrhh.users.password.reset', $user->id) }}" style="display: inline;">
			{{ method_field('PUT') }} {{ csrf_field() }}
			<button class="btn btn-sm btn-outline-secondary"><span class="fas fa-redo" aria-hidden="true"></span> Restaurar clave</button>
		</form>
		<form method="POST" action="{{ route('rrhh.users.destroy', $user->id) }}" style="display: inline;">
			{{ method_field('DELETE') }} {{ csrf_field() }}
			<button class="btn btn-sm btn-danger"><span class="fas fa-trash" aria-hidden="true"></span> Eliminar</button>
		</form>
	</div>
@endsection