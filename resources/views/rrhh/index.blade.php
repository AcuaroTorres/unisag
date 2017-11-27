@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Roles</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
				@foreach($user->roles as $rol)
					<span class="label label-<?=($rol->name == 'Admin')?'danger':'primary';?>"> {{ $rol->name }} </span>&nbsp;
				@endforeach
				</td>
				<td>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->render() }}
@endsection