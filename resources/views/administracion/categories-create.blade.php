@extends('administracion/layouts/dashboard')

@section('title', 'Crear categoria')
    
@section('content')

<h4 class="text-center">Creación de categorias</h4>
<div class="row justify-content-md-center">
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese la categoria">
        <br>

        <label for="" class="label-control">Imagen</label>
        <br>
        <input type="file" name="imagen" id="imagen">
        <br>
        <br>
        

        <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
</div>
    
@endsection