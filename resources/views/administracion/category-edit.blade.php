@extends('administracion/layouts/dashboard')

@section('title', 'Categorias|Editar')
    
@section('content')
    <section class="container">
        <h4 class="text-center">Edición de categorias</h4>
        <div class="row justify-content-md-center">
        <form action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label for="" class="label-control">Nombre</label>
            <input type="text" name="nombre" class="form-control" value=" {{$category->nombre}}">
            <br>

            <label for="" class="label-control">Imagen</label>
            <br>
            <img src="{{asset('storage').'/'.$category->imagen}}" width="100" alt="">
            <br>
            <br>
            <input type="file" name="imagen" id="imagen" value="">
            
            <br>
            <br>

             <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-secondary">Guardar</button>

        </form>
        </div>
    </section>
@endsection