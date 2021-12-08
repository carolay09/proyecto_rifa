@extends('administracion.layouts.dashboard')

@section('title', 'Revision de rifas')
    
@section('content')
    <section class="container">
        <div class="my-5">
            <h4 class="text-center mb-2">Pendientes de revision</h4>
            <table class="table">
                <tr>
                    <td class="text-center">Fecha de pago</td>
                    <td class="text-center">Monto a pagar</td>
                    <td class="text-center">Nro de operacion</td>
                    <td class="text-center">Accion</td>
                </tr>
                @foreach ($rifasPend as $rifaPend)
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center">{{$rifaPend->total}}</td>
                        <td class="text-center">{{$rifaPend->nroOperacion}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('confirma-pago', $rifaPend->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="idUsuario" value="{{$rifaPend->idUsuario}}">
                                <button type="submit" class="btn btn-primary">Confirmado</button>
                            </form>
                            <form action="{{route('observa-pago', $rifaPend->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Observado</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection