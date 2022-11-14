@extends('user.layouts.deshboard')

@section('content')
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.html">Orange Evolution</a>
        <!-- Navbar Items-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">
                            <div class="nav-link-icon"><i data-feather="grid"></i></div>
                            Dashboard
                        </a>
                        <!-- Sidenav Link (Tables)-->
                        <a class="nav-link" href="{{ route('user.trail.index') }}">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Trilhas
                        </a>
                        <a class="nav-link" href="{{ route('user.orange') }}">
                            <div class="nav-link-icon"><i data-feather="external-link"></i></div>
                            Orange Juice
                        </a>
                        <!-- Sidenav Link (Tables)-->
                        <a class="nav-link" href="{{ route('logout') }}">
                            <div class="nav-link-icon"><i data-feather="log-out"></i></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn-logout" type="submit">Sair</button>
                            </form>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="py-10 mb-4 bg-gradient-primary-to-secondary">
                    <div class="container-xl px-4">
                        <div class="text-left">
                            <h1 class="text-black">Ola!</h1>
                            <p class="lead mb-0 text-black-50">
                                Aqui você encontra as trilhas que está estudando!
                                Sabemos que a área de tecnologia é vasta, e que a quantidade de informação,
                                na maioria das vezes, mais atrapalha que ajuda. O equilíbrio é a chave.
                                Bons estudos!
                            </p>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4">
                    <h2 class="mt-5 mb-0">Minhas trilhas:</h2>
                    <p></p>
                    @if (sizeof($trails) == 0)
                        <p>Nenhuma trilha ainda iniciada :( .Adicione sua primeira lista na seção Trilhas.</p>
                    @endif
                    <hr class="mt-0 mb-4" />
                    @if (isset($trails))
                        <div class="row">
                            @foreach ($trails as $trail)
                                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                                    <div class="card">


                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <!--<i data-feather="monitor"></i>-->
                                                <div class="btn-group">
                                                    <form action="{{ route('user.trail.unsubscribe', $trail->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger mb-3" type="submit">Desinscrever-se</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <h5 class="card-title">{{ $trail->title }}</h5>
                                            <p class="card-text">{{ $trail->description}}
                                            </p>
                                            @if ($trail->pivot->trail_status_percentage > 0)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    Progresso da Trilha:
                                                    <div class="btn-group">
                                                        {{ $trail->pivot->trail_status_percentage }} %
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $trail->pivot->trail_status_percentage }}%;" aria-valuenow="{{ $trail->pivot->trail_status_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $trail->pivot->trail_status_percentage }}%</div>
                                                    </div>
                                                <br>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted"><i data-feather="book"></i> {{ $trail->modules->count() }} Módulos | <i data-feather="clock"></i>  {{ $trail->time }}</small>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger"  href="{{ route('user.trail.show', $trail->id) }}">Continuar</a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-between align-items-center">
                                                    Progresso Trilha:
                                                    <div class="btn-group">
                                                        {{ $trail->pivot->trail_status_percentage }} %
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $trail->pivot->trail_status_percentage }}%;" aria-valuenow="{{ $trail->pivot->trail_status_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $trail->pivot->trail_status_percentage }}%</div>
                                                    </div>
                                                <br>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted"><i data-feather="book"></i> {{ $trail->modules->count() }} Módulos | <i data-feather="clock"></i>  {{ $trail->time }}</small>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger" href="{{ route('user.trail.show', $trail->id) }}">Iniciar</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
@endsection
