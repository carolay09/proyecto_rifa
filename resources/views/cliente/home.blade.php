@extends('cliente.layouts.menu2')

@section('title', 'LOTT|Home')
    
@section('content')
<div class="owl-container py-2 carousel-container">
    <div class="owl-carousel owl-theme">
        {{-- <div> 
            <div class="categoria-show">
                <img class="img" src="{{asset('images/gastronomia.jpeg')}}" alt=""> 
                <p class="d-flex justify-content-center">
                    <input type="button" class="btn btn-primary btn-participa mb-3" value="Participa">     
                </p>
            </div>
            <h3 class="nombre-ctg">Gastronomía</h3>
        </div> --}}
        @foreach ($categories as $category)
            @if ($category->nombreEstado == 'desbloqueado')
                <div> 
                    <div class="categoria-show">
                        <img class="img" src="{{asset('storage').'/'.$category->imagen}}" alt=""> 
                        {{-- <img src="{{asset('images/moda.jpeg')}}" class="img" alt=""> --}}
                        <p class="d-flex justify-content-center">
                            {{-- <input type="button" class="btn btn-primary btn-participa mb-3" value="Participa">      --}}
                            <a href="{{route('producto_categoria', $category)}}" class="btn boton-color text-white btn-participa mb-3">Participa</a>
                        </p>
                    </div>
                    <h3 class="nombre-ctg">{{$category->nombre}}</h3>
                </div>
            @endif
            @if ($category->nombreEstado == 'bloqueado')
                <div> 
                    <div class="categoria-show">
                        <img class="img-bloqueado" src="{{asset('storage').'/'.$category->imagen}}" alt=""> 
                        <img class="img-candado" src="{{asset('images/comming-soon.jpeg')}}" alt="" style="width: 40%">
                        <p class="d-flex justify-content-center">
                            {{-- <a href="{{route('producto_categoria', $category)}}" class="btn btn-primary btn-participa mb-3">Bloqueado</a> --}}
                        </p>
                    </div>
                    <h3 class="nombre-ctg">{{$category->nombre}}</h3>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="section my-5">
    <p class="text-center h3 fw-bold secondary-color" id="quienes" >¿Quiénes somos?</p>
    <article class="container articulo">
        Somos una empresa peruana que propone una forma alternativa de adquisición de bienes con costos elevados, ofreciendo la posibilidad de adquirir estos productos por medio de aportes simbólicos traducidos en tickets virtuales que, mediante sorteos benefician a los usuarios de nuestra plataforma.
    </article>
</div>
<div class="form-publicidad py-5">
    <div class="text-center">
        <p class="mensaje d-inline-block px-3">Manténgase al día con los sorteos vigentes</p>
    </div>
    <form action="{{route('emails.store')}}" method="post" class="d-flex justify-content-center">
        @csrf
        <input type="email" name="correoPublicidad" class="form-control w-25">
        <button type="submit" class="btn btn-danger">Enviar</button>
    </form>

</div>
<script>
    Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})
</script>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
@endsection