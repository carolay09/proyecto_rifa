@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <h4 class="text-center">Lista de ventas</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Fecha</td>
            <td>Total</td>
            <td>Nro Operacion</td>
            <td>Usuario</td>
            <td>Estado</td>
            <td></td>
        </tr>
        @foreach ($sales as $sale)
            <tr>
                <td>{{$sale->fecha}}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->nroOperacion}}</td>
                <td>{{$sale->nombreUsuario}}</td>
                <td>{{$sale->nombreEstado}}</td>
                <td><a href="{{route('sales.mostrar',$sale->id)}}" class="btn btn-primary">Ver Detalle</a></td>
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection