<h1>Teste mostrar uma Trilha</h1>

<p>{{ $trail->title }}</p>
<p>{{ $trail->time }}</p>


<ul>
    @foreach ($trail->modules as $module)
        <li>
            <p>{{ $module->title }}</p>
            <button><a href="{{ route('admin.content.index', ['trail' => $trail->id, 'module' => $module->id]) }}">Ver conteudo</a></button>

        </li>
    @endforeach
</ul>



@if (isset($message))
    <p>{{ $message }}</p>
@endif

@if (Auth::guard('admin')->check())
    Sou Admin
@endif

@if (Auth::guard('web')->check())
    Sou Usuário
@endif
