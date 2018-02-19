@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center">

    <div class="col-md-auto">
        <h3>Inicia Sesión</h3>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="run">RUN</label>
                <input type="integer" id="run" name="run" autofocus="autofocus" required="required" value="{{ old('run') }}"
                        class="form-control {{ $errors->has('run') ? 'is-invalid' : '' }}" >
                @if ($errors->has('run'))
                    <div class="invalid-feedback">{{ $errors->first('run') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Clave</label>
                <input type="password" name="password" id="password" placeholder="Clave" required="required"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Recordarme</label>
            </div>

            <br>
            
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            
            <a class="btn btn-link" href="{{ route('password.request') }}">Recuperar clave</a>
        </form>

    </div>

</div>


@endsection