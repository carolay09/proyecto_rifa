@extends('cliente/layouts/menu')

@section('title')
    
@section('content')
    <section class="">
        <div class="row">
            <div class="col-6">
                <img src="{{asset('images/producto.jpeg')}}" class="image-fluid" alt="" style="max-width: 100%">
            </div>
            <div class="col-6">
                <div class="container d-flex flex-column mt-5">
                    {{-- aqui va el formulario y detalles --}}
                    <p class="mb-3">Nombre: {{$product->nombre}}</p>
                    <p class="mb-3">Descripcion: {{$product->descripcion}}</p>
                    <p class="mb-3">Marca: {{$product->marca}}</p>
                    <p class="mb-3">Detalle: {{$product->detalle}}</p>
                    <p class="mb-3">Precio: {{$product->precio}}</p>
                    <p class="mb-3">Objetivo: </p>
                    <div id="myProgress" class="mb-3 text-center">
                        <div id="myBar">
                            <div id="label">50%</div>
                        </div>
                    </div>
                    <p class="mb-3">¿Cuántos rifas quieres comprar?</p>
                    <form action="{{route('detail_sales.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="precio" value="{{$product->precio}}">
                        <div class="d-flex justify-content-center">
                            <input type="button" value="-" class="form-control">
                            <input type="number" name="cantidad" value="1" id="" class="form-control text-center">
                            <input type="button" value="+" class="form-control">
                        </div>
                        <p class="text-center my-3">
                            <button type="submit" class="btn btn-primary">Enviar al carrito</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection