@extends('cliente.layouts.app')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container">
        <h4 class="text-center my-5">Tus Tickets</h4>
        <table class="table">
            <tr>
                <td>nombre</td>
                <td>fecha de sorteo</td>
                <td>precio de ticket</td>
                <td>cantidad</td>
                <td>subtotal</td>
                <td>accion</td>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach ($detail_sales as $detail_sale)
                @php
                    $total += $detail_sale->precio * $detail_sale->cantidad;
                @endphp
                <tr>
                    <td>{{$detail_sale->nombre}}</td>
                    <td>{{$detail_sale->fechaSorteo}}</td>
                    <td>{{$detail_sale->precioTicket}}</td>
                    <td>{{$detail_sale->cantidad}}</td>
                    <td>S/. {{number_format($detail_sale->precio * $detail_sale->cantidad, 2)}}</td>
                    <td>
                        <form action="{{route('detail_sales.destroy', $detail_sale->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            echo("S/. ".number_format($total, 2));
                        @endphp
                    </td>
                    <td>
                        @if ($sale_id != null)
                            <form action="{{route('sales.update', $sale_id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="total" value="@php echo $total @endphp">
                                <button type="submit" class="btn btn-danger">Realizar compra</button>
                            </form>
                        @endif
                    </td>
                </tr>
        </table>
    </section>
@endsection