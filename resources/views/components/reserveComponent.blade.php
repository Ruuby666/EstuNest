<link rel="stylesheet" href="{{ asset('css/reserve.css') }}">
<div class="containerReserve">
    <div class="property-box">
        <h2>Datos de la propiedad</h2>
        <div class="property-info">
            <img src="/img/properties/{{ $property[0]->images }}" alt="Property Image">
            <div class="property-details">
                <h3>{{ $property[0]->address }}</h3>
                <p>{{ $property[0]->description }}</p>
                <p>{{ $property[0]->price }} €</p>
            </div>
        </div>
    </div>
    <div class="form-box">
        <h2>Reservar</h2>
        <form action="{{ route('reserveProperty.pay', ['id' => $property[0]->id]) }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="name-card">Nombre del titular de la tarjeta de crédito:</label>
                <input type="text" id="name-card" name="name-card" class="form-control" required>
                @error('name-card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="number-card">Número de tarjeta de crédito:</label>
                <input type="text" id="number-card" name="number-card" class="form-control" required>
                @error('number-card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date-card">Fecha de caducidad:</label>
                @php
                    $nextMonth = now()->addMonth()->format('Y-m');
                @endphp
                <input type="month" id="date-card" name="date-card" required class="form-control" min="{{ $nextMonth }}" placeholder="MM/YY">
                @error('date-card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cvc-card">Numero de seguridad (CVC):</label>
                <input type="text" id="cvc-card" name="cvc-card" class="form-control" required>
                @error('cvc-card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Pagar</button>
        </form>

    </div>
</div>
