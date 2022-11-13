@extends('user.layouts.home')

@section('page-content')
    <div class="container-fluid">

        <!-- Card Title -->
        <div class="card shadow mb-4" style="background-color: #FFDACC; color: black">
            <div class="py-3">
                <h2 class="m-0 font-weight-bold" style="padding-left: 1%; color: #36357E;">
                    <i class="fas fa-fw fa-stream"></i>
                    {{ $trail->title }}
                </h2>
                <div class="row">
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card-body">
                            <p>
                                {{ $trail->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Title -->

        <!-- Content Row -->

        @if(isset($trail->modules) and sizeof($trail->modules) > 0)
            <div class="row">
                @foreach($trail->modules as $key => $module)
                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold" style="color: #36357E">{{ $module->title }}</h5>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" style="color:#000;">
                                <div class="chart-pie pt-4 pb-2">
                                    <p>
                                        {{ $module->description }}
                                    </p>
                                </div>
                                <div class="navbar navbar-expand navbar-light bg-light">
                                    <h6>
                                        <i class="fas fa-fw fa-puzzle-piece"></i>
                                        {{sizeof($module->contents)}} Conteúdos
                                    </h6>
                                    <h6 class="">
                                        <i class="fas fa-fw fa-clock"></i>
                                        {{$module->time}}
                                    </h6>
                                    <a class="btn" style="background-color: #FE4400; color: white; margin-left: auto"
                                       href="{{ route('user.module.show', ['trail' => $trail->id, 'module' => $module->id]) }}">Continuar</a>
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
                                            Nenhum módulo disponível <i class="fas fa-fw fa-sad-cry"></i>
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
{{--<h1>{{ $trail->title }}</h1>--}}
{{--<p>{{ $trail->time }}</p>--}}

{{--<button><a href="{{ route('user.dashboard') }}">Voltar</a></button>--}}

{{--<br>--}}

{{--@if (isset($trail->users->find(Auth::user()->id)->pivot))--}}
{{--    Barra de status: {{ $trail->users->find(Auth::user()->id)->pivot->trail_status_percentage }} %--}}
{{--@endif--}}

{{--<ul>--}}
{{--    @foreach ($trail->modules as $module)--}}
{{--        <li>--}}
{{--            <p>{{ $module->title }}</p>--}}
{{--            <button><a href="{{ route('user.module.show', ['trail' => $trail->id, 'module' => $module->id]) }}">Ver--}}
{{--                    módulo</a></button>--}}

{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}

