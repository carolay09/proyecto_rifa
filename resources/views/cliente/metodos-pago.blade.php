@extends('cliente.layouts.menu2')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-9">
                <h4 class="third-color"><strong>PAGOS</strong></h4>
                <hr class="linea third-color">
                <div class="py-3">
                    <p>Si pagarás con YAPE o PLIN:</p>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <img src="{{asset('images/yape-logo.jpg')}}" class="logo-metodo-pago" alt="">
                            <div class="borde p-0" >982027069</div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <img src="{{asset('images/plin-logo.png')}}" class="logo-metodo-pago" alt="">
                            <p>950012263</p>
                        </div>
                    </div>
                </div>
                <div class="py-3">
                    <p>Si pagarás con una transferencia bancaria:</p>
                    <div class="d-flex">
                        <img src="{{asset('images/interbank-logo.jpg')}}" class="logo-metodo-pago" alt="">
                        <div class="">
                            <p>Cuenta Ahorros Soles: 2003126615952</p>
                            <p>Cuenta interbancaria: 00320001312661595237</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img src="{{asset('images/bcp-logo.png')}}" class="logo-metodo-pago" alt="">
                        <div class="">
                            <p>Cuenta Ahorros Soles: 19135899685005</p>
                            <p>Cuenta interbancaria: 00219113589968500554</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('actualizar-estado', $sale->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <label for="" class="label-control">Ingresa tu código de operación</label>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control borde-input" name="nroOperacion">
                            @if (Session::has('mensaje'))
                                <div class="text-danger">{{Session::get('mensaje')}}</div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-danger">Finalizar compra</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <h4 class="third-color"><strong>RESUMEN</strong></h4>
                <hr class="linea third-color">
                <div class="row">
                    <p class="col-12 col-md-6 font-color">Valor regular: </p>
                    <p class="col-12 col-md-6 font-color">S/. {{number_format($sale->total, 2)}}</p>
                </div>
                <div>
                    <form action="">
                        <label for=""><strong>Cupón de descuento</strong></label>
                        <input type="text" name="cupon" class="form-control borde-input">
                        <button type="submit" class="btn btn-primary my-1 px-4">Aplicar cupón</button>
                    </form>
                </div>
                <hr class="linea third-color my-4">
                <div class="row">
                    <p class="col-12 col-md-6 font-color">Total</p>
                    <p class="col-12 col-md-6 font-color">S/. {{number_format($sale->total, 2)}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection