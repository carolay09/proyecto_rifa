@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('products.create.admi')}}" class="btn btn-primary my-3">Crear producto</a>
    <h4 class="text-center">Lista de productos</h4>
    <table class="table">
        <tr>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Marca</td>
            <td>Detalle</td>
            <td>Precio</td>
            <td>Accion</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->nombre}}</td>
                <td>{{$product->descripcion}}</td>
                <td>{{$product->marca}}</td>
                <td>{{$product->detalle}}</td>
                <td>{{$product->precio}}</td>
                <td>
                    <a href="{{route('products.edit.admi', $product->id)}}" class="btn btn-primary">Editar</a>
                    <form action="">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</section>

@endsection