@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('categories.create')}}" class="btn btn-primary my-3">Crear categoria</a>
    <h4 class="text-center">Lista de categorias</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Nombre</td>
            <td>Imagen</td>
            <td>Estado</td>
            <td>Accion</td>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->nombre}}</td>
                <td><img src="{{asset('storage').'/'.$category->imagen}}" width="100" alt=""></td>
                <td>{{$category->nombreEstado}}</td>
                <td>
                    
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Editar</a>
                    {{-- <form action="{{route('categories.edit', $category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form> --}}
                    {{-- <a href="{{route('categories.destroy', $category->id)}}" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Eliminar</a>    --}}
                    <form action="{{route('categories.update-state', $category->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="nombreEstado" value="{{$category->nombreEstado}}">
                        
                        <button type="submit" class="btn btn-danger">Cambiar estado</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection