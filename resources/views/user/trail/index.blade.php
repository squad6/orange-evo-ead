@if (isset($trails))
    <ul>
        @foreach ($trails as $key => $trail)
            <li>
                @if (isset($trail->users->find(Auth::user()->id)->pivot))
                    {{ $trail->title }}
                    <button><a href="{{ route('user.trail.show', $trail->id) }}">Continuar</a></button>
                @else
                    {{ $trail->title }}
                    <button><a href="{{ route('user.trail.show', $trail->id) }}">Detalhes</a></button>
                @endif

            </li>
        @endforeach
    </ul>
@endif

@if (isset($message))
    <p>{{ $message }}</p>
@endif
