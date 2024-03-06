<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>
<body class="site">
    @section('header')
        <div class="container">
            <div class="header">
                <div id="logo"><img src="/img/logo.png" alt="logo EstuNest"></div>
                <div id="menu">
                    <span>Catálogo</span>
                    <a href="{{ route('aboutUs') }}"><span>Sobre Nosotros</span></a>
                    <span>Register</span>
                    <span>Login</span>
                </div>
            </div>
        </div>
    @show

    <div class="container site-content">
        @yield('content')
    </div>

    @section('footer')
        <div class="container">
            <div class="footer">
                <p>EstuNest 2024</p>
            </div>
        </div>
    @show
</body>
</html>