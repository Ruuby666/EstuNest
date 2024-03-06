@foreach ($properties as $property)
    <div class="card">
        <img src="/img/logo.png" class="card-img-top" alt="Property Image">
        <div class="card-body">
            {{-- <h5 class="card-title">{{ $property->title }}</h5> --}}
            <p class="card-text">{{ $property->description }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Price: ${{ $property->price }}</li>
                <!-- Add more property details as needed -->
            </ul>
            {{-- <a href="{{ route('property.show', $property->id) }}" class="btn btn-primary">View Details</a> --}}
        </div>
    </div>
@endforeach