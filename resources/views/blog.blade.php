<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Blog -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body>



    <x-header />


    <img src="{{ asset("assets/images/uploadImage/$blogData->BlogImage") }}" class="blog-header-img" alt="">



    <div class="blog-page">
        <div class="header-image-box">

            <div class="heading-overlay">

                <a href="/category/{{ $blogData->CategoryName }}"
                    class="category">{{ $blogData->CategoryName }}</a>

                <h1 class="title">{{ $blogData->BlogTitle }}</h1>

                <h5 class="blog-info">

                    <a href="author" class="blog-author">by {{ $blogData->AuthorName }}</a>
                    &nbsp;-&nbsp;
                    <span class="blog-date">{{ $blogData->BlogPostDate }}</span>
                    &nbsp;-&nbsp;
                    <span class="read-time">5 min read</span>

                </h5>

            </div>

        </div>

        <div class="blog-detail-container">

            <div class="blog-detail">

                <div class="share-box">
                    <h4>share</h4>
                    <ul>
                        <li><a href="facebook" style="color: #3b5998"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="twitter" style="color: #00acee"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="pinterest" style="color: #c8232c"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="email" style="color: black"><i class="fal fa-envelope"></i></a></li>
                    </ul>
                </div>

                <div class="blog">

                    <div class="blog-data">
                        {!! $blogData->BlogContent !!}
                    </div>

                    <div class="blog-footer">

                        <ul class="tags">

                            @foreach (explode(', ', $blogData->BlogTags) as $tag)

                                <li><a href="/tag/{{ $tag }}">{{ $tag }}</a></li>

                            @endforeach

                        </ul>

                        <ul class="links">
                            <li class="likes liked">
                                <a href="">
                                    <i class="fas fa-heart"></i>
                                    {{ $blogData->BlogLikes }}
                                </a>
                            </li>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>

                    </div>

                    <div class="author-info">
                        <div class="img">
                            <img src="{{ asset('assets/images/author.jpg') }}" alt="">
                        </div>
                        <div class="name">
                            <a href="">{{ $blogData->AuthorName }}</a>
                        </div>

                        <div class="about-author">
                            <p>
                                @if ($blogData->AuthorBio != null)
                                    {{ $blogData->AuthorBio }}
                                @else
                                    Orion Pax is constantly, if not always depicted as having strong moral character,
                                    excellent leadership, and sound decision-making skills, and an advanced
                                    extraterrestrial.
                                @endif

                            </p>
                        </div>
                        <ul class="social-links">
                            <li><a href="" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="" title="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>


            </div>

            <div class="related-container">

                <div class="heading">

                    <h1>Related Posts</h1>

                    <div class="box">

                        <div class="related-card">
                            <a href="" title="blog-title" class="img">
                                <img src="{{ asset('assets/images/marketing.jpg') }}">
                            </a>
                            <div class="blog-title">
                                <a href="" title="blog-title">
                                    Is there a relation between organic farming and greenhouse pollution?
                                </a>
                            </div>
                            <div class="blog-date">
                                <h4>jul 15 2018</h4>
                            </div>
                        </div>

                        <div class="related-card">
                            <a href="" title="blog-title" class="img">
                                <img src="{{ asset('assets/images/marketing.jpg') }}">
                            </a>
                            <div class="blog-title">
                                <a href="" title="blog-title">
                                    Is there a relation between organic farming and greenhouse pollution?
                                </a>
                            </div>
                            <div class="blog-date">
                                <h4>jul 15 2018</h4>
                            </div>
                        </div>

                        <div class="related-card">
                            <a href="" title="blog-title" class="img">
                                <img src="{{ asset('assets/images/marketing.jpg') }}">
                            </a>
                            <div class="blog-title">
                                <a href="" title="blog-title">
                                    Is there a relation between organic farming and greenhouse pollution?
                                </a>
                            </div>
                            <div class="blog-date">
                                <h4>jul 15 2018</h4>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="comment-container">

                <div class="comment-heading">
                    <h1>
                        @if ($commentData)
                            <span>{{ $commentData->count() }}</span>
                        @else
                            <span>0</span>
                        @endif
                        Comments
                    </h1>
                </div>


                @if ($commentData)

                    <div class="comment-box">

                        @foreach ($commentData as $data)

                            <div class="comment-card">
                                <div class="img">
                                    <img src="{{ asset('assets/images/user.jpg') }}">
                                </div>
                                <div class="comment-data">
                                    <div class="comment-meta">
                                        <h1 class="name">{{ $data->UserName }}</h1>
                                        <h5 class="comment-time">{{ $data->CommentDate }}</h5>
                                    </div>
                                    <p>
                                        @if ($data->CommentStatus == 0)
                                            This comment has been removed by the author.
                                        @else
                                            {{ $data->UserComment }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                        @endforeach

                    </div>

                @else

                    <h3 style="display: table; margin: 30px auto 100px auto;">Comments Not Available</h3>

                @endif


                <div class="comment-form">

                    <form action="" method="post" autocomplete="off">

                        <div class="form-heading">
                            <h1>Write A Comment</h1>
                        </div>

                        <div class="inputs">

                            <div class="row-1">

                                @csrf

                                <input type="hidden" name="blogId" value="{{ $blogData->BlogId }}">

                                <div class="input-filed">
                                    <input type="text" placeholder="Name" name="name" required>
                                </div>

                                <div class="input-filed">
                                    <input type="email" placeholder="Email" name="email" required>
                                </div>

                                <div class="input-filed">
                                    <input type="url" placeholder="Website" name="website">
                                </div>

                            </div>

                            <div class="row-2">

                                <div class="input-filed">
                                    <textarea name="comment" placeholder="Enter your comment here.."
                                        required></textarea>
                                </div>

                            </div>


                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="save-data" name="save-data">
                            <label for="save-data">
                                Save my name, email, and website in this browser for the next time I
                                comment.
                            </label>
                        </div>


                        <button type="submit" class="comment-submit">
                            post comment
                            <i class="fas fa-spinner fa-spin"></i>
                        </button>

                    </form>

                </div>

            </div>



        </div>

    </div>



    <x-footer />




    <script>
        // banner image scrolling script
        $(document).ready(function() {

            $(window).scroll(function() {

                var image = $('.blog-header-img');
                var pageValue = $(document).scrollTop();
                var pageY;

                pageY = pageValue * 0.6 + 'px';


                image.css({
                    'top': pageY
                });
            });

        });


        // comment script
        $(document).ready(function() {

            $('.blog-page .blog-detail-container .comment-container .comment-form form').submit(function(e) {

                e.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                form.find('.comment-submit').attr('disabled', true);

                $.ajax({
                    url: "{{ url('/blog/submitComment') }}",
                    type: 'POST',
                    data: formData,
                    success: function(data) {

                        form.find('.comment-submit').attr('disabled', false);

                        if (data['status'] === 1) {
                            form[0].reset();
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                            });
                        } //
                        else if (data['status'] === 0) {
                            $.each(data['errors'], function() {
                                console.warn(this.toString());
                            });
                        } //
                        else {
                            alert("Something Wan't Wrong");
                        }
                    },
                });

            });

        });
    </script>

</body>

</html>
