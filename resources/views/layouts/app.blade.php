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
                <a href="{{route('mainPage')}}"><div id="logo"><img src="/img/logo.png" alt="logo EstuNest"></div></a>
                <div id="menu">
                    <span><a href="{{ route('catalog')}}"></a>Catálogo</span>
                    <span><a href="{{ route('aboutUs') }}"></a>Sobre Nosotros</span>
                    <span><a href="{{ route('signUp')}}"></a>Sign Up</span>
                    <span><a href="{{ route('logIn')}}"></a>Log In</span>
                </div>
            </div>
        </div>
    @show

    <div class="container site-content">
        @yield('content')
    </div>

    @section('footer')
        <div class="container-footer">
            <div class="footer">
                <p>EstuNest 2024</p>
            </div>
        </div>
    @show
</body>
</html>
