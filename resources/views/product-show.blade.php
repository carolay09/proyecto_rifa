@extends('menu')

@section('title')
    
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-6">
                <img src="#" alt="">
            </div>
            <div class="col6">
                <div class="container">
                    {{-- aqui va el formulario y detalles --}}
                    <h2>Nombre del producto: {{$producto->nombre}}</h2>
                    <h2>Detalle del producto: {{$producto->detalle}}</h2>
                    <form action="" method="post">
                        <div class="d-flex justify-content-center">
                            <input type="button" value="-" class="form-control">
                            <input type="number" name="" id="" class="form-control">
                            <input type="button" value="´+" class="form-control">
                        </div>
                        <button type="submit">Enviar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection