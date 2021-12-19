@extends('cliente.layouts.menu2')

@section('title', 'Mis Tickets')
    
@section('content')
    <section class="container py-3">
        <h4 class="third-color text-uppercase">Mis Tickets</h4>
        <hr class="linea third-color">
        <table class="table">
            <tr>
                <td class="font-color">Nro de Ticket : </td>
                
            </tr>
            @foreach ($tickets as $ticket)
                <tr>
                    <td class="font-color align-middle">{{$ticket->nroTicket}}</td>
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
                </tr>
            @endforeach
        </table>
        <a href="{{route('tickets.show', $sorteo->id)}}" class="btn boton-color text-white">Regresar</a>
    </section>
@endsection