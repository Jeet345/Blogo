<div class="comment-page">

    <div class="comment-header">

    </div>

    <div class="comment-list-box">


    </div>

    <div class="load-more-button">
        <button data-offset="0">
            Load More
            <i class="fas fa-spinner fa-spin"></i>
        </button>
    </div>


</div>


<script>
    $(document).ready(function() {

        function loadMoreReq(offset, limit, element) {

            $('.comment-page .load-more-button button').attr('disabled', true);

            $.ajax({
                type: "post",
                url: "{{ url('/dashboard/viewComment/loadMore') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    limit: limit
                },
                success: function(data) {

                    $('.comment-page .load-more-button button').attr('disabled', false);

                    if (data['status'] === 1) {

                        let newOffset = offset + limit;

                        $('.comment-page .load-more-button button').data('offset', newOffset);
                        $('.comment-page .comment-list-box').append(data['data']);

                    } //
                    else if (data['status'] === 0) {

                        $(element).text('NO RECORD FOUND');
                        $(element).attr('disabled', true);
                        setInterval(() => {
                            $(element).fadeOut();
                        }, 2000);

                    } //
                    else {
                        alert("Something Wan't Wrong");
                    }

                }
            });

        }

        loadMoreReq(0, 5, null);

        $('.comment-page .load-more-button button').click(function(e) {

            e.preventDefault();

            let offset = $(this).data('offset');
            let limit = 5;

            loadMoreReq(offset, limit, this);

        });

        function reloadPage() {
            $('.page-container .content-body .content')
                .load(`/dashboard/viewComment`, function(data, statusTxt, xhr) {
                    $('.page-container .content-body .content').show();
                    $('.page-container .content-body .content-loader').hide();
                });
        }

        $(document).on('click', '.comment-page .comment-list-box .comment-card .remove-content-btn',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let id = $(this).data('id');

                function removeContentRequest() {
                    $.ajax({
                        type: "post",
                        url: "{{ url('/dashboard/viewComment/removeContent') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            if (data['status'] === 1) {
                                reloadPage();
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message']
                                });
                            } //
                            else {
                                Swal.fire({
                                    icon: 'error',
                                    title: "Something Wan't Wrong"
                                });
                            }

                        }
                    });

                }

                Swal.fire({
                    text: "Are you sure you'd like to permanently remove content of this comment?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        removeContentRequest();
                    }
                });




            });




        //spam btn click
        $(document).on('click', '.comment-page .comment-list-box .comment-card .spam-btn',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "{{ url('/dashboard/viewComment/spamComment') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(data) {
                        if (data['status'] === 1) {
                            reloadPage();
                            Swal.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: "Something Wan't Wrong"
                            });
                        }

                    }
                });

            });


        // not spam btn click
        $(document).on('click', '.comment-page .comment-list-box .comment-card .not-spam-btn',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let id = $(this).data('id');

                $.ajax({
                    type: "post",
                    url: "{{ url('/dashboard/viewComment/notSpamComment') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(data) {
                        if (data['status'] === 1) {
                            reloadPage();
                            Swal.fire({
                                icon: 'success',
                                title: data['message']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: "Something Wan't Wrong"
                            });
                        }

                    }
                });

            });


        // delete btn click
        $(document).on('click', '.comment-page .comment-list-box .comment-card .delete-btn',
            function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let id = $(this).data('id');


                function deleteCommentRequest() {
                    $.ajax({
                        type: "post",
                        url: "{{ url('/dashboard/viewComment/deleteComment') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            if (data['status'] === 1) {
                                reloadPage();
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message']
                                });
                            } //
                            else {
                                Swal.fire({
                                    icon: 'error',
                                    title: "Something Wan't Wrong"
                                });
                            }

                        }
                    });
                }

                Swal.fire({
                    text: "Are you sure you'd like to permanently delete this comment and its replies?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "No, Keep It!",
                    confirmButtonText: 'Yes, Delete It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteCommentRequest();
                    }
                })

            });



    });
</script>
