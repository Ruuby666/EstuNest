<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body class="site">
    @section('header')
        <div class="container">
            <div class="header">
                <a href="{{route('mainPage')}}"><div id="logo"><img src="/img/logo.png" alt="logo EstuNest"></div></a>
                <div id="menu">
                    <a href="{{ route('catalog') }}"><span>Catálogo</span></a>
                    <a href="{{ route('aboutUs') }}"><span>Sobre Nosotros</span></a>
                
                    @unless(Cookie::has('user_name'))
                        <a href="{{ route('signUp') }}"><span>Sign Up</span></a>
                    @endunless
                
                    <a href="{{ Cookie::has('user_name') ? route('userDetails') : route('logIn') }}">
                        <span>
                            @if(Cookie::has('user_name'))
                                <i class="fas fa-user-tie"></i> &nbsp; {{ Cookie::get('user_name') }}
                            @else
                                Log In
                            @endif
                        </span>
                    </a>
                </div>
                
            </div>
        </div>
    @show

    <div class="container site-content">
        @yield('content')
    </div>

    @section('footer')
        <footer>
            <div class="footer">
                <div class="row">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
                
                <div class="row">
                    <ul>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Career</a></li>
                    </ul>
                </div>
                
                <div class="row">
                    ESTUNEST Copyright © 2024 estuNest - All rights reserved || Designed By: Pedro Porteros & Rubén Sepulveda 
                </div>
            </div>
        </footer>
    @show
</body>
</html>
