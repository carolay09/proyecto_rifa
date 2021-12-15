@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <h4 class="text-center">Tickets de la rifa</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Numero de ticket</td>
            <td>Nombre</td>
            <td>Total</td>
            <td>Rifa</td>
        </tr>
        @foreach ($sale as $detail_sale)
            <tr>
                <td>{{$detail_sale->cantidad}}</td>
                <td>{{$detail_sale->precio}}</td>
                <td>{{$detail_sale->total}}</td>
                <td>{{$detail_sale->idRaffle}}</td>
            </tr>
        @endforeach
    
    </table>
    <a href="{{route('sales.index')}}" class="btn btn-primary">Regresar</a>
</div>
</section>

@endsection