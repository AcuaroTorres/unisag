@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
    	<h3 class="panel-title">Lista de usuarios</h3>
  	</div>
  	<div class="panel-body">

		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Roles</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->runFormat() }}</td>
					<td>{{ $user->name }}</td>
					<td>
					@foreach($user->roles as $rol)
						<span class="label label-<?=($rol->name == 'Admin')?'danger':'primary';?>"> {{ $rol->name }} </span>&nbsp;
					@endforeach
					</td>
					<td>
						<a href="{{ route('rrhh.users.edit',$user->id) }}" class="btn btn-warning">
						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>			
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $users->render() }}
		
	</div>
</div>
@endsection