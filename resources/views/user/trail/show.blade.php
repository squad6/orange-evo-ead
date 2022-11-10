<h1>{{ $trail->title }}</h1>
<p>{{ $trail->time }}</p>

<button><a href="{{ route('user.dashboard') }}">Voltar</a></button>

@if (!isset($trail->users->find(Auth::user()->id)->pivot))
    <button><a href="{{ route('user.trail.subscribe', $trail->id) }}">Inscrever-se</a></button>
@endif

<br>

@if (isset($trail->users->find(Auth::user()->id)->pivot))
    Barra de status: {{ $trail->users->find(Auth::user()->id)->pivot->trail_status_percentage }} %
@endif

<ul>
    @foreach ($trail->modules as $module)
        <li>
            <p>{{ $module->title }}</p>
            <button><a href="{{ route('user.module.show', ['trail' => $trail->id, 'module' => $module->id]) }}">Ver
                    módulo</a></button>

        </li>
    @endforeach
</ul>



{{-- @if (isset($message))
    <p>{{ $message }}</p>
@endif --}}
