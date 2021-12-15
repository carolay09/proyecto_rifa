@extends('administracion/layouts/dashboard')

@section('title', 'Crear categoria')
    
@section('content')

<section class="container">

<h4 class="text-center">Creación de categorias</h4>
<div class="row justify-content-md-center">
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese la categoria">

        <div class="row py-3">
            <div class="col-12 py-3">
                <label for="" class="label-control">Imagen</label>
            </div>
            <div class="col-12 py-3">
                <input type="file" name="imagen" id="imagen" value="" class="">
            </div>
        </div>

        <p class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mx-2">Guardar</button>
            <a href="{{route('categories.index')}}" class="btn btn-primary mx-2">Cancelar</a>
        </p>        

        
    </form>
</div>
</section>
    
@endsection