<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @auth
            <ul class="nav navbar-nav">

                <li class="dropdown @if(Route::currentRouteName()=='rrhh.users.index' OR Route::currentRouteName()=='rrhh.users.create')active @endif">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RRHH <span class="caret"></span></a>
                  <ul class="dropdown-menu">                    

                    <li class="@if(Route::currentRouteName()=='rrhh.users.create')active @endif">
                      <a href="{{ route('rrhh.users.create') }}">Crear Usuario</a></li>

                    <li class="@if(Route::currentRouteName()=='rrhh.users.index')active @endif">
                      <a href="{{ route('rrhh.users.index') }}">Listar Usuarios</a></li>

                  </ul>
                </li>

            </ul>
            @endauth

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <?php /* <li><a href="{{ route('register') }}">Register</a></li> */ ?>
                @else
                    <li class="dropdown @if(Route::currentRouteName()=='rrhh.password.edit')active @endif">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">

                            <li class="@if(Route::currentRouteName()=='rrhh.users.password.edit')active @endif">
                                <a href="{{ route('rrhh.users.password.edit') }}">Cambiar Clave</a></li>
                            
                            <li role="separator" class="divider"></li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
