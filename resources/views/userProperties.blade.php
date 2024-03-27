<link rel="stylesheet" href="{{ asset('css/propertyList.css') }}">

@extends('layouts.app')

@section('title', 'Mis propiedades')

@section('content')

    <div class="propertyListContainer">
        <div class="propertyListTitle">
            <h1>Mis propiedades</h1>
        </div>
        <div>
            <div class="propertyList">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dirección</th>
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
                                <td>{{ $property->price }}€</td>
                                <td>
                                    <form action="{{ route('property.edit', ['id' => $property->id]) }}" method="GET" style="display: inline;">
                                        @csrf
                                        <button type="submit" id="edit">Editar</button>
                                    </form>
                                    <form action="{{ route('property.delete', ['id' => $property->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete">Borrar</button>
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
