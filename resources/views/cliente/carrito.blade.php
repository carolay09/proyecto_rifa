@extends('cliente.layouts.app')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container">
        <table class="table">
            <tr>
                <td>nombre</td>
                <td>fecha de sorteo</td>
                <td>precio de ticket</td>
                <td>cantidad</td>
                <td>subtotal</td>
                <td>accion</td>
            </tr>
            @foreach ($detail_sales as $detail_sale)
                <tr>
                    <td>{{$detail_sale->nombre}}</td>
                    <td>{{$detail_sale->fechaSorteo}}</td>
                    <td>{{$detail_sale->precioTicket}}</td>
                    <td>{{$detail_sale->cantidad}}</td>
                    <td>{{$detail_sale->precio * $detail_sale->cantidad}}</td>
                    <td>
                        <form action="{{route('detail_sales.destroy', $detail_sale->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection