<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password -- Blogo</title>

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


    <div class="forgotPassword-container">

        <div class="title">
            <h2>Reset Password</h2>
        </div>

        <div class="inputs">

            <form action="" method="POST">

                @csrf

                <input type="hidden" name="authorToken" value="{{ $data['token'] }}">

                <div class="input-filed">
                    <div class="input">
                        <span class="icon">
                            <i class="fas fa-unlock-alt"></i>
                        </span>
                        <input type="password" placeholder="New Password" name="password">
                    </div>
                    <p class="error-text">This Is Some Errors</p>
                </div>

                <div class="input-filed">
                    <div class="input">
                        <span class="icon">
                            <i class="fas fa-lock-alt"></i>
                        </span>
                        <input type="password" placeholder="Conform Password" name="password_confirmation">
                    </div>
                    <p class="error-text">This Is Some Errors</p>
                </div>

                <button type="submit" class="submit-btn">
                    Reset
                    <i class="fas fa-spinner fa-spin"></i>
                </button>
            </form>

        </div>
    </div>



    <script>
        $(document).ready(function() {

            $('.forgotPassword-container form').submit(function(e) {
                e.preventDefault();

                $(this).find('.submit-btn').attr('disabled', true);

                var form = $(this);

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ url('/login/forgotPassword/forgotRequest') }}",
                    type: 'POST',
                    data: formData,
                    success: function(data) {

                        $(form).find('.submit-btn').attr('disabled', false);
                        $(form).find('.error-text').hide();

                        if (data['status'] === 0) {
                            $.each(data['error'], function(name, error) {
                                var input = $(form).find(`input[name=${name}]`);
                                var errorText = input.parents('.input-filed')
                                    .find('.error-text');

                                errorText.text(error);
                                errorText.show('shake');

                            });
                        } //
                        else if (data['status'] === 1) {

                            $(form)[0].reset();
                            alert(data['message']);

                            location.replace("{{ url('/login') }}");

                        }
                    }
                })


            });

        });
    </script>


</body>

</html>
