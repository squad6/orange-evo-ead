<h1>Teste de inserção re registro</h1>
@if (isset($message))
    <p>{{ $message }}</p>
@endif
<form action="{{ route('content.store', [$trail->id, $module->id]) }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Título">
    @error('title')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="description" placeholder="Descrição">
    @error('description')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="time" name="time" placeholder="Duração">
    @error('time')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="type" placeholder="Tipo">
    @error('type')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="content_by" placeholder="Conteúdo por">
    @error('content_by')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="link" placeholder="Link">
    @error('content_by')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>

    <br>
    <button type="submit">Cadastrar</button>
</form>
