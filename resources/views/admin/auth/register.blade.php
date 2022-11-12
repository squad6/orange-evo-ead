@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Criar conta</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome:') }}</label>
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name"
                                    placeholder="Ana Clarice" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail:') }}</label>
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="ana.clarice@gmail.com"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha:') }}</label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="********"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-danger btn-user btn-block">
                                {{ __('Register') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
