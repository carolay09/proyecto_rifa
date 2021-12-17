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
                    <div class="metodos-pago d-flex justify-content-center">
                        <div class="d-flex px-5">
                            <img src="{{asset('images/yape.png')}}" class="logo-metodo-pago" alt="">
                            <p class="px-3 m-0 d-flex align-items-center borde">982027069</p>
                        </div>
                        <div class="d-flex px-5">
                            <img src="{{asset('images/plin.png')}}" class="logo-metodo-pago" alt="">
                            <p class="px-3 m-0 d-flex align-items-center borde">950012263</p>
                        </div>

                    </div>
                                       
               
                </div>
                <div class="py-3">
                    <p>Si pagarás con una transferencia bancaria:</p>
                    <div class="metodos-pago d-flex flex-column">
                        <div class="d-flex px-5 py-2 mx-auto">
                            <img src="{{asset('images/interbank.png')}}" class="logo-metodo-pago" alt="">
                            <div class="d-inline-block borde">
                                <p class="px-3 m-0 d-flex align-items-center">Cuenta Ahorros Soles: 2003126615952</p>
                                <p class="px-3 m-0 d-flex align-items-center">Cuenta interbancaria: 00320001312661595237</p>
                            </div>
                        </div>
                        <div class="d-flex px-5 py-2 mx-auto">
                            <img src="{{asset('images/bcp.png')}}" class="logo-metodo-pago" alt="">
                            <div class="d-inline-block">
                                <div class="borde">
                                    <p class="px-3 m-0 d-flex align-items-center">Cuenta Ahorros Soles: 19135899685005</p>
                                    <p class="px-3 m-0 d-flex align-items-center">Cuenta interbancaria: 00219113589968500554</p>
                                </div>
                            </div>
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