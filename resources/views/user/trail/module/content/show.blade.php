<h1>Teste mostrar uma Trilha</h1>

{{ $content }}

{{-- {{ $content->users->where('id', Auth::user()->id )->first() }} --}}


<form action="{{ route('user.status.content', ['content' => $content]) }}" method="POST">
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
</form>



@if (isset($message))
    <p>{{ $message }}</p>
@endif
