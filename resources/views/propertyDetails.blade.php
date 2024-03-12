<link rel="stylesheet" href="{{ asset('css/propertyDetails.css') }}">

@extends('layouts.app')

@section('title', 'Property Details')

@section('content')
    <div class="container-details">
        <div class="leftPart">
            <div id="productAddres">
                <h2>{{ $property[0]->address }}</h2>
            </div>
            <div id="productImages">
                <img class="mainImage" src="/img/logo.png" alt="Main Image" />
                <div class="smallImages">
                    <img src="/img/logo.png" alt="Small Image 1" />
                    <img src="/img/logo.png" alt="Small Image 2" />
                </div>
            </div>
            <div id="moreImages">
                <a href="#">+ Ver más imágenes</a>
            </div>
        </div>
        <div class="rightPart">
            <div class="righttopPart">
                <div id="propertyDescription">
                    <h3>Detalles de la propiedad</h3>
                    <p>{{ $property[0]->description }}</p>
                </div>
                <div id="propertyPrice">
                    <h3>Precio/mes</h3>
                    <p>{{ number_format($property[0]->price, 2) }} €</p>
                </div>
                <div id="propertyPrice">
                    <h3>Precio/dia</h3>
                    <p>{{ number_format($property[0]->price / 31, 2) }} €</p>
                </div>
            </div>
            <div class="rightbottomPart">
                <div class="dateRent">
                    <label for="star">Fecha de inicio: </label>
                    <input type="date" id="start" name="start" placeholder="fecha de inicio">
                    <label for="end">Fecha de salida: </label>
                    <input type="date" id="end" name="end" placeholder="fecha de salida">
                </div>
                <div class="buttonReserve">
                    <button id="reserveButton"><a
                            href="{{ route('reserveProperty', ['id' => $property[0]->id]) }}">Reservar</a></button>
                </div>
            </div>
        </div>

    </div>
@endsection
