<h1>Teste mostrar uma Trilha</h1>

<p>{{ $trail->title }}</p>
<p>{{ $trail->time }}</p>

<ul>
    @foreach ($trail->modules as $module)
        <li>
            <p>{{ $module->title }}</p>
            <ul>
                @foreach ($module->contents as $content)
                    <li>
                        teste
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>



@if (isset($message))
    <p>{{ $message }}</p>
@endif
