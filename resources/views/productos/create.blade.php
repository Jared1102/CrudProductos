@extends('layouts.app')

@section('container')
<h1 class="text-center">Nuevo Producto</h1>

<div class="container w-50">
    <form action="{{route('productosStore')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
            @error('nombre')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción: </label>
            <input type="text" name="descripcion" id="descripcion" class="form-control"
            value="{{old('descripcion')}}">
            @error('descripcion')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio" class="form-label">Precio: </label>
            <input type="text" name="precio" id="precio" class="form-control" 
            value="{{old('precio')}}">
            @error('precio')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="categoria" class="form-label">Categoria</label>
            <select name="categoria" class="form-select">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            @error('categoria')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group d-flex m-4 justify-content-around">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{route('productos')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

@endsection