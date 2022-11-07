@if (isset($trails))
    <ul>
        @foreach ($trails as $trail)
            <li>
                {{ $trail->title }}
            </li>
        @endforeach
    </ul>
@endif

@if (isset($message))
    <p>{{ $message }}</p>
@endif
