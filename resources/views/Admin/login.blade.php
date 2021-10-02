<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>

    <div class="container">
        <div class="title">
            <h1>Admin Login</h1>
        </div>

        <form action="/admin/loginRequest" method="post">

            @csrf

            <div class="inputs">
                <div class="input-filed">
                    <span class="icon">
                        <i class="fal fa-user"></i>
                    </span>
                    <input type="email" placeholder="username" name="email" value="{{ old('email') }}">
                </div>
                <h4 class="error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </h4>

                <div class="input-filed">
                    <span class="icon">
                        <i class="fal fa-lock"></i>
                    </span>
                    <input type="password" placeholder="password" name="password" value="{{ old('password') }}">
                </div>
                <h4 class="error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </h4>

            </div>

            @if (session()->has('error'))

                @if (session('error') === 1)
                    <script>
                        alert('User Not Exist');
                    </script>
                @endif

                @if (session('error') === 2)
                    <script>
                        alert('Please Enter Correct Passoword');
                    </script>
                @endif

            @endif

            <button type="submit" class="login-btn">
                login
                <i class="fas fa-spinner fa-spin"></i>
            </button>

            <div class="forgot-link">
                <a href="javascript:void(0)">Forgot password?</a>
            </div>

        </form>


    </div>

</body>

</html>
