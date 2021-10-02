<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $authorData->AuthorName }} -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

    <x-header />


    <div class="author-page-container">

        <div class="author-profile">

            <div class="author-info">
                <div class="img">
                    <img src="{{ asset('assets/images/author2.jpg') }}" alt="">
                </div>
                <div class="author-meta">
                    <h1 class="name">{{ $authorData->AuthorName }}</h1>
                    <p class="city">from {{ $authorData->AuthorCity }}</p>

                    <div class="line"></div>

                    <p class="about-author">

                        {{ Str::limit($authorData->AuthorBio, 200) }}

                    </p>

                </div>
            </div>
            <div class="right-side-box">
                <div class="post-count">
                    <h1>
                        @isset($postData)
                            {{ $postData->count() }}
                        @else
                            0
                        @endisset
                    </h1>
                    <p>Posts</p>
                </div>
                <div class="social-icon">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>

            </div>

        </div>


        <div class="content-body">
            <div class="two-col-container">

                @if (isset($postData))

                    <div class="blog-body">

                        @foreach ($postData as $data)

                            <div class="blog-card">

                                <a href="/blog/{{ $data->BlogId }}" class="img">
                                    <img src="{{ asset("assets/images/uploadImage/$data->BlogImage") }}" alt="">
                                </a>

                                <div class="blog-info">

                                    <a href="/category/{{ $data->CategoryName }}"
                                        class="category">{{ $data->CategoryName }}</a>

                                    <div class="blog-title">
                                        <a href="/blog/{{ $data->BlogId }}">
                                            {{ $data->BlogTitle }}
                                        </a>
                                    </div>

                                    <h4 class="blog-date">{{ $data->BlogPostDate }} - 5 mins read</h4>

                                    <div class="blog-desc">
                                        <p>
                                            {{ Str::limit($data->BlogContent, 120) }}
                                        </p>
                                    </div>

                                </div>


                            </div>

                        @endforeach

                    </div>

                @else

                    <h3 style="display:table;margin: auto;color: grey">{{ $message }}
                    </h3>

                @endif







            </div>
        </div>

    </div>



    <x-footer />

</body>

</html>
