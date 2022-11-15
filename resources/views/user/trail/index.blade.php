@extends('user.layouts.home')

@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Card Title -->
        <div class="card shadow mb-4" style="background-color: #FFDACC; color: black">
            <div class="py-3">
                <h2 class="m-0 font-weight-bold" style="padding-left: 1%; color: #36357E;">
                    <i class="fas fa-fw fa-stream"></i>
                    Trilhas
                </h2>
                <div class="row">
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card-body">
                            <p>Explore conhecimentos que transformam indústrias, negócios e vidas através de
                                trilhas gratuitas em Desenvolvimento Full-stack, UX/UI Design, QA e muito mais!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Title -->

        <!-- Content Row -->
        @if(isset($trails) and sizeof($trails) > 0)
            <div class="row">
                @foreach($trails as $key => $trail)
                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h4 class="m-0 font-weight-bold" style="color: #36357E">
                                    <i class="fas fa-fw fa-stream"></i>
                                    {{ $trail->title }}</h4>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body" style="color:#000;">
                                <div class="chart-pie pt-4 pb-2">
                                    <p>
                                        {{ $trail->description }}
                                    </p>
                                </div>
                                <p> Trilha disponibilizada por {{$trail->trail_by}}</p>
                                <div class="navbar navbar-expand navbar-light bg-light">
                                    <h6 style="padding-right: 1%">
                                        <i class="fas fa-fw fa-puzzle-piece"></i>
                                        {{sizeof($trail->modules)}} Módulo(s)
                                    </h6>
                                    <h6 class="">
                                        <i class="fas fa-fw fa-clock"></i>
                                        {{$trail->time}}
                                    </h6>
                                    @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                        <a class="btn" style="background-color: #FE4400; color: white; margin-left: auto"
                                           href="{{ route('user.trail.show', $trail->id) }}">Continuar</a>
                                    @else
                                        <a class="btn" style="background-color: #FE4400; color: white; margin-left: auto"
                                           href="{{ route('user.trail.show', $trail->id) }}">Detalhes</a>
                                    @endif
                                </div>
                                @if (isset($trail->users->find(Auth::user()->id)->pivot))
                                    <h5 class="font-weight-bold" style="color: #36357E">Progresso da Trilha <span
                                            class="float-right">{{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}%</span>
                                    </h5>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}%;
                                        background-color: #FE4400" aria-valuenow="{{ $trail->users->find(Auth::user())->getTrailUserStatusPercentage($trail)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                @endif
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
                                            Nenhuma trilha disponível <i class="fas fa-fw fa-sad-cry"></i>
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
