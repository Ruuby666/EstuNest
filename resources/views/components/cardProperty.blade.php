<div class="card">
    <img src="{{ $property->image }}" class="card-img-top" alt="Property Image">
    <div class="card-body">
        <h5 class="card-title">{{ $property->title }}</h5>
        <p class="card-text">{{ $property->description }}</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Price: ${{ $property->price }}</li>
            <li class="list-group-item">Rooms: {{ $property->rooms }}</li>
            <!-- Add more property details as needed -->
        </ul>
        <a href="{{ route('property.show', $property->id) }}" class="btn btn-primary">View Details</a>
    </div>
</div>
