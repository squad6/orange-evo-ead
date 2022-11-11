@extends('user.layouts.app')

@section('content')
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
                            <p class="small">Sua plataforma gratuita para estudar tecnologia.</p>
                        </div>
                    </div>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail:') }}</label>
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="email" name="email" aria-describedby="emailHelp"
                                placeholder="seu.contato@email.com" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha:') }}</label>
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="********" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck">
                                    {{ __('Manter-me logado') }}
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block">
                            {{ __('Login') }}
                        </button>
                    </form>


                    <!--<div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>-->
                    @guest
                        @if (Route::has('register'))
                            <div class="text-center">
                                <p class="small">Ainda não tem uma conta? <a href="{{ route('register') }}">{{ __('Criar') }}</a></p>
                            </div>
                        @endif
                    <div class="text-center">
                        <p class="small">Login com administrador?<a href="{{route('admin.login')}}"> Entrar</a></p>
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
@endsection
