@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('products.create.admi')}}" class="btn btn-primary my-3">Crear producto</a>
    <h4 class="text-center">Lista de productos</h4>
    <div class="table-responsive-xl">
        <table class="table">
            <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Marca</td>
                <td>Imagen</td>
                <td>Detalle</td>
                <td>Precio</td>
                <td>Categoria</td>
                <td>Estado</td>
                <td>Accion</td>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->nombre}}</td>
                    <td>{{$product->descripcion}}</td>
                    <td>{{$product->marca}}</td>
                    <td>{{$product->imagen}}</td>
                    <td>{{$product->detalle}}</td>
                    <td>{{$product->precio}}</td>
                    <td>{{$product->idCategoria}}</td>
                    <td>{{$product->idEstado}}</td>
                    <td>
                        <a href="{{route('products.edit.admi', $product->id)}}" class="btn btn-primary">Editar</a>
                        <form action="">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    
    </div>
</section>

@endsection