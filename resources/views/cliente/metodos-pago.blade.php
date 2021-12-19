@extends('cliente.layouts.menu2')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-12 col-md-9">
                <h4 class="third-color"><strong>PAGOS</strong></h4>
                <hr class="linea third-color">
                <div class="py-3">
                    <p>Si pagarás con YAPE o PLIN:</p>
                    <div class="metodos-pago row">
                        <div class="col-12 col-md-6">
                            <div class="d-flex justify-content-center py-2">
                                <p class="mx-3">YAPE</p>
                                <img src="{{asset('images/yape.png')}}" class="logo-metodo-pago" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="borde">982027069</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="d-flex justify-content-center py-2">
                                <p class="mx-3">PLIN</p>
                                <img src="{{asset('images/plin.png')}}" class="logo-metodo-pago" alt="">
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="borde">950012263</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3">
                    <p>Si pagarás con una transferencia bancaria:</p>
                    <div class="metodos-pago">
                        <div class="my-3">
                            <div class="d-flex justify-content-center py-2">
                                <p class="mx-3">Interbank</p>
                                <img src="{{asset('images/interbank.png')}}" class="logo-metodo-pago" alt="">
                            </div>
                            <div class="d-flex">
                                <div class="borde d-inline mx-auto">
                                    <div class="row">
                                        <p class="col-12 col-md-6">
                                            Cuenta Ahorros Soles:
                                        </p>
                                        <p class="col-12 col-md-6">
                                            2003126615952
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-12 col-md-6">
                                            Cuenta interbancaria:
                                        </p>
                                        <p class="col-12 col-md-6">
                                            00320001312661595237
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="d-flex justify-content-center py-2">
                                <p class="mx-3">BCP</p>
                                <img src="{{asset('images/bcp.png')}}" class="logo-metodo-pago" alt="">
                            </div>
                            <div class="d-flex">
                                <div class="borde d-inline mx-auto">
                                    <div class="row">
                                        <p class="col-12 col-md-6">
                                            Cuenta Ahorros Soles: 
                                        </p>
                                        <p class="col-12 col-md-6">
                                            19135899685005
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="col-12 col-md-6">
                                            Cuenta interbancaria: 
                                        </p>
                                        <p class="col-12 col-md-6">
                                            00219113589968500554
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-12 col-md-3">
                <h4 class="third-color"><strong>RESUMEN</strong></h4>
                <hr class="linea third-color">
                <div class="row">
                    <p class="col-6 font-color">Valor regular: </p>
                    <p class="col-6 font-color">S/. {{number_format($sale->total, 2)}}</p>
                </div>
                <div class="row">
                    <label for="" class="col-6 font-color">Descuento</label>
                    @if (isset($cupon))
                        <p class="col-6 text-danger">S/. {{number_format($cupon->descuento, 2)}}</p>
                    @else  
                        <p class="col-6 text-danger">S/. 0.00</p>  
                    @endif
                </div>
                <hr class="linea third-color my-4">
                <div class="row">
                    <p class="col-6 font-color">Total</p>
                    @if (isset($cupon))
                        @if ($sale->total-$cupon->descuento <= 0)
                            <p class="col-6 text-success">S/. 0.00</p>
                        @else
                            <p class="col-6 text-success">S/. {{number_format($sale->total-$cupon->descuento, 2)}}</p>
                        @endif
                    @else
                        <p class="col-6 text-success">S/. {{number_format($sale->total, 2)}}</p>
                    @endif
                </div>

                <form action="{{route('actualizar-estado', $sale->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <label for="" class="label-control py-3">Ingresa tu código de operación</label>
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control borde-input" name="nroOperacion" value="{{old('nroOperacion')}}">
                            @error('nroOperacion')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            @if (Session::has('mensaje'))
                                <div class="text-danger">{{Session::get('mensaje')}}</div>
                            @endif
                        </div>
                        <div class="col-12 py-3">
                            <p class="text-center"><button type="submit" class="btn btn-danger">Finalizar compra</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection