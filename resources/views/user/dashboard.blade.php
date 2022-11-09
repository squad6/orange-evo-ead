<h1>Minhas Trilhas</h1>

@if (isset($trails))
    <ul>
        @foreach ($trails as $trail)
            <li>
                {{ $trail->title }}
                <form action="{{ route('user.trail.destroy', $trail->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Desinscrever</button>
                </form>
                <a href="{{ route('trail.show', $trail->id) }}">Ver</a>
            </li>
            @if ($trail->pivot->trail_status > 0)
                <li>
                    Barra de status {{ $trail->pivot->trail_status }}
                    <a href="{{ route('trail.show', $trail->id) }}">Continuar</a>
                </li>
            @else
                <li>
                    Barra de status {{ $trail->pivot->trail_status }}
                    <a href="{{ route('trail.show', $trail->id) }}">Iniciar</a>
                </li>
            @endif
        @endforeach
    </ul>
@endif

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Sair</button>
</form>
