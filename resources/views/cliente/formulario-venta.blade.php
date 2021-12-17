@extends('cliente.layouts.menu2')

@section('title', 'Carrito de compras')
    
@section('content')
    <section class="container py-5">
        <div class="row">
            <div class="col-9">
                <h4 class="third-color"><strong>IDENTIFICACIÓN</strong></h4>
                <hr class="linea third-color">
                <p>Solicitamos únicamente la información esencial para la finalización de la compra</p>
                <form action="{{route('users.update', $user)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class=" py-2">
                        <label for="" class="label-control">Correo</label>
                        <input type="text" class="form-control borde-input" name="email" value="{{$user->email}}">
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 py-2">
                            <label for="" class="label-control">Nombre</label>
                            <input type="text" class="form-control borde-input" name="nombre" value="{{$user->nombre}}">
                        </div>
                        <div class="col-12 col-md-6 py-2">
                            <label for="" class="label-control">Apellidos</label>
                            <input type="text" class="form-control borde-input" name="apellido" value="{{$user->apellido}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 py-2">
                            <label for="" class="label-control">Documento de identidad</label>
                            <input type="text" class="form-control borde-input" name="dni" value="{{$user->dni}}">
                        </div>
                        <div class="col-12 col-md-6 py-2">
                            <label for="" class="label-control">Teléfono</label>
                            <input type="text" class="form-control borde-input" name="telefono" value="{{$user->telefono}}">
                        </div>
                        <div class="text-center py-2">
                            <button type="submit" class="btn btn-primary px-4">Siguiente</button>
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
                <div class="row">
                    <label for="" class="col-12 col-md-6 font-color">Descuento</label>
                    @if ($cupon == null)
                        <p class="col-12 col-md-6 text-danger">S/. 0.00</p>  
                    @else  
                        <p class="col-12 col-md-6 text-danger">S/. {{number_format($cupon->descuento, 2)}}</p>
                    @endif
                </div>
                <hr class="linea third-color my-4">
                <div class="row">
                    <p class="col-12 col-md-6 font-color">Total</p>
                    @if ($cupon == null)
                        <p class="col-12 col-md-6 text-success">S/. {{number_format($sale->total, 2)}}</p>
                    @else
                        <p class="col-12 col-md-6 text-success">S/. {{number_format($sale->total-$cupon->descuento, 2)}}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection