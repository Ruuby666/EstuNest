
<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
<link rel="stylesheet" href="{{ asset('css/mainPage.css') }}">

@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

<div id='filter'>
    <form id='catalogFilter' action="{{ route('filter') }}" method="POST">
    @csrf 
        @php
            $nextMonth = now()->addMonth()->format('Y-m');
        @endphp
        <label for="star">Fecha de inicio: </label>
        <input type="month" id="start" name="start" min="{{$nextMonth}}" placeholder="fecha de inicio">
        <label for="end">Fecha de salida: </label>
        <input type="month" id="end" name="end" placeholder="fecha de salida">
        <input type="text" id="city" name="city" placeholder="Ciudad">
        <input type="submit" value="Buscar">
        {{-- <input type="reset" value="Resetear"> --}}
    </form>
</div>

<div class="recomendaciones">
    <h2 class="mainPageTitle">Recomendaciones Diarias</h2>
    <div class="property">
        @include('components.cardProperty', ['properties' => $properties])
    </div>
</div>

<div class="carRent">
    <h2 class="mainPageTitle">Alquiler de coches</h2>
    <div class="car">
        <a href="https://www.cicar.com/ES?gad_source=1&gclid=CjwKCAiAi6uvBhADEiwAWiyRdoeB7CY632zROOtBU_BGbR1UtZUIqoMwQd-apXgF6Q9h_cMiGXoAABoC7MUQAvD_BwE"><img src="/img/logo-cicar.png" alt=""></a>
    </div>
</div>

<div class="whyTrust">
    <h2 class="mainPageTitle">¿Por qué confiar en nosotros?</h2>
    <div class="trust">
        <div class="trustItem">
            <img src="/img/precios.png" alt="">
            <p>Precios económicos</p>
        </div>
        <div class="trustItem">
            <img id="canarias" src="/img/canarias.png" alt="">
            <p>Estamos en Canarias</p>
        </div>
        <div class="trustItem">
            <img src="/img/simple.png" alt="">
            <p>Simpleza</p>
        </div>
    </div>
</div>

<div class="partners">
    <h2 class="mainPageTitle">Nuestros Partners</h2>
    <div class="partner">
        <img src="/img/zonzamas.png" alt="">
    </div>
</div>

<div class="questions">
    <h2 class="mainPageTitle">¿Alguna pregunta?</h2>
    <form action="" method="">
        <label for="email">Correo: </label>
        <input type="email" id="email" name="email" placeholder="correo">
        <label for="question">Mensaje: </label>
        <textarea id="question" name="question" placeholder="pregunta"></textarea>
        <input type="submit" value="Enviar">
    </form>

</div>

@endsection
