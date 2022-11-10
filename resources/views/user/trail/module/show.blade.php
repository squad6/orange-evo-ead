<h1>{{ $trail->title }}</h1>

<p>{{ $trail->time }}</p>

<button><a href="{{ route('user.trail.show', ['trail' => $trail]) }}">Voltar</a></button>
@if (!isset($trail->users->find(Auth::user()->id)->pivot))
    <button><a href="{{ route('user.trail.subscribe', $trail->id) }}">Inscrever-se</a></button>
@endif

<br>

@if (isset($trail->users->find(Auth::user()->id)->pivot))
    Barra de status: {{ $trail->users->find(Auth::user()->id)->pivot->trail_status_percentage }} %
@endif

<ul>
    @foreach ($module->contents as $content)
        <li>
            <p>{{ $content->title }}</p>
            <button><a href="#">Ver
                    conteúdo</a></button>

        </li>
    @endforeach
</ul>


{{-- <form action="{{ route('user.status.content', ['content' => $content]) }}" method="POST">
    @csrf
    <select name="content_status">
        @if (isset($content->users->find(Auth::user()->id)->pivot))
            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 0)
                <option value="0" disabled>Não estudei</option>
            @else
                <option value="0">Não estudei</option>
            @endif
            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 1)
                <option value="1" disabled>Concluído</option>
            @else
                <option value="1">Consluído</option>
            @endif
        @else
            <option value="0" disabled>Não estudei</option>
            <option value="1">Consluído</option>
        @endif

    </select>
    <button type="submit">Enviar</button>
</form> --}}
