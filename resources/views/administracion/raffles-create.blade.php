@extends('administracion/layouts/dashboard')

@section('title', 'Crear rifa')
    
@section('content')
<section class="container">

    <h4 class="text-center">Creación de rifas</h4>
    <div class="row justify-content-md-center">

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

        <label for="" class="label-control">Link de la reunión</label>
        <input type="text" name="link" class="form-control" placeholder="Ingrese link">     

        <input type="hidden" name="idEstado" value="2">

        <p class="d-flex justify-content-center py-3">
            <button type="submit" class="btn btn-primary mx-2">Guardar</button>
            <a href="{{route('raffles.index')}}" class="btn btn-primary mx-2">Cancelar</a>
        </p>

    </form>
</div>
</section>
@endsection