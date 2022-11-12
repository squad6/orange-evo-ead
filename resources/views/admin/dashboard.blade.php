@extends('admin.layouts.app')

@section('content')
    {{-- Logado
    <h3>Login Admin Name: {{ Auth::guard('admin')->user()->name }}</h3>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form> --}}

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#createAdminModal">
            Novo Admin
        </button>
        <a class="btn btn-primary" href="{{ route('admin.trail.index') }}">Trilhas</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col" style="text-align: right">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $key => $admin)
                <tr>
                    <th scope="row">{{ $admin->name }}</th>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <form id="admin_form_delete" action="{{ route('admin.destroy', ['admin' => $admin->id]) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    {{-- Modal cadastro de novo admin --}}
    <div class="modal fade" id="createAdminModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="createAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">Cadastrar Administrador</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
