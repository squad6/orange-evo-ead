<h1>Teste de edição de registro</h1>
@if (isset($message))
    <p>{{ $message }}</p>
@endif
{{-- {{ dd($content) }} --}}
<form action="{{ route('admin.content.update', ['trail' => $trail->id, 'module' => $module->id, 'content' => $content->id]) }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input type="text" name="title" value="{{ $content->title }}">
    @error('title')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="description" value="{{ $content->description }}">
    @error('description')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="time" name="time"  value="{{ $content->time }}">
    @error('time')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="type" value="{{ $content->type }}">
    @error('type')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="content_by" value="{{ $content->content_by }}">
    @error('content_by')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="link" value="{{ $content->link }}">
    @error('content_by')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>

    <br>
    <button type="submit">Atualizar</button>
</form>

<form action="{{ route('admin.content.destroy', ['trail' => $trail->id,'module' => $module->id, 'content' => $content->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Excluir</button>
</form>
