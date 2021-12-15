@extends('administracion/layouts/dashboard')

@section('title', 'Crear producto')
    
@section('content')
<section class="container">

    <h4 class="text-center">Creación de productos</h4>
    <div class="row justify-content-md-center">

    <form action="{{route('products.store.admi')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">

        <label for="" class="label-control">Descripcion</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion">

        <label for="" class="label-control">Marca</label>
        <input type="text" name="marca" class="form-control" placeholder="Ingrese la marca">

        <label for="" class="label-control">Imagen</label>
        <div class="col-12 py-3">
            <input type="file" name="imagen" id="imagen">
        </div>
                  
        <label for="" class="label-control">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Ingrese el detalle">

        <label for="" class="label-control">Precio</label>
        <input type="number" name="precio" class="form-control" placeholder="Ingrese el precio">

        <label for="" class="label-control">Categoria</label>
        <select name="categoria" id="" class="form-control">
            <option value="" selected>Seleccione</option>
            @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['nombre']}}</option>
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