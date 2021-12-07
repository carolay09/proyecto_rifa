@extends('cliente.layouts.app')

@section('title', 'Mis Rifas')
    
@section('content')
    <section class="container">
        <div class="my-5">
            <h4 class="text-center mb-2">Pendientes a pagar</h4>
            <table class="table">
                <tr>
                    <td class="text-center">Fecha maxima de pago</td>
                    <td class="text-center">Monto a pagar</td>
                    <td class="text-center"></td>
                </tr>
                @foreach ($rifasEsp as $rifaRev)
                    <tr>
                        <td class="text-center">{{$rifaRev->fechaSorteo}}</td>
                        <td class="text-center">{{$rifaRev->total}}</td>
                        <td>
                            <form action="{{route('actualizar-estado', $rifaRev)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex">
                                    <input type="text" name="nroOperacion" class="form-control" placeholder="Ingrese nro de operación">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="my-5">
            <h4 class="text-center mb-2">En revision</h4>
            <table class="table">
                <tr>
                    <td class="text-center">Monto pagado</td>
                    <td class="text-center">Fecha maxima de confirmacion</td>
                </tr>
                @foreach ($rifasRev as $rifaRev)
                    <tr>
                        <td class="text-center">{{$rifaRev->total}}</td>
                        <td>
                           
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="my-5">
            <h4 class="text-center mb-2">Mis Rifas Confirmadas</h4>
            <table class="table">
                <tr>
                    <td class="text-center">Producto</td>
                    <td class="text-center">Fecha</td>
                    <td class="text-center">Cantidad de boletos</td>
                    <td class="text-center">Meta de participantes</td>
                </tr>
                @foreach ($rifasConf as $rifaConf)
                    <tr>
                        <td>{{$rifaConf->nombre}}</td>
                        <td class="text-center">{{$rifaConf->fechaSorteo}}</td>
                        <td class="text-center">{{$rifaConf->cantidad}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="my-5">
            <h4 class="text-center mb-2">Mis Rifas Observadas</h4>
            <table class="table">
                <tr>
                    <td class="text-center">Producto</td>
                    <td class="text-center">Fecha</td>
                    <td class="text-center">Cantidad de boletos</td>
                    <td class="text-center">Meta de participantes</td>
                </tr>
                @foreach ($rifasObs as $rifaObs)
                    <tr>
                        <td>{{$rifaObs->nombre}}</td>
                        <td class="text-center">{{$rifaObs->fechaSorteo}}</td>
                        <td class="text-center">{{$rifaObs->cantidad}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection