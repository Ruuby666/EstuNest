<link rel="stylesheet" href="{{ asset('css/propertyCreation.css') }}">
<script src="{{ asset('js/index.js')}}"></script>
@extends('layouts.app')

@section('title', 'User Details')

@section('content')

    <div class="userContainer">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="userDetails">
            <h2 class="userDetails-title">Detalles de Usuario</h2>
            <div class="userDetails-info">
                <form action="{{ route('userDetails.changeProfilePic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="profilePicture">
                        <label for="profilePictureInput">
                            @if($profile_picture)
                                <img src="img/profile_pictures/{{$profile_picture}}" alt="profile picture">
                            @else
                                <img src="img/profilePic.png" alt="profile picture">
                            @endif
                        </label>
                        <input type="file" id="profilePictureInput" name="profilePictureInput" style="display: none">
                    </div>
                    <input type='submit' id="updateProfilePictureButton" name="updateProfilePictureButton" value='actualizar foto'>
                </form>
                <br>
                <p><strong>Nombre:</strong></p>
                <p>{{ $name }} {{ $surname}}</p><br>
                <p><strong>Correo Electrónico:</strong></p>
                <p>{{$email}}</p><br>
                <p><strong>Telefono:</strong></p>
                <p>{{$phone}}</p><br>

                <p><strong>Verificado como Estudiante: </strong>
                    @if($type == 'both')
                        <i class="fas fa-check-circle"></i>
                    @else
                        <i class="fas fa-times-circle"></i>
                    @endif
                </p><br>

                <a href="{{ route('logout') }}" id="logOut" class="btn btn-primary">Log Out</a>
            </div>
        </div>
    </div>

    <div id='dropdowns'>
        <div class="propertyCreation" id="propertyCreationContainer">

            <h2 id="toggleForm">¿Desea publicar una propiedad? <i class="fas fa-sort-down"></i></h2>
            @include('components.propertyCreation')

        </div>

        @if($type !== 'both')
        <div class="uploadDocument" id="uploadDocumentContainer">
            <h2 id="uploadDocumentTitle">¿Eres estudiante? Sube tu documento de autentificación aqui <i class="fas fa-sort-down"></i></h2>

            <div id="uploadDocumentForm">
                <form action="{{ route('userDetails.uploadDocument')}}" method="POST" enctype="multipart/form-data" id="documentForm">
                    @csrf
                    <input type="file" name="file" id="file" required>
                    <input type="submit" value="Subir" class="submitButton">
                </form>
            </div>

            <small>Si al cabo de 5 dias laborales no hay cambios en su Verificado, significa que no ha sido aceptada.</small>
        </div>
        @endif

    </div>


@endsection
