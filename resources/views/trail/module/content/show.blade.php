<h1>Teste mostrar uma Trilha</h1>

{{ $content }}

{{-- {{ $content->users->where('id', Auth::user()->id )->first() }} --}}


<form action="{{ route('status.content', ['content' => $content]) }}" method="POST">
@csrf
<select name="content_status">
    <option value="0">Não estudei</option>
    <option value="1">Em andamento</option>
    <option value="2">Concluido</option>
</select>
<button type="submit">Enviar</button>
</form>



@if (isset($message))
    <p>{{ $message }}</p>
@endif




