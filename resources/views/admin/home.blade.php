<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Logado
    <h3>Login Admin Name: {{ Auth::guard('admin')->user()->name }}</h3>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>


    <h2>Registrar um admin</h2>
    <a class="btn btn-primary" href="{{ route('admin.register.view') }}">novo admin</a>
</body>

</html>
