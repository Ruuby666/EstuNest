<link rel="stylesheet" href="{{ asset('css/documents.css') }}">

@extends('layouts.app')

@section('title', 'Documentos')

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
                            <th>Dni del Usuario</th>
                            <th>Documento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td>{{ $document->id }}</td>
                                <td>{{ $document->dni_user }}</td>
                                <td>
                                    <a href="/img/documents/{{ $document->image }}" target="_blank">
                                        <img class="image" src="/img/documents/{{ $document->image }}" alt="Main Image" />
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('document.accept', ['id' => $document->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" id="edit">Accept</button>
                                    </form>
                                    <form action="{{ route('document.deny', ['id' => $document->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" id="delete">Deny</button>
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
