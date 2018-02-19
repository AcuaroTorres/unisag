@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

<div class="row justify-content-end">
	<form class="form-inline" method="GET" action="{{ route('rrhh.users.index') }}">
		<div class="form-group">
			<input type="text" name="name" placeholder="Buscar usuario por nombre" id="inputUsuario" class="form-control" >
			<button class="btn btn-primary" type="submit">
		    	<span class="fa fa-search" aria-hidden="true"></span>
			</button>
		</div>
	</form>
</div>

<br>

<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th scope="col">RUN</th>
			<th scope="col">Nombre</th>
			<th scope="col" class="hidden-xs">Roles</th>
			<th scope="col">Accion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<th scope="row">{{ $user->runFormat() }}</td>
			<td>{{ $user->name }}</td>
			<td class="hidden-xs">
			@foreach($user->roles as $rol)
				<span class="label label-<?=($rol->name == 'Admin')?'danger':'primary';?>"> {{ $rol->name }} </span>&nbsp;
			@endforeach
			</td>
			<td>
				<a href="{{ route('rrhh.users.edit',$user->id) }}" class="btn btn-warning">
				<span class="fa fa-edit" aria-hidden="true"></span></a>			
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $users->render() }}
		

@endsection