@extends('administracion/layouts/dashboard')

@section('title', 'Crear categoria')
    
@section('content')
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese la categoria">
        
        <label for="" class="label-control">Imagen</label>
        <input type="file" name="imagen" id="imagen">

        <a href="{{route('categories.index')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>
    
@endsection