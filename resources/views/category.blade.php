<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Category -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

    <x-header />



    <div class="category-page">

        <div class="heading">
            <h4 class="title">category</h4>
            <h1 class="cat-name">{{ $postData[0]->CategoryName }}</h1>
            <h1 class="background">category</h1> 
        </div>


        <div class="blog-list-container">

            <div class="blog-list">

                @foreach ($postData as $data)

                    <div class="list-card">

                        <a href="img" class="img">
                            <img src="{{ asset('assets/images/uploadImage/' . $data->BlogImage . '') }}" alt="">
                        </a>

                        <div class="blog-info">

                            <div class="first-line">
                                <a href="" class="blog-date">{{ $data->BlogPostDate }}</a>
                                <a href="javascript:void(0)" class="category">{{ $data->CategoryName }}</a>
                            </div>

                            <div class="title">
                                <a href="">{{ $data->BlogTitle }}</a>
                            </div>

                            <div class="blog-desc">
                                {{ Str::limit($data->BlogContent, 100) }}
                            </div>

                            <div class="btn">
                                <button>read more</button>
                            </div>

                        </div>

                    </div>


                @endforeach


            </div>

            <aside>

                <div class="news-letter-box">

                    <form action="" method="post">

                        <h2 class="title">Newsletter</h2>

                        <p class="placeholder">Enter your email address below to subscribe to my newsletter</p>

                        <input type="email" class="news-email" placeholder="Your email address" required>

                        <input type="submit" class="sub-btn" value="subscribe">

                    </form>

                </div>

                <div class="latest-post-box">
                    <div class="latest-box-heading">
                        <h2>Latest Posts</h2>
                    </div>

                    <div class="latest-post-card">
                        <a href="img" class="img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}" alt="">
                        </a>
                        <div class="post-info">
                            <h3 class="post-title">
                                <a href="#">
                                    Why every startup should adopt Amazon’s Hot Air Ballon Race
                                </a>
                            </h3>
                            <h4 class="post-date">aug 14 2018</h4>
                        </div>
                    </div>

                    <div class="latest-post-card">
                        <a href="img" class="img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}" alt="">
                        </a>
                        <div class="post-info">
                            <h3 class="post-title">
                                <a href="#">
                                    Why every startup should should should should should should adopt Amazon’s Hot Air
                                    Ballon Race
                                </a>
                            </h3>
                            <h4 class="post-date">aug 14 2018</h4>
                        </div>
                    </div>

                    <div class="latest-post-card">
                        <a href="img" class="img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}" alt="">
                        </a>
                        <div class="post-info">
                            <h3 class="post-title">
                                <a href="#">
                                    Why every amazon’s Hot Air Ballon Race
                                </a>
                            </h3>
                            <h4 class="post-date">aug 14 2018</h4>
                        </div>
                    </div>
                </div>

            </aside>

        </div>

    </div>





    <x-footer />
</body>

</html>
