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
            <option value="1">Josiah Lueilwitz</option>
            <option value="2">Freddy Schamberger V</option>
            <option value="3">Dejon Kshlerin Jr.</option>
        </select>

        <label for="" class="label-control">Fecha sorteo</label>
        <input type="text" name="fecha" class="form-control" placeholder="Ingrese cantidad de participante">   

        <button type="submit">Guardar</button>
    </form>
@endsection