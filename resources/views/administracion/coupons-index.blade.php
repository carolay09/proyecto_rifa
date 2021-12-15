@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')
    
<section class="container">
    <a href="{{route('coupons.create')}}" class="btn btn-primary my-3">Crear cupon</a>
    <h4 class="text-center">Lista de cupones</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Nombre</td>
            <td>Descuento</td>
            <td>Cantidad inicial</td>
            <td>Cantidad restante</td>
            <td>Estado</td>
            <td>Accion</td>
        </tr>
        @foreach ($coupons as $coupon)
            <tr>
                <td>{{$coupon->nombre}}</td>
                <td>{{$coupon->descuento}}</td>
                <td>{{$coupon->cantidad}}</td>
                <td></td>
                <td>{{$coupon->idEstado}}</td>
                <td></td>
                {{-- <td>
                    
                    <a href="{{route('categories.edit', $coupon->id)}}" class="btn btn-primary">Editar</a>
                   
                    <form action="{{route('categories.update-state', $coupon->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="nombreEstado" value="{{$coupon->nombreEstado}}">
                        
                        <button type="submit" class="btn btn-danger">Cambiar estado</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection