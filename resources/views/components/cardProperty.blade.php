<div class="property-container">
    @foreach ($properties as $property)
        <div class="property-item">
            <div class="article-wrapper">
                <figure>
                    <img src="/img/properties/{{$property->images}}" alt="" />
                </figure>
                <div class="article-body">
                    <h2>{{$property->address}}</h2>
                    <p>
                        {{$property->city}}
                    </p><br>
                    <p>
                        {{$property->price}} €
                    </p>
                    <a href="{{ route('show.property', ['id' => $property->id]) }}" class="read-more">
                        Detalles
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
