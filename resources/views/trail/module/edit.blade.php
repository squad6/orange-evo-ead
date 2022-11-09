<h1>Teste de edição de registro</h1>
@if (isset($message))
    <p>{{ $message }}</p>
@endif
{{-- {{ dd($module) }} --}}
<form action="{{ route('module.update', ['trail' => $trail, 'module' => $module]) }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input type="text" name="title" value="{{ $module->title }}">
    @error('title')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="text" name="description" value="{{ $module->description }}">
    @error('description')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>
    <input type="time" name="time"  value="{{ $module->time }}">
    @error('time')
        <br>
        <span> {{ $message }}</span>
    @enderror
    <br>

    <br>
    <button type="submit">Atualizar</button>
</form>

<form action="{{ route('module.destroy', ['trail' => $trail->id, 'module' => $module->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Excluir</button>
</form>
