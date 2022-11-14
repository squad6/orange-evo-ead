<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link
            href="https://fonts.googleapis.com/css?family=Inter:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{ url('assets/css/sb-admin.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/deshboard.css') }}" rel="stylesheet">

    </head>

    <body class="nav-fixed">
        
        <main>
            @yield('content')
        </main>

        <script src="{{ url('assets/js/feather-icons.js') }}"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ url('assets/js/sb-admin.js') }}"></script>
        <script src="{{ url('assets/js/sb-customizer.js') }}"></script>

    </body>

</html>
