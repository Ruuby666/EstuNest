
@if (Auth::check())
    <p>Bienvenido, {{ Auth::user()->name }}</p>
@endif

<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<div class="logIn-content">
    <div class="div-signUp-form">
        <h2 class="form-title">Log in</h2>
        <form class="signUp-form" id="signUp-form" action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Log in">
            </div>
        </form>
    </div>
    <div class="signUp-image">
        <img src="img/logo.png" alt="sing up image">
        <a href="{{ route('signUp')}}" class="signUp-image-link">I not a member yet</a>
    </div>
</div>
