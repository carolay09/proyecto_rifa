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
                    {{-- <td><img src="{{asset('images/logo.jpeg')}}" alt="" style="width: 100px"></td> --}}
                    {{-- {{-- <td>{{<img src="{{asset('images/logo.jpeg')}}" ></td> --}}
                    <td><img src="{{asset('storage').'/'.$product->imagen}}" width="100" alt=""></td>
                    <td>{{$product->detalle}}</td>
                    <td>{{$product->precio}}</td>
                    <td>{{$product->nombreCategoria}}</td>
                    <td>{{$product->nombreEstado}}</td>
                    <td>
                        <a href="{{route('products.edit.admi', $product->id)}}" class="btn btn-primary">Editar</a>
                                   
                        <form action="{{route('products.update_state', $product->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="nombreEstado" value="{{$product->nombreEstado}}">
                            
                            <button type="submit" class="btn btn-danger">Cambiar estado</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    
    </div>
</section>

@endsection

