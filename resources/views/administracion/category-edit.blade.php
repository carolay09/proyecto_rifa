@extends('administracion/layouts/dashboard')

@section('title', 'Categorias|Editar')
    
@section('content')
    <section class="container">
        <form action="{{route('categories.update', $category)}}" method="post" >
            @csrf
            @method('PATCH')

            <label for="" class="label-control">Nombre</label>
            <input type="text" name="nombre" class="form-control" value=" {{$category->nombre}}">

            <label for="" class="label-control">Imagen</label>
            <img src="{{asset('storage').'/'.$category->imagen}}" width="100" alt="">
            <input type="file" name="imagen" id="imagen" value="">

             <a href="{{route('categories.index')}}">Cancelar</a>
            <button type="submit">Guardar</button>

        </form>
    </section>
@endsection