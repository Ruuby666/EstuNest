<link rel="stylesheet" href="{{ asset('css/reserve.css') }}">
<div class="containerReserve">
    <div class="property-box">
        <h2>Datos de la propiedad</h2>
        <div class="property-info">
            <img src="/img/logo.png" alt="Property Image">
            <div class="property-details">
                <h3>Dirección: 123 Main St.</h3>
                <p>Descripción: Una propiedad encantadora cerca del centro de la ciudad.</p>
                <p>Precio: $100 por noche</p>
            </div>
        </div>
    </div>
    <div class="form-box">
        <h2>Reservar</h2>
        <form {{-- action="{{ route('checkout') }}" --}} method="POST">
            @csrf
            <label for="credit-card">Nombre del titular de la tarjeta de crédito:</label>
            <input type="text" id="credit-card" name="credit_card">
            <label for="credit-card">Número de tarjeta de crédito:</label>
            <input type="text" id="credit-card" name="credit_card">
            <label for="credit-card">Fecha de caducidad:</label>
            <input type="text" id="credit-card" name="credit_card">
            <label for="credit-card">Numero de seguridad (CVC):</label>
            <input type="text" id="credit-card" name="credit_card">
            <button type="submit">Pagar</button>
        </form>
    </div>
</div>
