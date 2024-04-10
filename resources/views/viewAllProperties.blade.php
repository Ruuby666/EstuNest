<link rel="stylesheet" href="{{ asset('css/documents.css') }}">

@extends('layouts.app')

@section('title', 'All Properties - EstuNest')

@section('content')

    <div class="ListContainer">
        <div class="ListTitle">
            <h1>Documentos</h1>
        </div>
        <div>
            <div class="List">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address</th>
                            <th>Ciudad</th>
                            <th>Precio</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->id }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->city }}</td>
                                <td>{{ $property->price }}</td>
                                <td>
                                    <form action="{{ route('admin.property.delete', ['id' => $property->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" id="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
