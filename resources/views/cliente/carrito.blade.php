@extends('cliente.layouts.menu2')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-12 col-md-9">
                <h4 class="third-color"><strong>PRODUCTOS</strong></h4>
                <hr class="linea third-color">
                @if (count($detail_sales))
                <div class="table-responsive-xl">
                    <table class="table">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($detail_sales as $detail_sale)
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="{{asset('storage'.'/'.$detail_sale->imagen)}}" alt="" class="imagen-icono">
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $total += $detail_sale->precioTicket * $detail_sale->cantidad;
                                        @endphp
                                    <p>{{$detail_sale->nombre}}</p>
                                    <p>S/. {{number_format($detail_sale->precio, 2)}}</p>
                                </td>
                                <td class="align-middle">
                                    @if ($detail_sale->cantidad == 1)
                                        {{$detail_sale->cantidad}} ticket
                                    @else
                                        {{$detail_sale->cantidad}} tickets
                                    @endif
                                </td>
                                <td class="align-middle">
                                    S/. {{number_format($detail_sale->precioTicket * $detail_sale->cantidad, 2)}}
                                </td>
                                <td class="align-middle">
                                    {{-- <i class="fas fa-trash-alt"></i> --}}
                                    <form action="{{route('detail_sales.destroy', $detail_sale->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="cantidad" value="{{$detail_sale->cantidad}}">
                                        <input type="hidden" name="precio" value="{{$detail_sale->precio}}">
                                        <input type="hidden" name="idVenta" value="{{$sale->id}}">
                                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-center">Total</td>
                            <td></td>
                            <td></td>
                            <td>S/. {{number_format($total, 2)}}</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                
                <div class="d-flex justify-content-around my-5">
                    <a href="{{url('/')}}" class="btn boton-color text-white">Seguir comprando</a>
                    <form action="{{route('sales.update', $sale)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="total" value="{{$total}}">
                        <button type="submit" class="btn boton-color text-white">Siguiente</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-3">
                {{-- @livewire('coupon-apply') --}}
                <h4 class="third-color"><strong>RESUMEN</strong></h4>
                <hr class="linea third-color">
                <div class="row">
                    <p class="col-6 font-color">Valor regular: </p>
                    <p class="col-6 font-color">S/. {{number_format($total, 2)}}</p>
                </div>
                @if ($sale_cupon == null)                    
                
                    <div> 
                        <form action="{{route('consultar_cupon')}}" method="post">
                            @csrf
                            <input type="hidden" name="idVenta" value="{{$sale->id}}">
                            <label for=""><strong>Cupón de descuento</strong></label>
                            <input type="text" name="nombre" class="form-control borde-input">
                            @if (session()->has('mensaje'))
                                <div class="text-danger">
                                    {{session('mensaje')}}
                                </div>
                            @endif
                            <button type="submit" class="btn boton-color text-white my-1 px-4">Aplicar cupón</button>
                        </form>
                        <hr class="linea third-color my-4">
                        <div class="row">
                            <p class="col-12 col-md-6 font-color">Total</p>
                            <p class="col-12 col-md-6 font-color">S/. {{number_format($total, 2)}}</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <label for="" class="col-6 font-color">Descuento</label>
                        <p class="col-6 text-danger">S/. {{number_format($sale_cupon->descuento, 2)}}</p>
                    </div>
                    <hr class="linea third-color my-4">
                    <div class="row">
                        <p class="col-6 font-color">Total</p>
                        @if ($total-$sale_cupon->descuento <= 0)
                            <p class="col-6 font-color text-success">S/. 0.00</p>
                        @else
                            <p class="col-6 font-color text-success">S/. {{number_format($total-$sale_cupon->descuento, 2)}}</p>
                        @endif
                    </div>
                @endif
            </div>
            @else
                <p class="text-center py-5"><strong>No hay productos en su carrito</strong></p>
            @endif
            
        </div>
    </section>

    
@endsection