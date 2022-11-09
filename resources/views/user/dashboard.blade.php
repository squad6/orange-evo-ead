<h1>Minhas Trilhas</h1>

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

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Sair</button>
</form>
