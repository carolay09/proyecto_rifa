@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('categories.create')}}" class="btn btn-primary my-3">Crear categoria</a>
    <h4 class="text-center">Lista de categorias</h4>
    <table class="table">
        <tr>
            <td>Nombre</td>
            <td>Accion</td>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->nombre}}</td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Editar</a>
                    <form action="">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</section>

@endsection