@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    @livewire('show-tickets')
    {{-- <h4 class="text-center">Tickets de la rifa</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Numero de ticket</td>
            <td>Dni</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Telefono</td>
            <td></td>
        </tr>
        @foreach ($raffle as $ticket)
            <tr>
                <td>{{$ticket->nroTicket}}</td>
                <td>{{$ticket->dni}}</td>                
                <td>{{$ticket->nombre}}</td>
                <td>{{$ticket->apellido}}</td>
                <td>{{$ticket->email}}</td>
                <td>{{$ticket->telefono}}</td>
                <td>
                    <form action="{{route('winners.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="nroTicket" value="{{$ticket->nroTicket}}">
                        <input type="hidden" name="idRifa" value="{{$ticket->idRifa}}">
                        <input type="hidden" name="idUsuario" value="{{$ticket->idUsuario}}">
                        <button type="submit" class="btn btn-primary">Elegir ganador</button>
                    </form>
                </td>
            </tr>
        @endforeach
    
    </table>
    <a href="{{route('raffles.index')}}" class="btn btn-primary">Regresar</a>
</div>
</section> --}}

@endsection