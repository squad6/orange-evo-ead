@if (isset($modules))
    <ul>
        @foreach ($modules as $module)
            <li>
                {{ $module->title }}
            </li>
        @endforeach
    </ul>
@endif



