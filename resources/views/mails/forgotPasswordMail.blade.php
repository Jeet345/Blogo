<div class="mail-body">

    <h4>
        We're sending you this email because you requested a password reset.
        <br>
        Click on this link to create new password:
        <br>
        <a href="{{ url('/login/forgotPassword/' . $token) }}">
            Reset Password
        </a>
    </h4>

</div>
