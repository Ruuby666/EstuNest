@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

@include('components.cardProperty', ['properties' => $properties])

@endsection
