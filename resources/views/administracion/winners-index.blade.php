@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('categories.create')}}" class="btn btn-primary my-3">Crear ganador</a>
    <h4 class="text-center">Lista de ganadores</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Dni</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Telefono</td>
            <td>Direccion</td>
            <td>Correo</td>
            <td>Rifa</td>
            <td>Ticket</td>
            <td>Accion</td>
        </tr>
        @foreach ($winners as $winner)
            <tr>
                <td>{{$winner->dniU}}</td>
                <td>{{$winner->nombreU}}</td>
                <td>{{$winner->apellidoU}}</td>
                <td>{{$winner->telefonoU}}</td>
                <td>{{$winner->direccionU}}</td>
                <td>{{$winner->emailU}}</td>
                <td>{{$winner->rifaU}}</td>
                <td>{{$winner->ticketU}}</td>
                   
                    <a href="{{route('winners.edit', $winner->id)}}" class="btn btn-primary">Editar</a>
                    <form action="{{route('winners.update-state', $winner->id)}}" method="post">
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