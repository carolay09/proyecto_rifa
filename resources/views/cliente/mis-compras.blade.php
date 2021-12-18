@extends('cliente.layouts.menu2')

@section('title', 'Mis Compras')
    
@section('content')
    <section class="container py-3">
        <h4 class="third-color text-uppercase">Mis compras</h4>
        <hr class="linea third-color">
        <table class="table">
            <tr>
                <td></td>
                <td class="font-color">Descripción</td>
                <td class="font-color">Valor</td>
                <td class="font-color">Estado de pago</td>
                <td class="font-color">Fecha de sorteo</td>
                <td></td>
            </tr>
            @foreach ($rifasRev as $rifaRev)
                <tr>
                    <td><img src="{{asset('storage'.'/'.$rifaRev->imagen)}}" alt="" class="imagen-icono"></td>
                    <td class="font-color align-middle">{{$rifaRev->nombre}}</td>
                    <td class="font-color align-middle"><strong>S/. {{number_format($rifaRev->precioTicket, 2)}}</strong></td>
                    <td class="font-color align-middle text-danger">Validando código</td>
                    <td class="font-color align-middle">{{$rifaRev->fechaSorteo}}</td>
                    <td class="align-middle"><a href="#" class="btn btn-primary">Ver Sorteo</a></td>
                </tr>
            @endforeach
            @foreach ($rifasConf as $rifaConf)
                <tr>
                    <td><img src="{{asset('storage'.'/'.$rifaConf->imagen)}}" alt="" class="imagen-icono"></td>
                    <td class="font-color align-middle">{{$rifaConf->nombre}}</td>
                    <td class="font-color align-middle"><strong>S/. {{number_format($rifaConf->precioTicket, 2)}}</strong></td>
                    <td class="font-color align-middle text-success">Pago aprobado</td>
                    <td class="font-color align-middle">{{$rifaConf->fechaSorteo}}</td>
                    <td class="align-middle"><a href="#" class="btn boton-color text-white">Ver Sorteo</a></td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection