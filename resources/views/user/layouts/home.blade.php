@extends('user.layouts.app')

@section('content')
    <div id="page-top">
        <div id="wrapper">
            {{-- Sidebar --}}
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                   style="background-color: #FE4400">
                    <div>{{ config('app.name', 'Laravel') }}</div>
                </a>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Nav Item - Trilhas -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user.trail.index') }}">
                        <i class="fas fa-fw fa-stream"></i>
                        <span>Trilhas</span></a>
                </li>

                <!-- Nav Item - Orange Juice -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user.orange') }}">
                        <i class="fas fa-fw fa-external-link-alt"></i>
                        <span>Orange Juice</span></a>
                </li>

                <!-- Nav Item - Sair -->
                <li class="nav-item active">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link" type="submit" style="background-color: transparent; border: none">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Sair</span>
                        </button>
                    </form>
                </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            {{-- End Sidebar --}}

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow"
                         style="background-color: #FE4400">
                    </nav>
                    <!-- End of Topbar -->
                    @yield('page-content')
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-light" style="">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>© 2022 FCamara Formação e Consultoria. Todos os direitos reservados.</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
        </div>
    </div>
@endsection
