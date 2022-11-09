@if (isset($contents))

    <ul>
        @foreach ($contents as $key => $content)
            <li>
                {{ $content->id }}
                {{ $content->title }}

                {{-- {{ dd($content->module->trail) }} --}}
                <button><a href="{{route('content.show', ['trail' => $content->module->trail->id, 'module' => $content->module->id, 'content' => $content])}}">Acessar</a></button>
            </li>
            @if (isset(Auth::user()->contents->find($content->id)->pivot->content_status))
                @if (Auth::user()->contents->find($content->id)->pivot->content_status == 0)
                    <li>
                        Barra de status
                        <span>Não estudei</span>
                    </li>
                @endif
                @if (Auth::user()->contents->find($content->id)->pivot->content_status == 1)
                    <li>
                        Barra de status
                        <span>Em andamento</span>
                    </li>
                @endif
                @if (Auth::user()->contents->find($content->id)->pivot->content_status == 2)
                    <li>
                        Barra de status
                        <span>Concluído</span>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
@endif
