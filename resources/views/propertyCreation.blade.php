<link rel="stylesheet" href="{{ asset('css/propertyCreation.css') }}">

@extends('layouts.app')

@section('title', 'EstuNest - Crear Propiedad')

@section('content')

    
<div class="propertyCreation">
    <div class="div-propertyCreation-form">
        <h2 class="form-title">Creación de Propiedad</h2>
        <form class="propertyCreation-form" id="propertyCreation-form" action="" method="POST" novalidate>
            @csrf
            <div class="form-group">
                <input type="text" name="address" id="address" placeholder="Dirección" required>
            </div>
            <div class="form-group">
                <input type="text" name="city" id="city" placeholder="Ciudad" required>
            </div>
            <div class="form-group">
                <input type="text" name="rooms" id="rooms" placeholder="Habitaciones Disponibles" required>
            </div>
            <div class="form-group">
                <input type="text" name="description" id="description" placeholder="Descripción" required>
            </div>
            <div class="form-group">
                <input type="text" name="price" id="price" placeholder="Precio" required>
            </div>
            <div class="form-group">
                <input type="file" name="property-image" id="property-image" required>
            </div>
            <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Publicar">
            </div>
        </form>
    </div>
    <div class="image">
        <img src="img/logo.png" alt="sing up image">
    </div>
</div>




@endsection