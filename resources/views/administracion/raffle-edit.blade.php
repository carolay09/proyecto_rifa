@extends('administracion/layouts/dashboard')

@section('title', 'Rifas|Editar')
    
@section('content')
<section class="container">
    <form action="{{route('raffles.update', $raffle)}}" method="post">
        @csrf
        @method('PATCH')
        <label for="" class="label-control">Precio</label>
        <input type="text" name="precio" class="form-control" value=" {{$raffle->precioTicket}}">

        <label for="" class="label-control">Cantidad de Participantes</label>
        <input type="text" name="cantidad" class="form-control" value=" {{$raffle->cantidadPart}}">      

        <label for="" class="label-control">Producto</label>
        <select name="producto" id="" class="form-control">
            {{$produ = $raffle['idProducto']}}
             @foreach ($products as $product)
                @if ($produ == $product->id)
                    <option value="{{$product['id']}}" selected>{{$product['nombre']}}</option>
                @else
                    <option value="{{$product['id']}}">{{$product['nombre']}}</option>
                @endif
                    
             @endforeach
        </select>

        <label for="" class="label-control">Fecha sorteo</label>
        <input type="date" name="fechaSorteo" class="form-control" value=" {{$raffle->fechaSorteo}}">   

        <a href="{{route('raffles.index')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>
</section>
@endsection