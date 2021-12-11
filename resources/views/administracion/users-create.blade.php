@extends('administracion/layouts/dashboard')

@section('title', 'Crear usuario')
    
@section('content')
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">

        <label for="" class="label-control">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido">

        <label for="" class="label-control">Telefono</label>
        <input type="text" name="telefono" class="form-control" placeholder="Ingrese Telefono">

        <label for="" class="label-control">Direccion</label>
        <input type="text" name="direccion" class="form-control" placeholder="Ingrese Direccion">

        <label for="" class="label-control">Correo</label>
        <input type="email" name="email" class="form-control" placeholder="Ingrese Correo">

        <label for="" class="label-control">Clave</label>
        <input type="text" name="password" class="form-control" placeholder="Ingrese Clave">

            
        <a href="{{route('users.index')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>
    
@endsection