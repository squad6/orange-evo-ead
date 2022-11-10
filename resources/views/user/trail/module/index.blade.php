@if (isset($modules))

{{ $trail->title}}

<button><a href="{{ URL::previous() }}">Voltar</a></button>
@if (!isset($trail->users->find(Auth::user()->id)->pivot))
    <button><a href="{{ route('user.trail.subscribe', $trail->id) }}">Inscrever-se</a></button>
@endif

    <ul>
        @foreach ($modules as $module)
            <li>
                {{ $module->title }}
            </li>
        @endforeach
    </ul>
@endif



