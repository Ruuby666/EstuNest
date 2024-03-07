
<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

<div id='filter'>
    <form id='catalogFilter' action="{{ route('catalog') }}" method="GET">
        <label for="star">Fecha de inicio: </label>
        <input type="date" id="start" name="start" placeholder="fecha de inicio">
        <label for="end">Fecha de salida: </label>
        <input type="date" id="end" name="end"  placeholder="fecha de salida">
        <input type="text" id="address" name="address" placeholder="Ciudad, calle o lugar">
        <input type="submit" value="Buscar">
    </form>
</div>


@include('components.cardProperty', ['properties' => $properties])

@endsection