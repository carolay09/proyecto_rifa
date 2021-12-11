@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('users.create')}}" class="btn btn-primary my-3">Crear usuario</a>
    <h4 class="text-center">Lista de usuarios</h4>
    <div class="table-responsive-xl">
    <table class="table" style="max-width: 50%">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Telefono</td>
            <td>Direccion</td>
            <td>Correo</td>
            <td>Rol</td>
            <td>Estado</td>
            <td>Accion</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellido}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->direccion}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->nombreRol}}</td>
                <td>{{$user->nombreEstado}}</td>
                <td>
                    
                    <form action="{{route('users.destroy', $user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection