@extends('cliente/layouts/menu2')

@section('title')
    
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{asset('images/producto.jpeg')}}" class="image-fluid" alt="" style="max-width: 100%">
                <div class="my-4 borde">
                    <p class="">Objetivo de la promoción</p>
                    @php
                        $objetivo = $cantPartActual / $product->cantidadPart * 100;
                    @endphp
                    <div id="myProgress" class="text-center">
                        <div id="myBar" style="width: @php echo $objetivo."%"; @endphp">                          
                            <div id="label">@php echo $objetivo."%"; @endphp</div> 
                        </div>
                    </div>
                </div>
                <div class="borde w-50 text-center p-0">
                    <i class="fas fa-file-alt"></i>
                    <p class="p-0 m-0">TÉRMINOS Y CONDICIONES</p>
                </div>
            </div>
            <div class="col-6">
                <div class="w-75 mx-auto">
                    {{-- aqui va el formulario y detalles --}}
                    <p class="mb-3 text-center nombre-prod py-3 fs-2"><strong>{{$product->nombre}}</strong></p>
                    <div class="borde tamano-letra">
                        <div class="mb-4">
                            <p class="p-0 m-0">Fecha de inicio del sorteo:</p>
                            <p class="p-0 m-0">fecha</p>
                        </div>
                        <div class="mb-4">
                            <p class="p-0 m-0">Fecha límite para ingresar</p>
                            <p class="p-0 m-0">fecha</p>
                        </div>
                        <div class="mb-4">
                            <p class="p-0 m-0">Ganador anunciado</p>
                            <p class="p-0 m-0">fecha</p>
                        </div>
                        <div class="">
                            <p class="p-0 m-0">Valor minorista aproximado</p>
                            <p class="p-0 m-0">S/. {{$product->precio}}</p>
                        </div>

                        {{-- <p class="mb-3">Descripcion: {{$product->descripcion}}</p>
                        <p class="mb-3">Marca: {{$product->marca}}</p>
                        <p class="mb-3">Detalle: {{$product->detalle}}</p>
                        <p class="mb-3">Precio del producto: {{$product->precio}}</p>
                        <p class="mb-3">Precio del ticket: {{$product->precioTicket}}</p>
                        <p class="mb-3">Objetivo: </p> --}}
                    </div>
                    <button type="submit" class="btn btn-primary my-2 px-5">Agregar al carrito</button>
                    
                    {{-- </div> --}}
                    {{-- <p class="mb-3">¿Cuántos rifas quieres comprar?</p> --}}
                    {{-- <form action="{{route('detail_sales.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="precio" value="{{$product->precioTicket}}">
                        <input type="hidden" name="idProducto" value="{{$product->id}}">
                        <div class="d-flex justify-content-center">
                            <input type="button" value="-" class="form-control">
                            <input type="number" name="cantidad" value="1" id="" class="form-control text-center">
                            <input type="button" value="+" class="form-control">
                        </div>
                        <p class="text-center my-3">
                            <button type="submit" class="btn btn-primary">Enviar al carrito</button>
                        </p>
                    </form> --}}
                </div>
            </div>
        </div>
    </section>
@endsection