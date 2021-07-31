<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>

<body>


    <div class="page-container">

        <div class="sidebar">{{-- toggle collapse menu --}}

            <div class="sidebar-header">
                <span class="menu-icon">
                    <i class="fal fa-bars"></i>
                </span>
                <h2>Blogo</h2>
            </div>
            <div class="sidebar-menu-body">
                <ul class="menu">
                    <li><a href="viewDashboard">
                            <span class="icon">
                                <i class="far fa-home"></i>
                            </span>
                            <h4>Dashboard</h4>
                        </a></li>
                    <li><a href="viewBlog">
                            <span class="icon">
                                <i class="far fa-blog"></i>
                            </span>
                            <h4>Blog</h4>
                        </a></li>
                    <li><a href="viewCategory">
                            <span class="icon">
                                <i class="far fa-folder-tree"></i>
                            </span>
                            <h4>Category</h4>
                        </a></li>
                    <li><a href="viewTags">
                            <span class="icon">
                                <i class="far fa-tags"></i>
                            </span>
                            <h4>Tags</h4>
                        </a></li>
                    <li><a href="viewSetting">
                            <span class="icon">
                                <i class="far fa-cog"></i>
                            </span>
                            <h4>Setting</h4>
                        </a></li>
                </ul>

                <ul class="logout">
                    <li><a href="viewLogout">
                            <span class="icon">
                                <i class="far fa-sign-out-alt"></i>
                            </span>
                            <h4>Log Out</h4>
                        </a></li>
                </ul>
            </div>


        </div>

        <div class="content-body">
            {{-- <h1>404 -- Page Not Found</h1> --}}
        </div>

    </div>

    <script>
        $(document).ready(function() {


            // toggle sidebar menu
            $('.page-container .sidebar .menu-icon').click(function() {
                $('.page-container .sidebar').toggleClass('collapse');
            });



            function loadPage() {

                var filename = location.pathname.substr(location.pathname.lastIndexOf("/") + 1);

                if (filename == 'dashboard' || filename == '') {
                    filename = 'viewDashboard';
                    history.pushState(null, '', `/dashboard/${filename}`);
                } //
                else {
                    history.pushState(null, '', `/dashboard/${filename}`);
                }

                $('.page-container .content-body')
                    .load(`/dashboard/${filename}`,
                        function(data, statusTxt, xhr) {
                            if (statusTxt == 'success') {
                                console.log('load Success');
                                $('.page-container .sidebar .menu li a').removeClass('active');
                                $(`.page-container .sidebar .menu li a[href=${filename}]`).addClass('active');
                            } //
                            else if (statusTxt == 'error') {
                                if (xhr.status == '404') {
                                    history.pushState(null, '', `/dashboard/404`);

                                    $('.page-container .sidebar .menu li a').removeClass('active');
                                    $('.page-container .content-body').load(`/dashboard/404`);
                                } //
                                else {
                                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                                }
                            } //
                            else {
                                alert("Something Wan't Wrong");
                            }
                        });
            }



            // on click change url
            $('.page-container .sidebar .menu li a').click(function(e) {

                e.preventDefault();

                var page = $(this).attr('href');

                history.pushState(null, '', `/dashboard/${page}`);

                loadPage();

            });

            loadPage();

        });
    </script>

</body>

</html>
