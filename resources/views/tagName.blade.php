<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>TagName -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>


    <x-header />



    <div class="tag-page">

        <div class="heading">
            <h4 class="title">tag</h4>
            <h1 class="cat-name">{{ $tagName }}</h1>
            <h1 class="background">browsing</h1>
        </div>


        <div class="blog-list-container">

            <div class="blog-list">

                @foreach ($postData as $data)

                    <div class="list-card">

                        <a href="/blog/{{ $data->BlogId }}" class="img">
                            <img src="{{ asset("assets/images/uploadImage/$data->BlogImage") }}" alt="">
                        </a>

                        <div class="blog-info">

                            <div class="first-line">
                                <a href="" class="blog-date">{{ $data->BlogPostDate }}</a>
                                <a href="/category/{{ $data->CategoryName }}"
                                    class="category">{{ $data->CategoryName }}</a>
                            </div>

                            <div class="title">
                                <a href="/blog/{{ $data->BlogId }}">{{ $data->BlogTitle }}</a>
                            </div>

                            <div class="blog-desc">
                                <p>{{ Str::limit($data->BlogContent, 100) }}</p>
                            </div>

                            <div class="btn">
                                <a href='/blog/{{ $data->BlogId }}'>read more</a>
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

                    @foreach ($latestBlog as $data)

                        <div class="latest-post-card">
                            <a href="/blog/{{ $data->BlogId }}" class="img">
                                <img src="{{ asset("assets/images/uploadImage/$data->BlogImage") }}" alt="">
                            </a>
                            <div class="post-info">
                                <h3 class="post-title">
                                    <a href="/blog/{{ $data->BlogId }}">
                                        {{ Str::limit($data->BlogTitle, 80) }}
                                    </a>
                                </h3>
                                <h4 class="post-date">{{ $data->BlogPostDate }}</h4>
                            </div>
                        </div>

                    @endforeach


                </div>

            </aside>

        </div>

    </div>



    <x-footer />

</body>

</html>
