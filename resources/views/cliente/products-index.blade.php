@extends('cliente/layouts/app')

@section('title', 'Home')
    
@section('content')
    <section class="container">
        <h2 class="text-center my-5">Estos productos pueden ser tuyos!!!</h2>
        <div class="row">
            @foreach ($products as $product)  
            <div class="col col-md-6 col-lg-4 card-group">
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
            </div>
            @endforeach
        </div>
    </section>
@endsection