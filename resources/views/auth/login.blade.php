@extends('layouts.app_principal')

@section('container')
<h1 class="text-center">Login</h1>

<div class="container w-50">
    <form action="{{route('LoginStore')}}" method="post">
        @csrf

        @if (session('mensaje'))
            <div class="form-group">
                <div class="alert alert-danger">
                    <p>{{session('mensaje')}}</p>
                </div>
            </div>
        @endif
        
        <div class="form-group">
            <label for="username" class="form-label">Usuario: </label>
            <input type="text" name="username" id="username" class="form-control"
            placeholder="Ingresa tu nombre de usuario">
            @error('username')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control" 
            placeholder="Escribe tu contraseña">
            @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group d-flex m-4 justify-content-around">
            <button type="submit" class="btn btn-success">Iniciar sesión</button>
            <a href="{{route('main')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection