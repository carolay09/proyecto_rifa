@extends('administracion/layouts/dashboard')

@section('title', 'Crear categoria')
    
@section('content')
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese la categoria">
        
        <a href="{{route('categories.index')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>
    
@endsection