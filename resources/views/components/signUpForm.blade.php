<div class="signUp-content">
    <div class="div-signUp-form">
        <h2 class="form-title">Sign up</h2>
        <form class="signUp-form" id="signUp-form">
            <div class="form-group">
                <input type="text" name="dni" id="dni" placeholder="Your Dni">
            </div>
            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="text" name="surname" id="surname" placeholder="Your Surname">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="phone" placeholder="Your Phone">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password">
            </div>
            <div class="form-check">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a
                        href="#" class="term-service"><u>Terms of service</u></a></label>
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
