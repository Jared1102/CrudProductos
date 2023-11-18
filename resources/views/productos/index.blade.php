@extends('layouts.app')

@section('container')
<h1 class="text-center">Productos</h1>
<div class="container">
    <form action="{{route('productosCreate')}}" method="get">
        <button type="submit" class="btn btn-primary mb-2">
            <span class="p-4">Nuevo</span></button>
    </form>

    <table class="table table-responsive table-striped">
        <thead>
            <tr class="table-danger">
                <td>Id</td>
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Precio</td>
                <td>Acciones</td>
                <td>Categoria</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>${{$producto->precio}}</td>
                    <td>{{$producto->categoria->nombre}}</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-success mx-1" href="{{route('ProductosEdit',
                                $producto->id)}}">Editar</a>
                            <form action="{{route('ProductosDestroy',
                            $producto->id)}}" method="post" class="formulario-eliminar">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger mx-1">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$productos->links('pagination::bootstrap-5')}}
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
 const formularios = document.querySelectorAll('.formulario-eliminar');
 
 formularios.forEach(formulario => {
 formulario.addEventListener('submit', function(e) {
    e.preventDefault();
 
    Swal.fire({
    title: '¿Estás seguro?',
    text: '¡Esta acción no es reversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar'
 }).then((result) => {
 if (result.isConfirmed) {
 this.submit();
 }
 });
 });
 });
 });
</script>
@endsection