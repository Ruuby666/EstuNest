<link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}">

@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

<div class="container-about">
    <h1>Sobre EstuNest</h1>
    <div class="aboutUs">
        <div id="aboutUsText">
            <p>
                EstuNest es una plataforma digital diseñada para ayudar a los estudiantes a encontrar el alojamiento perfecto durante su etapa de estudios.
                Nuestra misión es simplificar la búsqueda de vivienda, ofreciendo una experiencia segura y eficiente. Además, proporcionamos a los 
                propietarios una plataforma para publicar sus propiedades, brindándoles la oportunidad de llegar a un público específicamente interesado 
                en la proximidad a centros educativos. En resumen, EstuNest facilita la interacción entre estudiantes y propietarios, creando un ambiente 
                propicio para una comunidad estudiantil más conectada y respaldada.
            </p>
        </div>
        <div id="aboutUsImage">
            <img src="/img/logo.png" alt="aboutUs">
        </div>
    </div>  
</div>


@endsection