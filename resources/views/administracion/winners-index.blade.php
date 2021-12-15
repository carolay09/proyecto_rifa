@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    
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
        </tr>
        @foreach ($winners as $winner)
            <tr>
                <td>{{$winner->dni}}</td>
                <td>{{$winner->nombre}}</td>
                <td>{{$winner->apellido}}</td>
                <td>{{$winner->telefono}}</td>
                <td>{{$winner->direccion}}</td>
                <td>{{$winner->email}}</td>
                <td>{{$winner->idRifa}}</td>
                <td>{{$winner->nroTicket}}</td>
                   
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection