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
                    <div class="col-xl-5 col-md-4 mb-6">
                        <div class="card-body">
                            <p>
                                {{ $trail->description }}
                            </p>
                            <p> Trilha disponibilizada por {{$trail->trail_by}}</p>
                            @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                <h5 class="font-weight-bold" style="color: #36357E">Progresso da Trilha <span
                                        class="float-right">{{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}%</span>
                                </h5>
                                <div class="progress mb-4">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}%;
                                        background-color:  #FE4400"
                                         aria-valuenow="{{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Title -->
        <div class="navbar-expand">
            @if (!isset($trail->users->find(Auth::user()->id)->pivot))
                <a class="btn nav-item" style="background-color: #FE4400; color: white;"
                   href="{{ route('user.trail.subscribe', $trail->id) }}">Inscrever-se</a>
            @endif
            <a class="btn nav-item" style="background-color: #FE4400; color: white;"
               href="{{ route('user.dashboard')}}">Voltar</a>
        </div>
        <br>
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
                                <h4 class="m-0 font-weight-bold" style="color: #36357E">
                                    <i class="fas fa-fw fa-puzzle-piece"></i>
                                    {{ $module->title }}
                                </h4>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" style="color:#000;">
                                <div class="chart-pie pt-4 pb-2">
                                    <p>
                                        {{ $module->description }}
                                    </p>
                                </div>
                                <div class="navbar navbar-expand navbar-light bg-light">
                                    <h6 style="padding-right: 1%">
                                        <i class="fas fa-fw fa-book"></i>
                                        {{sizeof($module->contents)}} Conteúdo(s)
                                    </h6>
                                    <h6 class="">
                                        <i class="fas fa-fw fa-clock"></i>
                                        {{$module->time}}
                                    </h6>
                                </div>
                                {{-- @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                    <h5 class="font-weight-bold" style="color: #36357E">Progresso do Módulo <span
                                            class="float-right">{{ $trail->users->find(Auth::user())->getModuleStatusPercentage($module)}}%</span></h5>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $trail->users->find(Auth::user())->getModuleStatusPercentage($module)}}%;
                                        background-color:  #FE4400" aria-valuenow="{{ $trail->users->find(Auth::user())->getModuleStatusPercentage($module)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                @endif --}}
                                <a class="btn btn-block"
                                   style="background-color: #FE4400; color: white; margin-left: auto"
                                   href="{{ route('user.module.show', ['trail' => $trail, 'module' => $module]) }}">Acessar
                                    Módulo</a>
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
