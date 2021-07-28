<div class="header">
    <ul class="left-menu">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="#">Authors</a></li>
        <li><a href="#">Tags</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Subscribe</a></li>
    </ul>

    <div class="logo">
        <a href="/">
            <img width="100px" src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
    </div>

    <ul class="right-menu">
        <li><a href="#"><i class="fas fa-search"></i></a></li>

        @if (session()->has('author'))
            <li>
                <a href="" class="hover-btn">Jeet B.</a>
                <div class="hover-menu">
                    <a href="/dashboard">Dashboard</a>
                    <a href="">Profile</a>
                    <a href="/login/logout">Logout</a>
                </div>
            </li>
        @else
            <li><a href="/login">Log In</a></li>
        @endif

    </ul>


    <div class="small-menu-container">

        <div class="icon">
            <span class="menu-icon">
                <i class="far fa-bars"></i>
            </span>
            <span class="close-icon">
                <i class="far fa-times"></i>
            </span>
        </div>

        <div class="menu-list">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="#">Authors</a></li>
                <li><a href="#">Tags</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Subscribe</a></li>
                @if (session()->has('author'))
                    <li><a href="/login">Dashboard</a></li>
                    <li><a href="/login">Profile</a></li>
                    <li><a href="/login">Logout</a></li>
                @else
                    <li><a href="/login">Log In</a></li>
                @endif
                <li><a class="search-btn" href="#">Search<i class="fas fa-search"></i></a></li>
            </ul>
        </div>

    </div>

</div>


<script>
    $(document).ready(function() {

        // menu button click
        $('.header .small-menu-container .icon .menu-icon').click(function() {
            $(this).hide();
            $('.header .small-menu-container .icon .close-icon').show();
            $('.header .small-menu-container .menu-list').show();
        });

        // close btn click
        $('.header .small-menu-container .icon .close-icon').click(function() {
            $(this).hide();
            $('.header .small-menu-container .icon .menu-icon').show();
            $('.header .small-menu-container .menu-list').hide();
        });

        // outside click hide
        $(document).mouseup(function(e) {
            var container = $(".header .small-menu-container");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.header .small-menu-container .menu-list').hide();
                $('.header .small-menu-container .icon .close-icon').hide();
                $('.header .small-menu-container .icon .menu-icon').show();
            }
        });



        // header hover menu
        $('.header .hover-btn').click(function(e) {

            e.preventDefault();

            $('.header .hover-menu').slideDown('fast');

        });

        $(document).mouseup(function(e) {
            var container = $(".header .hover-menu");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(container).fadeOut(300);
            }
        });


    });
</script>
