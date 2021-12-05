@extends('administracion/layouts/dashboard')

@section('title', 'Productos|Editar')
    
@section('content')
    <section class="container">
        <form action="{{route('products.update.admi', $product)}}" method="post">
            @csrf
            @method('PATCH')

            <label for="" class="label-control">Nombre</label>
            <input type="text" name="nombre" value={{$product->nombre}} class="form-control" placeholder="Ingrese el nombre">

            <label for="" class="label-control">Descripcion</label>
            <input type="text" name="descripcion" value={{$product->descripcion}} class="form-control" placeholder="Ingrese la descripcion">

            <label for="" class="label-control">Marca</label>
            <input type="text" name="marca" value={{$product->marca}} class="form-control" placeholder="Ingrese la marca">

            <label for="" class="label-control">Detalle</label>
            <input type="text" name="detalle" value={{$product->detalle}} class="form-control" placeholder="Ingrese el detalle">

            <label for="" class="label-control">Precio</label>
            <input type="number" name="precio" value={{$product->precio}} class="form-control" placeholder="Ingrese el precio">

            <label for="" class="label-control">Categoria</label>
            <select name="estado" id="" class="form-control">
                <option value="" selected>Seleccione</option>
                <option value="1">Telefonía</option>
                <option value="2">Ropa</option>
            </select>

            <label for="" class="label-control">Estado</label>
            <select name="categoria" id="" class="form-control">
                <option value="" selected>Seleccione</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>

            <button type="submit">Guardar</button>
        </form>
    </section>
@endsection