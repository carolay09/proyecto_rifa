@extends('administracion/layouts/dashboard')

@section('title', 'Crear producto')
    
@section('content')
<section class="container">

    <h4 class="text-center">Creación de cupones</h4>
    <div class="row justify-content-md-center">

    <form action="{{route('coupons.store')}}" method="post">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">

        <label for="" class="label-control">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" placeholder="Ingrese la cantidad">

        <label for="" class="label-control">Descuento</label>
        <input type="text" name="descuento" class="form-control" placeholder="Ingrese el descuento">
  
        {{-- <label for="" class="label-control">Fecha de expiración</label>
        <input type="date" name="fechaEsp" class="form-control" placeholder="Ingrese fecha de expiración">    --}}

        <p class="d-flex justify-content-center py-3">
            <button type="submit" class="btn btn-primary mx-2">Guardar</button>
            <a href="{{route('coupons.index')}}" class="btn btn-primary mx-2">Cancelar</a>
        </p>
        
    </form>
</div>
</section>

@endsection