<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

    <x-header />



    <div class="login-container">

        <div class="third-party-login">
            <div class="box">
                <div class="title">
                    <h4>Log in With</h4>
                </div>
                <div class="buttons">
                    <a href="" class="btn">
                        <span><i class="fab fa-github"></i></span>
                        Github
                    </a>
                    <a href="" class="btn">
                        <span><i class="fab fa-google"></i></span>
                        Google
                    </a>
                </div>
            </div>
        </div>

        <div class="slider">
            <div class="forms">

                <div class="forgot-form form-box">

                    <form action="" method="post">
                        <h5 class="form-heading">
                            Or you're forgot your password?
                        </h5>

                        @csrf
                        <div class="inputs">

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                                <p class="error-text">This Is Some errors</p>
                            </div>

                        </div>

                        <button type="submit" class="submit-btn">
                            Submit
                            <i class="fas fa-spinner fa-spin"></i>
                        </button>

                    </form>

                </div>

                <div class="register-form form-box">

                    <form action="" method="post">

                        <h5 class="form-heading">
                            Or Sign up with credentials
                        </h5>

                        @csrf

                        <div class="inputs">

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" placeholder="UserName" name="username">
                                </div>
                                <p class="error-text">This Is Some Error</p>
                            </div>

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                                <p class="error-text">This Is Some Error</p>
                            </div>

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-unlock-alt"></i>
                                    </span>
                                    <input type="password" placeholder="Password" name="password">
                                </div>
                                <p class="error-text">This Is Some Error</p>
                            </div>

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-lock-alt"></i>
                                    </span>
                                    <input type="password" placeholder="Conform Password" name="password_confirmation">
                                </div>
                                <p class="error-text">This Is Some Error</p>
                            </div>

                        </div>

                        <button type="submit" class="submit-btn">
                            Sign Up
                            <i class="fas fa-spinner fa-spin"></i>
                        </button>
                    </form>

                </div>

                <div class="login-form form-box">

                    <form action="" method="post">
                        <h5 class="form-heading">
                            Or log in with credentials
                        </h5>

                        @csrf

                        <div class="inputs">


                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                                <p class="error-text">This Is Some Errors</p>
                            </div>

                            <div class="input-filed">
                                <div class="input">
                                    <span class="icon">
                                        <i class="fas fa-unlock-alt"></i>
                                    </span>
                                    <input type="password" placeholder="Password" name="password">
                                </div>
                                <p class="error-text">This Is Some Errors</p>
                            </div>

                        </div>

                        <button type="submit" class="submit-btn">
                            Sign In
                            <i class="fas fa-spinner fa-spin"></i>
                        </button>
                    </form>

                </div>

            </div>

        </div>


        <div class="links">
            <a href="#" class="forgot-link">Forgot Password</a>
            <a href="#" class="login-link">Already Created Account</a>
            <a href="#" class="register-link">Create New Account</a>
        </div>

    </div>


    <x-footer />



</body>


<script>
    $(document).ready(function() {


        // login slider
        $('.login-container .links .forgot-link').click(function(e) {
            e.preventDefault();
            $('.login-container .slider .forms').css({
                left: '0%',
                height: '250px'
            });
            $('.login-container .links a').show();
            $(this).hide();
        });

        $('.login-container .links .login-link').click(function(e) {
            e.preventDefault();
            $('.login-container .slider .forms').css({
                left: '-200%',
                height: '320px'
            });
            $('.login-container .links a').show();
            $(this).hide();
        });

        $('.login-container .links .register-link').click(function(e) {
            e.preventDefault();
            $('.login-container .slider .forms').css({
                left: '-100%',
                height: '530px'
            });
            $('.login-container .links a').show();
            $(this).hide();
        });


        // forms submit
        $('.login-container .slider .login-form form').submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();

            $(this).find('.submit-btn').attr('disabled', true);

            $.ajax({
                url: "{{ url('/login/loginRequest') }}",
                type: 'POST',
                data: formData,
                success: function(data) {

                    $('.login-container .slider .login-form form')
                        .find('.submit-btn')
                        .attr('disabled', false);

                    $('.login-container .slider .login-form form .error-text').hide();

                    if (data['status'] === 1) {
                        $('.login-container .slider .login-form form')[0].reset();
                        alert(data['message']);

                        location.replace("{{ url('/dashboard') }}");
                    } // 
                    else if (data['status'] === 0) {
                        $.each(data['errors'], function(name, msg) {
                            var errorText =
                                $(
                                    `.login-container .login-form form input[name=${name}]`
                                )
                                .parents('.input-filed').find('.error-text');

                            errorText.text(msg);
                            errorText.show('shake');
                        });
                    } //
                    else if (data['status'] === 2) {
                        alert(data['message']);
                    } //
                    else {
                        alert("Something Wan't Wrong");
                    }
                }
            });

        });

        $('.login-container .slider .register-form form').submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();

            $(this).find('.submit-btn').attr('disabled', true);

            $.ajax({
                url: "{{ url('/login/registerRequest') }}",
                type: "post",
                data: formData,
                success: function(data) {

                    $('.login-container .slider .register-form form')
                        .find('.submit-btn')
                        .attr('disabled', false);

                    $('.login-container .slider .register-form form .error-text').hide();

                    if (data['status'] === 1) {
                        $('.login-container .slider .register-form form')[0].reset();
                        alert(data['message']);
                    } //
                    else if (data['status'] === 0) {
                        $.each(data['errors'], function(name, msg) {
                            var errorText =
                                $(
                                    `.login-container .register-form form input[name=${name}]`
                                )
                                .parents('.input-filed').find('.error-text');

                            errorText.text(msg);
                            errorText.show('shake');
                        });
                    } //
                    else if (data['status'] === 2) {
                        alert(data['msg']);
                    } else {
                        alert("Something Wan't Wrong");
                    }
                }
            })
        });

        //  forgot work


        $('.login-container .slider .forgot-form form').submit(function(e) {

            e.preventDefault();

            var form = $(this);
            var formData = $(this).serialize();

            $(this).find('.submit-btn').attr('disabled', true);

            $.ajax({
                url: "{{ url('/login/forgotFormRequest') }}",
                type: "post",
                data: formData,
                success: function(data) {

                    $(form).find('.submit-btn').attr('disabled', false);
                    $(form).find('.error-text').hide();

                    if (data['status'] === 0) {
                        $.each(data['error'], function(name, error) {
                            var input = $(form).find(`input[name=${name}]`);
                            var errorText = input.parents('.input-filed').find(
                                '.error-text');
                            errorText.text(error);
                            errorText.show();
                        });
                    } //
                    else if (data['status'] === 1) {
                        alert(data['message']);
                        form[0].reset();
                    } //
                    else if (data['status'] === 2) {
                        alert(data['message']);
                    } //
                    else {
                        alert("Something Wan't Wrong");
                    }
                }
            });

        });
    });
</script>



</html>
