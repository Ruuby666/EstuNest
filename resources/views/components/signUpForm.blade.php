
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<div class="signUp-content">
    <div class="div-signUp-form">
        <h2 class="form-title">Sign up</h2>
        <form class="signUp-form" id="signUp-form" action="{{ route('signup.create') }}" method="POST" novalidate>
            @csrf
            <div class="form-group">
                <input type="text" name="dni" id="dni" placeholder="Your Dni" required>
                @error('dni')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Your Name" required>
                @error('name')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="surname" id="surname" placeholder="Your Surname" required>
                @error('surname')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="phone" placeholder="Your Phone" required>
                @error('phone')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Your Email" required>
                @error('email')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="pass" id="pass" placeholder="Password" required>
                @error('pass')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="pass_confirmation" id="pass_confirmation" placeholder="Repeat your password" required>
                @error('pass_confirmation')
                    <small class="errorInForm">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required>
                <label for="agree-term" class="label-agree-term"><span>I agree all statements in <a href="#" class="term-service"><u>Terms of service</u></a></span></label>
            </div>
            <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
            </div>
        </form>
    </div>
    <div class="signUp-image">
        <img src="img/logo.png" alt="sing up image">
        <a href="{{ route('logIn')}}" class="signUp-image-link">I am already member</a>
    </div>
</div>

