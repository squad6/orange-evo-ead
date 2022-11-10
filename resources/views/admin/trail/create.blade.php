<h1>Teste de inserção re registro</h1>
@if (isset($message))
    <p>{{ $message }}</p>
@endif
<form action="{{ route('admin.trail.store') }}" method="POST">
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
    <input type="text" name="trail_by" placeholder="Criado por">
    @error('trail_by')
        <br>
        <span> {{ $message }}</span>
    @enderror

    <br>
    <button type="submit">Cadastrar</button>
</form>
