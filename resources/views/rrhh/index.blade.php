@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')


<form class="form-inline float-right" method="GET" action="{{ route('rrhh.users.index') }}">
	<div class="input-group mb-3">
		<input type="text" name="name" class="form-control" placeholder="Buscar usuario por nombre">
		<div class="input-group-append">
			<button class="btn btn-outline-secondary" type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
		</div>
	</div>
</form>


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
				<span class="fas fa-edit" aria-hidden="true"></span></a>			
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $users->render() }}
		

@endsection