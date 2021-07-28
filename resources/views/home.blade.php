<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home -- Blogo</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</head>

<body>


    <x-header />

    <div class="banner-slider">

        <div class="prev-arrow arrow">
            <i class="far fa-chevron-left"></i>
        </div>
        <div class="next-arrow arrow">
            <i class="far fa-chevron-right"></i>
        </div>

        <div class="slider">

            @foreach ($bannerData as $data)

                <div class="slide-box">

                    <a href="/blog/{{ $data->BlogId }}" class="image" title="{{ $data->BlogTitle }}">
                        <img src="{{ asset('assets/images/uploadImage/' . $data->BlogImage) }}">
                        <div class="overlayer"></div>
                    </a>
 
                    <div class="title-box">
                        <a href='category' class="category">{{ $data->CategoryName }}</a>
                        <h2 class="title">
                            <a href="/blog/{{ $data->BlogId }}">
                                {{ $data->BlogTitle }}
                            </a>
                        </h2>
                        <p>More off this less hello</p>

                        <a href='/blog/{{ $data->BlogId }}' class="btn">read more</a>
                    </div>

                </div>


            @endforeach



        </div>

    </div>

    <div class="content-body">

        <div class="news-letter">

            <form action="" method="post">

                <h3 class="title">Subscribe to my newsletter to get updates in your inbox!</h3>
                <div class="input">
                    <input type="text" placeholder="Your Name">
                    <input type="email" placeholder="Your Email">

                    <input type="submit" class="submit-btn" value="subscribe now">

                </div>

            </form>

        </div>

        <div class="category-box">

            <div class="cate-card">

                <a href="cate" class="box">

                    <img src="{{ asset('assets/images/gadgets.jpg') }}">

                    <div class="cate-name">
                        Gadgets
                    </div>
                    <div class="border-container">

                    </div>


                </a>


            </div>

            <div class="cate-card">

                <a href="cate" class="box">

                    <img src="{{ asset('assets/images/marketing.jpg') }}">

                    <div class="cate-name">
                        marketing
                    </div>

                    <div class="border-container">

                    </div>

                </a>


            </div>

            <div class="cate-card">

                <a href="cate" class="box">


                    <img src="{{ asset('assets/images/trend.jpg') }}">

                    <div class="cate-name">
                        trends
                    </div>

                    <div class="border-container">

                    </div>


                </a>


            </div>

        </div>

        <div class="oneBlog-aside">

            <div class="oneBlogContainer">

                <div class="blog-body">

                    <div class="blog">

                        <a href="img" class="blog-img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}">
                        </a>

                        <div class="blog-content">

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>More off this less hello salamander lied porpoise much over tightly circa horse taped
                                    so
                                    innocuously outside crud mightily rigorous… </p>
                            </div>

                            <div class="read-more">
                                <a href="readmore">Read More</a>
                            </div>

                        </div>


                    </div>

                </div>

                <aside>

                    <div class="title">
                        <h2>More Featured</h2>
                    </div>

                    <div class="list-body">


                        <div class="list">

                            <a href="category" class="category">marketing</a>
                            <div class="list-title">
                                <a href="">How to hack your Virtual Reality Life for Max Efficiency!</a>
                            </div>
                            <h4 class="list-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="list">

                            <a href="category" class="category">marketing</a>
                            <div class="list-title">
                                <a href="">How to hack your Virtual Reality Life for Max Efficiency!</a>
                            </div>
                            <h4 class="list-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="list">

                            <a href="category" class="category">marketing</a>
                            <div class="list-title">
                                <a href="">How to hack your Virtual Reality Life for Max Efficiency!</a>
                            </div>
                            <h4 class="list-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="list">

                            <a href="category" class="category">marketing</a>
                            <div class="list-title">
                                <a href="">How to hack your Virtual Reality Life for Max Efficiency!</a>
                            </div>
                            <h4 class="list-date">aug 14 2015 - 5 mins read</h4>

                        </div>


                    </div>


                </aside>

            </div>

        </div>

        <div class="two-col-container">

            <div class="title">
                <h1>News & Trends</h1>
                <a href="view all">View All</a>
            </div>

            <div class="blog-body">


                @foreach ($trendData as $data)
                    <div class="blog-card">

                        <a href="/blog/{{ $data->BlogId }}" class="img" title="{{ $data->BlogTitle }}">
                            <img src="{{ asset('assets/images/uploadImage/' . $data->BlogImage) }}" alt="">
                        </a>

                        <div class="blog-info">

                            <a href="/category/{{ $data->BlogCategoryId }}"
                                class="category">{{ $data->CategoryName }}</a>

                            <div class="blog-title">
                                <a href="/blog/{{ $data->BlogId }}">
                                    {{ $data->BlogTitle }}
                                </a>
                            </div>

                            <h4 class="blog-date">{{ $data->BlogPostDate }} - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>{{ Str::limit($data->BlogContent, 130) }}</p>
                            </div>

                        </div>


                    </div>

                @endforeach


            </div>

            <div class="load-more-btn">
                <button>load more</button>
            </div>

        </div>

        <div class="three-col-container">

            <div class="title">
                <h1>Gadgets</h1>
                <a href="view all">View All</a>
            </div>

            <div class="blog-body">

                @foreach ($gadgetData as $data)

                    <div class="blog-card">

                        <a href="/blog/{{ $data->BlogId }}" class="img" title="{{ $data->BlogTitle }}">
                            <img src="{{ asset('assets/images/uploadImage/' . $data->BlogImage) }}" alt="">
                        </a>

                        <div class="blog-info">

                            <a href="/category/{{ $data->BlogCategoryId }}"
                                class="category">{{ $data->CategoryName }}</a>

                            <div class="blog-title">
                                <a href="/blog/{{ $data->BlogId }}">
                                    The biggest and most awesome camera rumors of the year
                                </a>
                            </div>

                            <h4 class="blog-date">{{ $data->BlogPostDate }} - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>
                                    {{ Str::limit($data->BlogContent, 75) }}
                                </p>
                            </div>

                        </div>


                    </div>

                @endforeach



            </div>

            <div class="load-more-btn">
                <button>load more</button>
            </div>



        </div>

        <div class="first-big-three-col-container">

            <div class="title">
                <h1>Marketing</h1>
                <a href="view all">View All</a>
            </div>

            <div class="blog-body">

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/phone.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <a href="#" class="category">Trends</a>

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>

                        <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        <div class="blog-desc">
                            <p>More off this less hello salamander lied porpoise much over tightly circa horse taped so
                                innocuously outside crud mightily rigorous…

                            </p>
                        </div>

                    </div>


                </div>

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>


                    </div>


                </div>

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/phone.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>


                    </div>


                </div>

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>


                    </div>


                </div>

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/phone.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>


                    </div>


                </div>

            </div>


        </div>

        <div class="two-col-container">

            <div class="title">
                <h1>Business</h1>
                <a href="view all">View All</a>
            </div>

            <div class="blog-body">

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <a href="#" class="category">Trends</a>

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>

                        <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        <div class="blog-desc">
                            <p>More off this less hello salamander lied porpoise much over tightly circa horse taped so
                                innocuously outside crud mightily rigorous… </p>
                        </div>

                    </div>


                </div>

                <div class="blog-card">

                    <a href="img" class="img">
                        <img src="{{ asset('assets/images/phone.jpg') }}" alt="">
                    </a>

                    <div class="blog-info">

                        <a href="#" class="category">Trends</a>

                        <div class="blog-title">
                            <a href="title">
                                The biggest and most awesome camera rumors of the year
                            </a>
                        </div>

                        <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        <div class="blog-desc">
                            <p>More off this less hello salamander lied porpoise much over tightly circa horse taped so
                                innocuously outside crud mightily rigorous… </p>
                        </div>

                    </div>


                </div>

            </div>

            <div class="load-more-btn">
                <button>load more</button>
            </div>

        </div>

        <div class="oneBlog-aside">

            <div class="oneBlogContainer">

                <div class="blog-body">

                    <div class="blog">

                        <div class="title">
                            <h1>Latest</h1>
                        </div>

                        <a href="img" class="blog-img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}">
                        </a>

                        <div class="blog-content">

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>More off this less hello salamander lied porpoise much over tightly circa horse taped
                                    so
                                    innocuously outside crud mightily rigorous… </p>
                            </div>

                            <div class="read-more">
                                <a href="readmore">Read More</a>
                            </div>

                        </div>


                    </div>

                    <div class="blog">

                        <a href="img" class="blog-img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}">
                        </a>

                        <div class="blog-content">

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>More off this less hello salamander lied porpoise much over tightly circa horse taped
                                    so
                                    innocuously outside crud mightily rigorous… </p>
                            </div>

                            <div class="read-more">
                                <a href="readmore">Read More</a>
                            </div>

                        </div>


                    </div>

                    <div class="blog">

                        <a href="img" class="blog-img">
                            <img src="{{ asset('assets/images/ballone.jpg') }}">
                        </a>

                        <div class="blog-content">

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                            <div class="blog-desc">
                                <p>More off this less hello salamander lied porpoise much over tightly circa horse taped
                                    so
                                    innocuously outside crud mightily rigorous… </p>
                            </div>

                            <div class="read-more">
                                <a href="readmore">Read More</a>
                            </div>

                        </div>


                    </div>

                    <div class="load-more-btn">
                        <button>load more</button>
                    </div>

                </div>

                <aside>

                    <div class="title">
                        <h2>Most Commented</h2>
                    </div>

                    <div class="side-blog-body">

                        <div class="side-blog">

                            <a href="img" class="blog-img">
                                <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                            </a>

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="side-blog">

                            <a href="img" class="blog-img">
                                <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                            </a>

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="side-blog">

                            <a href="img" class="blog-img">
                                <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                            </a>

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        </div>

                        <div class="side-blog">

                            <a href="img" class="blog-img">
                                <img src="{{ asset('assets/images/camera.jpg') }}" alt="">
                            </a>

                            <a href="category" class="category">marketing</a>

                            <div class="blog-title">
                                <a href="title">Why every startup should adopt Amazon’s Hot Air Ballon
                                    Race</a>
                            </div>

                            <h4 class="blog-date">aug 14 2015 - 5 mins read</h4>

                        </div>




                    </div>


                </aside>

            </div>

        </div>

    </div>


    <x-footer />


