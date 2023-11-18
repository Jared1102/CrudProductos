@extends('layouts.app_principal')

@section('container')
<h1 class="text-center">Registro</h1>

<div class="container w-50">
    <form action="{{route('RegistroStore')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nombre: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"
            placeholder="Escribe tu nombre">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username" class="form-label">Usuario: </label>
            <input type="text" name="username" id="username" class="form-control"
            value="{{old('username')}}" placeholder="Crea tu nombre de usuario">
            @error('username')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Correo electrónico: </label>
            <input type="email" name="email" id="email" class="form-control" 
            placeholder="Escribe tu correo de gmail/outlook/slack">
            @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control" 
            placeholder="Escribe tu contraseña">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Repetir contraseña: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" 
            placeholder="Vuelve a escribir tu contraseña">
            @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group d-flex m-4 justify-content-around">
            <button type="submit" class="btn btn-success">Crear cuenta</button>
            <a href="{{route('main')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection