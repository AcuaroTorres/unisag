@extends('layouts.app')

@section('title', 'Asignar roles a Usuario')

@section('content')

@include('rrhh.submenu')

<h3>Asignar roles a: <strong> {{ $user->name }} </strong> ({{ $user->runFormat() }})</h3>
  		
<form class="form-horizontal" method="POST" action="{{ route('rrhh.roles.attach',$user->id) }}">
	{{ csrf_field() }}
	<input type="hidden" name="user_id" value="{{ $user->id }}">


	<table class="table table-striped">
		<thead>
			<tr>
				<th style="width: 100px">Seleccion</th>
				<th>Nombre</th>
				<th>Descripcion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $rol)
			
			<tr>
				<td>
					<div class="form-check">
						<input class="form-check-input position-static" type="checkbox" name="roles[{{ $rol->id }}]" 
						@if($user->hasRole($rol->name)) checked @endif>
					</div>
				</td>
				<td>{{ $rol->name }}</td>
				<td>{{ $rol->description }} </td>
			</tr>
			@endforeach

		</tbody>
	</table>

	<input type="submit" class="btn btn-primary" value="Guardar">
</form>

@endsection