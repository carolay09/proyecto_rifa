@extends('cliente.layouts.menu2')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-9">
                <h4 class="third-color"><strong>PRODUCTOS</strong></h4>
                <hr class="linea third-color">
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
                                    <p>
                                        <div class="d-flex justify-content-center w-50">
                                            <input type="button" value="-" class="form-control">
                                            <input type="number" name="cantidad" value="1" id="" class="form-control text-center">
                                            <input type="button" value="+" class="form-control">
                                        </div>
                                    </p>
                                </td>
                                <td class="align-middle">
                                    S/. {{number_format($detail_sale->precioTicket * $detail_sale->cantidad, 2)}}
                                </td>
                                <td class="align-middle">
                                    {{-- <i class="fas fa-trash-alt"></i> --}}
                                    <form action="{{route('detail_sales.destroy', $detail_sale->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-center">Total</td>
                            <td></td>
                            <td>S/. {{number_format($total, 2)}}</td>
                            <td></td>
                        </tr>

                        {{-- <tr>
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
                                <td>S/. {{number_format($detail_sale->precioTicket, 2)}}</td>
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
                            </tr> --}}
                    </table>
                </div>
                @if (count($detail_sales))
                    <div class="d-flex justify-content-around my-5">
                        <a href="{{url('/')}}" class="btn btn-primary">Seguir comprando</a>
                        {{-- <form action="{{route('users.show', Auth::user())}}" method="get">
                            <input type="hidden" name="id_venta" value="{{$id_venta}}">
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </form> --}}
                        {{-- <a href="{{route('users.show', Auth::user())}}" class="btn btn-primary">Siguiente</a> --}}
                        <form action="{{route('sales.update', $sale_id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="total" value="{{$total}}">
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </form>
                    </div>
                @else
                    <p class="text-center py-5"><strong>No hay productos en su carrito</strong></p>
                @endif
            </div>
            <div class="col-3">
                <h4 class="third-color"><strong>RESUMEN</strong></h4>
                <hr class="linea third-color">
                <div class="row">
                    <p class="col-12 col-md-6 font-color">Valor regular: </p>
                    <p class="col-12 col-md-6 font-color">S/. {{number_format($total, 2)}}</p>
                </div>
                <div>
                    {{-- <form action="{{route('consultar_cupon')}}" method="post"> --}}
                    <form action="" method="post">
                        {{-- @csrf
                        @method('PATCH') --}}
                        <input type="hidden" name="idVenta" value="{{$sale_id}}">
                        <label for=""><strong>Cupón de descuento</strong></label>
                        <input type="text" name="nombre" class="form-control borde-input">
                        <button type="submit" class="btn btn-primary my-1 px-4" disabled>Aplicar cupón</button>
                    </form>
                </div>
                <hr class="linea third-color my-4">
                <div class="row">
                    <p class="col-12 col-md-6 font-color">Total</p>
                    <p class="col-12 col-md-6 font-color">S/. {{number_format($total, 2)}}</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $(".btnEliminar").click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var boton = $(this);

                $.ajax({
                    method: 'POST',
                    url: 'eliminarCarrito.php',
                    data: {
                        id: id
                    }
                }).done(function(respuesta) {
                    boton.parent('td').parent('tr').remove();
                });
            });


            $(".txtCantidad").keyup(function() {
                var cantidad = $(this).val();
                var precio = $(this).data('precio');
                var id = $(this).data('id');
                incrementar(cantidad, precio, id);
            });


            $(".btnIncrementar").click(function() {
                var precio = $(this).parent('div').parent('div').find('input').data('precio');
                var id = $(this).parent('div').parent('div').find('input').data('id');
                var cantidad = $(this).parent('div').parent('div').find('input').val();
                incrementar(cantidad, precio, id);
            });


            function incrementar(cantidad, precio, id) {
                var mult = parseFloat(cantidad) * parseFloat(precio);
                $(".cant" + id).text("$" + mult);
                $.ajax({
                    method: 'POST',
                    url: 'actualizar.php',
                    data: {
                        id: id,
                        cantidad: cantidad
                    }
                }).done(function(respuesta) {
                    boton.parent('td').parent('tr').remove();
                });
            }
        });
    </script>
    
@endsection