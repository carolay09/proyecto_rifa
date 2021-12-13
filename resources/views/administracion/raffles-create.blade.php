@extends('administracion/layouts/dashboard')

@section('title', 'Crear rifa')
    
@section('content')
    <form action="{{route('raffles.store')}}" method="post">
        @csrf
        <label for="" class="label-control">Precio</label>
        <input type="text" name="precio" class="form-control" placeholder="Ingrese el precio">

        <label for="" class="label-control">Cantidad de Participantes</label>
        <input type="text" name="cantidad" class="form-control" placeholder="Ingrese cantidad de participante">      

        <label for="" class="label-control">Producto</label>
        <select name="producto" id="" class="form-control">
            <option value="" selected>Seleccione</option>
            @foreach ($products as $product)
                <option value="{{$product['id']}}">{{$product['nombre']}}</option>
            @endforeach
        </select>

        <label for="" class="label-control">Fecha sorteo</label>
        <input type="date" name="fecha" class="form-control" placeholder="Ingrese fecha de sorteo">   

        <a href="{{route('raffles.index')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>
@endsection