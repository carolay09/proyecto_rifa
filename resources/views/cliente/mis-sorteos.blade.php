@extends('cliente.layouts.menu2')

@section('title', 'Mis Sorteos')
    
@section('content')
    <section class="container py-3">
        <h4 class="third-color text-uppercase">Mis sorteos</h4>
        <hr class="linea third-color">
        <table class="table">
            <tr>
                <td class="font-color">Imagen</td>
                <td class="font-color">Nombre</td>
                {{-- <td class="font-color">Objetivo</td> --}}
                <td class="font-color">Fecha de sorteo</td>
                <td></td>
            </tr>
            @foreach ($sorteos as $sorteo)
                <tr>
                    <td><img src="{{asset('storage'.'/'.$sorteo->imagen)}}" alt="" class="imagen-icono"></td>
                    <td class="font-color align-middle">{{$sorteo->nombre}}</td>
                    {{-- <td>
                        @php
                        $objetivo = $cantPartActual / $sorteo->cantidadPart * 100;
                        @endphp
                        <div id="myProgress" class="text-center">
                            <div id="myBar" style="width: @php echo $objetivo."%"; @endphp">                          
                                <div id="label">@php echo $objetivo."%"; @endphp</div> 
                            </div>
                        </div>
                    </td> --}}
                    <td class="font-color align-middle">{{$sorteo->fechaSorteo}}</td>
                    <td class="align-middle">
                        <a href="{{$sorteo->link}}" target="_blank" class="btn boton-color text-white">Ver Sorteo</a>
                        <a href="{{route('tickets.show', $sorteo->id)}}" class="btn boton-color text-white">Ver Tickets</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection