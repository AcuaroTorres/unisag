@extends('layouts.app')

@section('title', config('app.name') . ' - Home')

@section('content')

<h3>Home</h3>

<div class="row">
    <div class="col-8">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dashboard</h5>

                @if (session('status'))
                <div class="alert alert-primary" role="alert">
                    {{ session('status') }}
                </div>
                @endif

            </div>
        </div>

    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dashboard</h5>
                
                @if(Auth::user()->hasRole('Admin'))
                <h6 class="card-subtitle mb-2 text-muted">Acceso como Administrador</h6>
                @endif

                <p class="card-text">You are logged in!</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>

</div>

@endsection