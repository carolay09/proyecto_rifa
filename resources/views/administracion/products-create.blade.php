@extends('administracion/layouts/dashboard')

@section('title', 'Crear producto')
    
@section('content')
    <form action="{{route('products.store.admi')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="" class="label-control">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">

        <label for="" class="label-control">Descripcion</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion">

        <label for="" class="label-control">Marca</label>
        <input type="text" name="marca" class="form-control" placeholder="Ingrese la marca">

        <label for="" class="label-control">Imagen</label>
        <input type="file" name="imagen" id="imagen">
                  
        <label for="" class="label-control">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Ingrese el detalle">

        <label for="" class="label-control">Precio</label>
        <input type="number" name="precio" class="form-control" placeholder="Ingrese el precio">

        <label for="" class="label-control">Categoria</label>
        <select name="categoria" id="" class="form-control">
            <option value="" selected>Seleccione</option>
            @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['nombre']}}</option>
            @endforeach
        </select>

         <a href="{{route('products.index.admi')}}">Cancelar</a>
        <button type="submit">Guardar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(e){
            $('#imagen').changee(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection