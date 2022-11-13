<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!--<link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">-->
    <link
        href="https://fonts.googleapis.com/css?family=Inter:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/login.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <main class="py-4">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">{{ config('app.name', 'Laravel') }}</h1>
                                            <div class="text-center">
                                                <p class="small">Gerencie trilhas e conteúdos para a comunidade tech.
                                                </p>
                                            </div>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('E-mail:') }}</label>
                                                <input type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="email" name="email" aria-describedby="emailHelp"
                                                    placeholder="seu.contato@email.com" value="{{ old('email') }}"
                                                    required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Senha:') }}</label>
                                                <input type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="********" required
                                                    autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </form>

                                        @guest
                                            <div class="text-center">
                                                <p class="small">Login como usuário?<a href="{{ route('login') }}">
                                                        Entrar</a></p>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Modal Alerta --}}
        <div class="modal fade" id="alertModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alertModalLabel">Atenção</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>A plataforma para administradores possui suporte apenas para versão Desktop.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

    <script>
        const alertModal = document.getElementById('alertModal')
        var myModal = new bootstrap.Modal(alertModal)
        myModal.show();
    </script>

</body>

</html>
