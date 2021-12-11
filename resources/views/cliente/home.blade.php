@extends('cliente.layouts.menu2')

@section('title', 'LOTT|Home')
    
@section('content')
<div class="owl-container py-2 carousel-container">
    <div class="owl-carousel owl-theme">
        <div> 
            <a href="#" class="link">
            <img class="img" src="{{asset('images/gastronomia.jpeg')}}" alt=""> 
            <h3 class="nombre-prod">Gastronomía</h3>
        </a>
        </div>
        <div> 
            <img class="img" src="{{asset('images/moda.jpeg')}}" alt=""> 
            <h3 class="nombre-prod">Moda</h3>
        </div>
        <div> 
            <img class="img" src="{{asset('images/tecnologia.jpeg')}}" alt=""> 
            <h3 class="nombre-prod">Tecnología</h3>
        </div>
        <div> 
            <img class="img" src="{{asset('images/viajes.jpeg')}}" alt=""> 
            <h3 class="nombre-prod">Viajes</h3>
        </div>
        <div> 
            <img class="img" src="{{asset('images/autos.jfif')}}" alt=""> 
            <h3 class="nombre-prod">Autos</h3>
        </div>
    </div>
</div>
<div class="section my-5">
    <p class="text-center h3 fw-bold secondary-color">¿Quiénes somos?</p>
    <article class="container articulo">
        Somos una empresa peruana que propone una forma alternativa de adquisición de bienes con costos elevados, ofreciendo la posibilidad de adquirir estos productos por medio de aportes simbólicos traducidos en tickets virtuales que, mediante sorteos benefician a los usuarios de nuestra plataforma.
    </article>
</div>
<div class="form-publicidad py-5">
    <p class="text-center ">Manténgase al día con las últimas noticias</p>
    <form action="" method="post" class="d-flex justify-content-center">
        <input type="text" name="correoPublicidad" class="form-control w-25">
        <button type="submit" class="btn btn-danger">Enviar</button>
    </form>

</div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
@endsection