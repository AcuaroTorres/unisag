<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link" href="{{ route('rrhh.users.index') }}"><span class="fa fa-search"></span> </a>
	</li>

	<li class="nav-item">
		<a class="nav-link @if(Route::currentRouteName()=='rrhh.users.edit')active @endif" href="{{ route('rrhh.users.edit',$user->id) }}">
			<span class="fa fa-user"></span> <span class="d-none d-sm-inline"> Perfil</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link @if(Route::currentRouteName()=='rrhh.roles.index')active @endif" href="{{ route('rrhh.roles.index', $user->id) }}">
			<span class="fa fa-wrench"></span> <span class="d-none d-sm-inline"> Roles</span></a>
	</li>

</ul>

<br>