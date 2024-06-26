<link rel="stylesheet" href="{{ asset('css/filter.css') }}">
<script src="{{ asset('js/date.js') }}"></script>
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
        </form>
    </div>


    @include('components.cardProperty', ['properties' => $properties])

@endsection
