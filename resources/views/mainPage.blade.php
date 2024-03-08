@extends('layouts.app')

@section('title', 'EstuNest')

@section('content')

@endsection

@if (session('message'))
        <p>{{ session('message') }}</p>
@endif
