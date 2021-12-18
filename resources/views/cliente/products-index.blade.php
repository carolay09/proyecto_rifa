@extends('cliente/layouts/menu2')

@section('title', 'Home')
    
@section('content')
    <section class="container">
        <h2 class="text-center my-5 text-uppercase third-color"><strong>{{$categoria}}</strong></h2>
        <div class="row">
            @foreach ($products as $product)  
                <div class="col-12 col-md-6 col-lg-4 card-group">
                    <div class="card mb-3">
                        <img src="{{asset('storage').'/'.$product->imagen}}" alt="">
                        <div class="p-3">
                            <p class="borde px-3 py-0 m-0 d-inline-block">Fecha sorteo: {{$product->fechaSorteo}}</p>
                            {{-- @php
                                $actual = date('Y-m-d');
                                $venc = date($product->fechaSorteo);
                                echo $actual;
                                echo $venc;
                                $diff = $venc->diff($actual);
                                echo $diff->days.' dias'
                                // echo date_diff($venc, $actual);
                            @endphp --}}
                            {{-- <p>Quedan {{date_diff(strtotime(date('Y-m-d')), strtotime($product->fechaSorteo))}} días</p> --}}
                            <h4 class="font-color my-1">{{$product->nombProd}}</h4>
                            <div class="d-flex justify-content-between">
                                <p class="font-color m-0">Valor real del producto</p>
                                <p class="font-color m-0">S/. {{$product->precio}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="font-color m-0">Precio por ticket</p>
                                <p class="font-color m-0">S/. {{$product->precioTicket}}</p>
                            </div>
                            <p class="text-center">
                                <a href="{{route('products.show', $product->idProduct)}}" class="btn boton-color text-white">Comprar</a>
                            </p>
                        </div>
                    </div>
                </div>
            {{-- <div class="col col-md-6 col-lg-4 card-group">
                <div class="card mb-3">
                    <img src="images/producto.jpeg" class="">
                    <div class="card-body bg-dark text-light">
                        <h4 class="card-title">{{$product->nombre}}</h4>
                        <p class="card-text">S/. {{number_format($product->precio, 2)}}</p>
                        
                        <p class="text-center">
                            <a href="{{route('products.show', $product)}}" class="btn btn-primary">Lo quiero!!!</a>
                        </p>
                    </div>
                </div>
            </div> --}}
            @endforeach
        </div>
    </section>
@endsection