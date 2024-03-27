<link rel="stylesheet" href="{{ asset('css/propertyDetails.css') }}">
<script src="{{ asset('js/date.js') }}"></script>
@extends('layouts.app')

@section('title', 'Property Details')

@section('content')
    <div class="container-details">
        <div class="leftPart">
            <div id="productAddres">
                <h2>{{ $property[0]->address }}</h2>
            </div>
            <div id="productImages">
                <img class="mainImage" src="/img/properties/{{$property[0]->images}}" alt="Main Image" />
                {{-- <div class="smallImages">
                    <img src="/img/logo.png" alt="Small Image 1" />
                    <img src="/img/logo.png" alt="Small Image 2" />
                </div> --}}
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
                @php
                    $nextMonth = now()->addMonth()->format('Y-m');
                @endphp
                @if (Cookie::has('user_name'))
                    <form action="{{route('reserveProperty', ['id' => $property[0]->id])}}" method="GET" novalidate>
                        <div class="dateRent">
                            <label for="star">Fecha de inicio: </label>
                            <input type="month" id="start" name="start" placeholder="fecha de inicio"
                                min="{{ $nextMonth }}" required>
                            <label for="end">Fecha de salida: </label>
                            <input type="month" id="end" name="end" placeholder="fecha de salida"
                                required>
                        </div>
                        <div class="buttonReserve">
                            @if (Cookie::get('user_type') === 'both')
                                <button id="reserveButton" type="submit">Reservar</button>
                            @else
                                <p>Si desea alquilar una propiedad, debe subir un documento que verifique que usted es estudiante <a href="{{ route('userDetails') }}">aquí</a></p>       
                            @endif
                        </div>
                    </form>   
                @else 
                    <form action="{{route('logIn')}}" method="GET" novalidate>
                        <div class="dateRent">
                            <label for="star">Fecha de inicio: </label>
                            <input type="month" id="start" name="start" placeholder="fecha de inicio"
                                min="{{ $nextMonth }}" required>
                            <label for="end">Fecha de salida: </label>
                            <input type="month" id="end" name="end" placeholder="fecha de salida"
                                required>
                        </div>
                        <div class="buttonReserve">
                            <button id="reserveButton" type="submit">Reservar</button>
                        </div>
                    </form>   
                @endif
                
            </div>
        </div>

    </div>
@endsection
