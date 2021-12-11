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
            <td>Accion</td>
        </tr>
        @foreach ($raffles as $raffle)
            <tr>
                <td>{{$raffle->precioTicket}}</td>
                <td>{{$raffle->cantidadPart}}</td>
                <td>{{$raffle->idProducto}}</td>
                <td>{{$raffle->fechaSorteo}}</td>
                <td>
                    <a href="{{route('raffles.edit', $raffle->id)}}" class="btn btn-primary">Editar</a>
                    <form action="{{route('raffles.destroy', $raffle)}}" method="POST">
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