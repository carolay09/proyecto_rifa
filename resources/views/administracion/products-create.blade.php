@extends('administracion/layouts/dashboard')

@section('title', 'Crear producto')
    
@section('content')
    <form action="{{route('products.store.admi')}}" method="post">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">

        <label for="" class="label-control">Descripcion</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion">

        <label for="" class="label-control">Marca</label>
        <input type="text" name="marca" class="form-control" placeholder="Ingrese la marca">

        <label for="" class="label-control">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Ingrese el detalle">

        <label for="" class="label-control">Precio</label>
        <input type="number" name="precio" class="form-control" placeholder="Ingrese el precio">

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
@endsection