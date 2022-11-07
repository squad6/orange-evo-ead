<ul>
    @foreach ($trails as $trail)
            <li>
                {{$trail->title}}
            </li>
    @endforeach
</ul>
