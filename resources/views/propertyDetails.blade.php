<link rel="stylesheet" href="{{ asset('css/propertyDetails.css')}}">

@extends('layouts.app')

@section('title', 'Property Details')

@section('content')
    @foreach ($property as $property)
        <div class="container-details">
            <div class="leftPart">
                <div id="productAddres">
                    <h2>{{$property->address}}</h2>
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
                <div id="propertyDescription">
                    <h3>Detalles de la propiedad</h3>
                    <p>{{$property->description}}</p>
                </div>
                <div id="propertyPrice">
                    <h3>Precio/mes</h3>
                    <p>{{$property->price}} €</p>
                </div>
                <button id="reserveButton">Reservar</button>
            </div>
        </div>
    @endforeach
@endsection