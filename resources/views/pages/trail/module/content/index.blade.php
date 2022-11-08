@if (isset($contents))
    <ul>
        @foreach ($contents as $content)
            <li>
                {{ $content->title }}
            </li>
        @endforeach
    </ul>
@endif



