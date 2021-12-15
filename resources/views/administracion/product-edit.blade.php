@extends('administracion/layouts/dashboard')

@section('title', 'Productos|Editar')
    
@section('content')
    <section class="container">
        <h4 class="text-center">Edición de productos</h4>

        <div class="row justify-content-md-center">
        <form action="{{route('products.update.admi', $product)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label for="" class="label-control">Nombre</label>
            <input type="text" name="nombre" class="form-control" value=" {{$product->nombre}}">

            <label for="" class="label-control">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" value="{{$product->descripcion}}">

            <label for="" class="label-control">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{$product->marca}}">

            <div class="row py-3">
                <div class="col-12 py-3">
                    <label for="" class="label-control">Imagen</label>
                    <img src="{{asset('storage').'/'.$product->imagen}}" width="150px" class="pl-5" alt="">
                </div>
                <div class="col-12 py-3">
                    <input type="file" name="imagen" id="imagen" value="" class="">
                </div>
            </div>
                  
                <label for="" class="label-control">Detalle</label>
                <input type="text" name="detalle" class="form-control" value="{{$product->detalle}}">

                <label for="" class="label-control">Precio</label>
            <input type="number" name="precio" class="form-control" value="{{$product->precio}}">

            <label for="" class="label-control">Categoria</label>
            <select name="categoria" id="" class="form-control">
                {{$cate = $product['idCategoria']}}
                 @foreach ($categories as $category)
                    @if ($cate == $category->id)
                        <option value="{{$category['id']}}" selected>{{$category['nombre']}}</option>
                    @else
                        <option value="{{$category['id']}}">{{$category['nombre']}}</option>
                    @endif
                        
                 @endforeach
            </select>

            <p class="d-flex justify-content-center py-3">
                <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                <a href="{{route('products.index.admi')}}" class="btn btn-primary mx-2">Cancelar</a>
            </p>
        </form>
        </div>
    </section>
@endsection