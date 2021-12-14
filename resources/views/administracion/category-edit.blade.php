@extends('administracion/layouts/dashboard')

@section('title', 'Categorias|Editar')
    
@section('content')
    <section class="container">

    <h4 class="text-center">Edición de categorias</h4>

    
    <form action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data" class="py-5">

            @csrf
            @method('PATCH')

            <label for="" class="label-control">Nombre</label>
            <input type="text" name="nombre" class="form-control" value=" {{$category->nombre}}">
            <div class="row py-3">
                <div class="col-12 py-3">
                    <label for="" class="label-control">Imagen</label>
                    <img src="{{asset('storage').'/'.$category->imagen}}" width="150px" class="pl-5" alt="">
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