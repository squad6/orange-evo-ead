<h1>Minhas trilhas</h1>

@if (isset($trails))
    <ul>
        @foreach ($trails as $trail)
            <li>
                {{ $trail->title }}
                <a href="{{ route('trail.show', $trail->id) }}">Ver</a>
            </li>
        @endforeach
    </ul>
@endif
