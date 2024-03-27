<link rel="stylesheet" href="{{ asset('css/propertyEdit.css') }}">

@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

    <div class="propertyCreation" id="propertyCreationContainer">
        <div class="creation-container">
            <div class="div-propertyCreation-form">
                <form class="propertyCreation-form" id="propertyCreation-form" action="{{ route('property.update', ['id' => $property[0]->id]) }}" method="POST" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="address" id="address" placeholder="Dirección"
                            value="{{ $property[0]->address }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" id="city" placeholder="Ciudad"
                            value="{{ $property[0]->city }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" id="description" placeholder="Descripción"
                            value="{{ $property[0]->description }}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" id="price" placeholder="Precio"
                            value="{{ $property[0]->price }}" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="property-image" id="property-image" value="{{ $property[0]->images }}"
                            required>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="update" id="update" class="form-submit" value="Update">
                    </div>
                </form>
            </div>
            <div class="image">
                <img src="http://127.0.0.1:8000/img/properties/{{ $property[0]->images }}" alt="propertie image">
            </div>
        </div>
    </div>

@endsection
