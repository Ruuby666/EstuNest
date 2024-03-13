
<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

<div id='filter'>
    <form id='catalogFilter' action="{{ route('filter') }}" method="POST">
        @csrf 
        <label for="star">Fecha de inicio: </label>
        @php
            $nextMonth = now()->addMonth()->format('Y-m');
        @endphp
        <input type="month" id="start" name="start" min="{{$nextMonth}}" placeholder="fecha de inicio">
        <label for="end">Fecha de salida: </label>
        <input type="month" id="end" name="end" min="{{$nextMonth}}" placeholder="fecha de salida">
        <input type="text" id="address" name="address" placeholder="Ciudad, calle o lugar">
        <input type="submit" value="Buscar">
    </form>
</div>


@include('components.cardProperty', ['properties' => $properties])

@endsection