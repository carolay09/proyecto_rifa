@extends('administracion/layouts/dashboard')

@section('title', 'Dashboard')
    
@section('content')

<section class="container">
    <h4 class="text-center">Lista de mensajes</h4>
    <div class="table-responsive-xl">
    <table class="table">
        <tr>
            <td>Correo</td>
        </tr>
        @foreach ($emails as $email)
            <tr>
                <td>{{$email->email}}</td>
                
            </tr>
        @endforeach
    </table>
</div>
</section>

@endsection