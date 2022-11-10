<h1>Teste de edição de registro</h1>
@if (isset($message))
    <p>{{ $message }}</p>
@endif
<form action="{{ route('admin.trail.update', $trail->id) }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input type="text" name="title" value="{{ $trail->title }}">
    @error('title')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="description" value="{{ $trail->description }}">
    @error('description')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="time" name="time"  value="{{ $trail->time }}">
    @error('time')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="trail_by"  value="{{ $trail->trail_by }}">
    @error('trail_by')
        <br>
        <span> {{ $message }}</span>
    @enderror

    <br>
    <button type="submit">Atualizar</button>
</form>

<form action="{{ route('admin.trail.destroy', $trail->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Excluir</button>
</form>
