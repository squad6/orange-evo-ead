<h1>Teste mostrar uma Trilha</h1>

{{ $content }}

{{-- {{ $content->users->where('id', Auth::user()->id )->first() }} --}}






@if (isset($message))
    <p>{{ $message }}</p>
@endif
