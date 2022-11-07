@extends('admin.layouts.app')

@section('content')
    Logado
    <h3>Login Admin Name: {{ Auth::guard('admin')->user()->name }}</h3>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>


    <h2>Registrar um admin</h2>
    <a class="btn btn-primary" href="{{ route('admin.register.view') }}">novo admin</a>
@endsection
