<link rel="stylesheet" href="{{ asset('css/propertyCreation.css') }}">

<div class="creation-container">
    <div class="div-propertyCreation-form">
        <form class="propertyCreation-form" id="propertyCreation-form" action="{{ route('property.create') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="address" id="address" placeholder="Dirección" required>
                @error('address')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="city" id="city" placeholder="Ciudad" required>
                @error('city')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="description" id="description" placeholder="Descripción" required>
                @error('description')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="price" id="price" placeholder="Precio" required>
                @error('price')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="file" name="property-image" id="property-image" required>
                @error('property-image')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group form-button">
                <input type="submit" name="publish" id="publish" class="form-submit" value="Publicar">
            </div>
        </form>
    </div>
    <div class="image">
        <img src="img/logo.png" alt="sing up image">
    </div>
</div>

