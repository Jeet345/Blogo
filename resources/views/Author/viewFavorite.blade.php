<div class="post-container">

    <div class="post-header">

        <div class="right-side-header">
            <div class="box">
                <div class="icon">
                    <i class="fab fa-telegram-plane"></i>
                </div>
                <h5>Published</h5>
                <h4 class="count">
                    {{ $publishedPostCount }}
                </h4>
            </div>

            <div class="box">
                <div class="icon">
                    <i class="fas fa-file"></i>
                </div>
                <h5>In Draft</h5>
                <h4 class="count">
                    {{ $UnpublishedPostCount }}
                </h4>
            </div>
        </div>

    </div>

    <div class="post-list">

        @foreach ($postData as $data)

            <div class="post-card">
                <div class="post-img">
                    <img src="{{ asset("assets/images/uploadImage/$data->BlogImage") }}"
                        title="{{ $data->BlogTitle }}" alt="" loading='lazy'>
                </div>
                <div class="post-desc">

                    <a class="title" href="">{{ $data->BlogTitle }}</a>
                    <p>
                        {{ Str::limit($data->BlogContent, 230) }}
                    </p>
                    <div class="user-action">
                        <li class="btn">
                            <div class="icon" style="background-color: #9B5AB6">
                                <i class="fas fa-comment-alt-lines"></i>
                                <span class="dot"></span>
                            </div>
                            <div class="count">
                                10
                            </div>
                        </li>

                        <li>
                            <div class="icon" style="background-color: #E54D3C">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="count">
                                {{ $data->BlogLikes }}
                            </div>
                        </li>

                        <li>
                            <h4 class="post-time">{{ $data->BlogPostDate }}</h4>
                        </li>

                    </div>
                </div>
                <div class="post-action">

                    @if ($data->BlogStatus == '1')
                        <a href="" class="draft-box box" data-id="{{ $data->BlogId }}" title="Revert To Draft">
                            <span style="background-color: #9B5AB6; font-size: 0.7rem " class="icon"><i
                                    class="fas fa-file"></i></span>
                            <span class="name">Draft</span>
                        </a>
                    @else
                        <a href="" class="publish-box box" data-id="{{ $data->BlogId }}" title="Publish Post">
                            <span style="background-color: #9B5AB6; font-size: 0.7rem " class="icon"><i
                                    class="fab fa-telegram-plane"></i></span>
                            <span class="name">Publish</span>
                        </a>
                    @endif


                    <a href="" class="favorite-box box" data-id="{{ $data->BlogId }}">
                        <span style="background-color:#bababa;" class="icon"><i
                                class="fas fa-heart"></i></span>
                        <span class="name">Favorite</span>
                    </a>
                    <a href="" class="view-box box" data-id="{{ $data->BlogId }}">
                        <span style="background-color: #2980B9" class="icon"><i
                                class="fas fa-eye"></i></span>
                        <span class="name">View</span>
                    </a>
                    <a href="" class="delete-box box" data-id="{{ $data->BlogId }}">
                        <span style="background-color: #E54D3C" class="icon"><i
                                class="fas fa-trash"></i></span>
                        <span class="name">Trash</span>
                    </a>
                    <a href="" class="box" data-id="{{ $data->BlogId }}">
                        <span style="background-color: #6C75FF; font-size: 0.9rem" class="icon"><i
                                class="far fa-ellipsis-h"></i></span>
                        <span class="name">More</span>
                    </a>

                </div>
            </div>


        @endforeach

    </div>


    <div class="load-more-button">
        <button data-offset="3">
            Load More
            <i class="fas fa-spinner fa-spin"></i>
        </button>
    </div>


</div>




<script>
    $(document).ready(function() {



        function reloadPage() {
            $('.page-container .content-body .content')
                .load(`/dashboard/viewFavorite`, function(data, statusTxt, xhr) {
                    $('.page-container .content-body .content').show();
                    $('.page-container .content-body .content-loader').hide();
                });
        }

        // publish button click
        $(document).on('click', '.post-container .post-list .post-card .post-action .publish-box',
            function(e) {

                e.preventDefault();
                e.stopImmediatePropagation();


                $('.page-container .content-body .content').hide();
                $('.page-container .content-body .content-loader').show();


                let id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/dashboard/viewFavorite/published') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(data) {
                        reloadPage();
                        if (data['status'] === 1) {
                            Swal.fire({
                                icon: 'success',
                                title: data['msg']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: data['error']
                            });
                        }
                    }
                });

            });


        // draft button click        
        $(document).on('click', '.post-container .post-list .post-card .post-action .draft-box',
            function(
                e) {

                e.preventDefault();
                e.stopImmediatePropagation();

                $('.page-container .content-body .content').hide();
                $('.page-container .content-body .content-loader').show();
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/dashboard/viewFavorite/draft') }}",
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(data) {


                        reloadPage();
                        if (data['status'] === 1) {
                            Swal.fire({
                                icon: 'success',
                                title: data['msg']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: data['error']
                            });
                        }
                    }
                });

            });


        // delete button click

        $(document).on('click', '.post-container .post-list .post-card .post-action .delete-box',
            function(e) {

                e.preventDefault();
                e.stopImmediatePropagation();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $('.page-container .content-body .content').hide();
                        $('.page-container .content-body .content-loader').show();

                        let id = $(this).data('id');

                        $.ajax({
                            url: "{{ url('/dashboard/viewFavorite/delete') }}",
                            type: 'post',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(data) {
                                reloadPage();
                                if (data['status'] === 1) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data['msg']
                                    });
                                } //
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: data['error']
                                    });
                                }
                            }
                        });


                    }
                })



            });




        // ================== load more data =========================

        function loadMorePost(offset, limit, element) {

            $.ajax({
                url: "{{ url('/dashboard/viewFavorite/loadMore') }}",
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    limit: limit
                },
                success: function(data) {

                    $(element).attr('disabled', false);

                    if (data['status'] === 1) {

                        offset = offset + limit;
                        $('.post-container .load-more-button button').data('offset', offset);

                        // append data to post list
                        $('.post-container .post-list').append(data['postData']);


                    } //
                    else if (data['status'] === 2) {
                        $(element).text('No Record Found');
                        $(element).attr('disabled', true);
                        setInterval(() => {
                            $(element).fadeOut();
                        }, 2000);
                    } //
                    else {
                        console.error("Something Wan't Wrong!! Please Try Again");
                    }

                }
            });

        }


        $('.post-container .load-more-button button').click(function(e) {

            e.preventDefault();

            let offset = $(this).data('offset');
            let limit = 3;

            $(this).attr('disabled', true);

            loadMorePost(offset, limit, this);
        });


    });
</script>