</body>

</html>



<script>
    $(document).ready(function() {


        // prevent dragging img
        $('*').on('dragstart', function(event) {
            event.preventDefault();
        })

        $('.banner-slider .slider .slide-box:eq(3)').addClass('active');

        //============================== home page banner slider

        function sliderNext() {

            $('.banner-slider .slider').animate({
                right: '+=67%'
            }, 400, function() {

                // set first child to last
                var first = $('.banner-slider .slider .slide-box').first();
                first.appendTo('.banner-slider .slider');

                $('.banner-slider .slider').css('right', '');


                // change active class
                var activeIndex = $('.banner-slider .slider .active').index();
                activeIndex++;
                $('.banner-slider .slider .slide-box').removeClass('active');
                $('.banner-slider .slider .slide-box').eq(activeIndex).addClass('active');



            });

        }

        function sliderPrev() {

            $('.banner-slider .slider').animate({
                right: '-=67%'
            }, 400, function() {

                // set last child to first
                var first = $('.banner-slider .slider .slide-box').last();
                first.prependTo('.banner-slider .slider');

                $('.banner-slider .slider').css('right', '');

                // change active class
                var activeIndex = $('.banner-slider .slider .active').index();
                activeIndex--;
                $('.banner-slider .slider .slide-box').removeClass('active');
                $('.banner-slider .slider .slide-box').eq(activeIndex).addClass('active');

            });

        }

        // slider next btn click
        $('.banner-slider .next-arrow').click(function() {
            sliderNext();
        });

        // slider prev btn click
        $('.banner-slider .prev-arrow').click(function() {
            sliderPrev();
        });

        // autoplay slider
        var autoplay = function() {
            setInterval(() => {
                sliderNext();
            }, 8000);
        };

        autoplay();


        // sliding slider // grabbing slider

        var isDown = false;
        var startX;
        var currentX;

        $('.banner-slider').on('mousedown', function(e) {
            isDown = true;
            startX = e.pageX;
        });

        $('.banner-slider').on('mouseleave', function(e) {
            isDown = false;
        });

        $('.banner-slider').on('mouseup', function(e) {
            isDown = false;

            var endX = e.pageX;

            if (startX > endX) {
                sliderNext();
            } else if (startX < endX) {
                sliderPrev();
            }

        });

        $('.banner-slider').on('mousemove', function(e) {

            // if (isDown) {

            //     var currentX = e.pageX;
            //     var sliderWalk = (startX - currentX) + 'px';

            //     $('.banner-slider .slider').css('right', '');

            //     // console.log(slideRight);
            //     $('.banner-slider .slider').css({
            //         'right': '+=' + sliderWalk
            //     });
            // }


        });


    });
</script>
