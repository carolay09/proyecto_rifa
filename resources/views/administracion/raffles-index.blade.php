@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <a href="{{route('raffles.create')}}" class="btn btn-primary my-3">Crear rifa</a>
    <h4 class="text-center">Lista de rifas</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Precio</td>
            <td>Cantidad Participante</td>
            <td>Producto</td>
            <td>Fecha Sorteo</td>
            <td>Estado</td>
            <td>Accion</td>
        </tr>
        @foreach ($raffles as $raffle)
            <tr>
                <td>{{$raffle->precioTicket}}</td>
                <td>{{$raffle->cantidadPart}}</td>
                <td>{{$raffle->nombreProducto}}</td>
                <td>{{$raffle->fechaSorteo}}</td>
                <td>{{$raffle->nombreEstado}}</td>
                <td>
                    <a href="{{route('raffles.edit', $raffle->id)}}" class="btn btn-primary">Editar</a>

                    <a href="{{route('raffles.mostrar', $raffle->id)}}" class="btn btn-primary">Ver Tickets</a>

                    <a href="{{route('raffles.edit', $raffle->id)}}" class="btn btn-primary">Elegir ganador</a>

                    <form action="{{route('raffles.update_state', $raffle->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="nombreEstado" value="{{$raffle->nombreEstado}}">
                        
                        <button type="submit" class="btn btn-danger">Cambiar estado</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection