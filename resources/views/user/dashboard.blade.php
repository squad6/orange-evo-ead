<h1>Dashboard</h1>

<button><a href="{{ route('user.trail.index') }}">Trilhas</a></button>
<button><a href="{{ route('user.orange') }}">Nossos links</a></button>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Sair</button>
</form>


<h2>Minhas trilhas</h2>

@if (isset($trails))
    <ul>
        @foreach ($trails as $trail)
            <li>
                {{ $trail->title }}
                <br>
                <form action="{{ route('user.trail.unsubscribe', $trail->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Desinscrever-se</button>
                </form>
                @if ($trail->pivot->trail_status_percentage > 0)
                    Barra de status: {{ $trail->pivot->trail_status_percentage }} %
                    <br>
                    <a href="{{ route('user.trail.show', $trail->id) }}">Continuar</a>
                @else
                    Barra de status: {{ $trail->pivot->trail_status_percentage }} %
                    <br>
                    <a href="{{ route('user.trail.show', $trail->id) }}">Iniciar</a>
                @endif
            </li>
            <hr>

        @endforeach
    </ul>
@endif

