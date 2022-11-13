@extends('user.layouts.home')

@section('page-content')
    <div class="container-fluid">

        <!-- Card Title -->
        <div class="card shadow mb-4" style="background-color: #FFDACC; color: black">
            <div class="py-3">
                <h2 class="m-0 font-weight-bold" style="padding-left: 1%; color: #36357E;">
                    <i class="fas fa-fw fa-stream"></i>
                    {{ $module->title }}
                </h2>
                <div class="row">
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card-body">
                            <p>
                                {{ $module->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Title -->

        <!-- Content Row -->

        @if(isset($module->contents) and sizeof($module->contents) > 0)
            <div class="row">
                @foreach($module->contents as $key => $content)
                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold" style="color: #36357E">{{ $content->title }}</h5>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" style="color:#000;">
                                <div class="chart-pie pt-4 pb-2">
                                    <p>
                                        {{ $content->description }}
                                    </p>
                                </div>
                                <div class="navbar navbar-expand navbar-light bg-light">
                                    <h6 class="">
                                        <i class="fas fa-fw fa-clock"></i>
                                        {{$content->time}}
                                    </h6>
{{--                                    <a class="btn" style="background-color: #FE4400; color: white; margin-left: auto"--}}
{{--                                       href="{{ route('user.module.show', ['trail' => $module->id, 'module' => $module->id]) }}">Continuar</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row bg-light" style="justify-content: center;">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="text-center">
                                        <p style="color: black">
                                            Nenhum conteúdo disponível <i class="fas fa-fw fa-sad-cry"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


{{--<h1>{{ $module->title }}</h1>--}}

{{--<p>{{ $module->time }}</p>--}}

{{--<button><a href="{{ route('user.trail.show', ['trail' => $module]) }}">Voltar</a></button>--}}
{{--@if (!isset($module->users->find(Auth::user()->id)->pivot))--}}
{{--    <button><a href="{{ route('user.trail.subscribe', $module->id) }}">Inscrever-se</a></button>--}}
{{--@endif--}}

{{--<br>--}}

{{--@if (isset($module->users->find(Auth::user()->id)->pivot))--}}
{{--    Barra de status: {{ $module->users->find(Auth::user()->id)->pivot->trail_status_percentage }} %--}}
{{--@endif--}}

{{--<ul>--}}
{{--    @foreach ($module->contents as $content)--}}
{{--        <li>--}}
{{--            <p>{{ $content->title }}</p>--}}
{{--            <button><a href="#">Ver--}}
{{--                    conteúdo</a></button>--}}

{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}


{{-- <form action="{{ route('user.status.content', ['content' => $content]) }}" method="POST">
    @csrf
    <select name="content_status">
        @if (isset($content->users->find(Auth::user()->id)->pivot))
            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 0)
                <option value="0" disabled>Não estudei</option>
            @else
                <option value="0">Não estudei</option>
            @endif
            @if ($content->users->find(Auth::user()->id)->pivot->content_status == 1)
                <option value="1" disabled>Concluído</option>
            @else
                <option value="1">Consluído</option>
            @endif
        @else
            <option value="0" disabled>Não estudei</option>
            <option value="1">Consluído</option>
        @endif

    </select>
    <button type="submit">Enviar</button>
</form> --}}
