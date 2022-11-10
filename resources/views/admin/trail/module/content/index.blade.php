@if (isset($contents))

    <ul>
        @foreach ($contents as $key => $content)
            <li>
                {{ $content->id }}
                {{ $content->title }}

                {{-- {{ dd($content->module->trail) }} --}}
                <button><a
                        href="{{ route('admin.content.show', ['trail' => $content->module->trail->id, 'module' => $content->module->id, 'content' => $content]) }}">Acessar</a></button>
            </li>
        @endforeach
    </ul>
@endif
