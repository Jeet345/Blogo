<div class="post-container">

    <div class="post-header">

        <button class="add-button">
            <span>
                <i class="fal fa-plus"></i>
            </span>
            <h5>Add New Post</h5>
        </button>


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


                    <a href="" class="edit-box box" data-id="{{ $data->BlogId }}">
                        <span style="background-color: #1ABD9B" class="icon"><i
                                class="fas fa-pencil"></i></span>
                        <span class="name">Edit</span>
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


<div class="add-form-container">

    <div class="form-box">
        <form action="" class="add-form" method="post" enctype="multipart/form-data">
            <div class="form-header">
                <h3>Create New Post</h3>
                <div class="close-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
            <div class="input-box">

                @csrf

                <div class="input-filed">
                    <h5>Post Title :</h5>
                    <input type="text" name="title" class="title">
                    <p class="error-text">There is some error</p>
                </div>

                <div class="row">
                    <div class="input-filed">
                        <h5>Post Category :</h5>
                        <select name="category" class="category">
                            <option value="0" selected disabled>Select Category</option>
                            @foreach ($categoryData as $data)
                                <option value="{{ $data->CategoryName }}">{{ $data->CategoryName }}</option>
                            @endforeach
                        </select>
                        <p class="error-text">There is some error</p>

                    </div>

                    <div class="input-filed">
                        <h5>Post Tags :</h5>
                        <div class="check-select">
                            <h3 class="check-item">
                                <div class="text">
                                    Select Tags
                                </div>
                                <span><i class="fas fa-angle-down"></i></span>
                            </h3>
                            <ul class="drop-down">

                                @foreach ($tagData as $key => $data)

                                    <label for="check{{ $key }}">
                                        <input type="checkbox" value="{{ $data->TagName }}"
                                            id="check{{ $key }}" name="{{ $data->TagName }}">
                                        <span>{{ $data->TagName }}</span>
                                    </label>

                                @endforeach



                            </ul>
                        </div>
                    </div>

                </div>

                <div class="input-filed">
                    <h5>Post Banner Image :</h5>
                    <input type="file" id="bannerImg" name="bannerImg" style="display: none" accept=".jpg, .jpeg, .png">

                    <label for="bannerImg" class="bannerLabel">
                        <div class="fileChoose">Choose Image</div>
                        <div class="filename">
                            <div class="progress"></div>
                            No File Chosen
                        </div>
                    </label>
                    <p class="error-text">There is some error</p>

                </div>

                <div class="input-filed">
                    <h5>Post Content :</h5>
                    <textarea name="" id="editor" cols="30" rows="10"></textarea>
                    <p class="error-text">There is some error</p>

                </div>


            </div>
            <div class="form-footer">
                <div class="buttons">
                    <button class="reset-btn" type="reset">Reset</button>
                    <button class="submit-btn publish-btn" type="submit">
                        Publish
                        <i class="fas fa-spinner fa-spin"></i>
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>


<div class="update-form-container">

    <div class="form-box">
        <form action="" class="update-form" method="post" enctype="multipart/form-data">
            <div class="form-header">
                <h3>Update Post</h3>
                <div class="close-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
            <div class="input-box">

                <input type="hidden" class="blog-id" name="blogId">

                @csrf

                <div class="input-filed">
                    <h5>Post Title :</h5>
                    <input type="text" name="title" class="title">
                    <p class="error-text">There is some error</p>
                </div>

                <div class="row">
                    <div class="input-filed">
                        <h5>Post Category :</h5>
                        <select name="category" class="category">
                            <option value="0" selected disabled>Select Category</option>
                            @foreach ($categoryData as $data)
                                <option value="{{ $data->CategoryName }}">{{ $data->CategoryName }}</option>
                            @endforeach
                        </select>
                        <p class="error-text">There is some error</p>

                    </div>

                    <div class="input-filed">
                        <h5>Post Tags :</h5>
                        <div class="check-select">
                            <h3 class="check-item">
                                <div class="text">
                                    Select Tags
                                </div>
                                <span><i class="fas fa-angle-down"></i></span>
                            </h3>
                            <ul class="drop-down">

                                @foreach ($tagData as $key => $data)

                                    <label for="updateCheck{{ $key }}">
                                        <input type="checkbox" value="{{ $data->TagName }}"
                                            id="updateCheck{{ $key }}" name="{{ $data->TagName }}">
                                        <span>{{ $data->TagName }}</span>
                                    </label>

                                @endforeach



                            </ul>
                        </div>
                    </div>

                </div>

                <div class="input-filed">
                    <h5>Post Banner Image :</h5>
                    <input type="file" id="updateBannerImg" name="bannerImg" style="display: none"
                        accept=".jpg, .jpeg, .png">

                    <label for="updateBannerImg" class="bannerLabel">
                        <div class="fileChoose">Choose Image</div>
                        <div class="filename">
                            <div class="progress"></div>
                            No File Chosen
                        </div>
                    </label>
                    <p class="error-text">There is some error</p>

                </div>

                <div class="input-filed">
                    <h5>Post Content :</h5>
                    <textarea name="" id="update-editor" cols="30" rows="10"></textarea>
                    <p class="error-text">There is some error</p>

                </div>


            </div>
            <div class="form-footer">
                <div class="buttons">
                    <button class="reset-btn" type="reset">Reset</button>
                    <button class="submit-btn update-btn" type="submit">
                        Update
                        <i class="fas fa-spinner fa-spin"></i>
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>




<script>
    CKEDITOR.replace("editor"); // add ckeditor
    CKEDITOR.replace("update-editor"); // add ckeditor


    $(document).ready(function() {


        function reloadPage() {
            $('.page-container .content-body .content')
                .load(`/dashboard/viewPost`, function(data, statusTxt, xhr) {
                    console.log('load');
                    $('.page-container .content-body .content').show();
                    $('.page-container .content-body .content-loader').hide();

                });
        }

        function resetform() {
            $('.update-form-container .form-box form')[0].reset();
            CKEDITOR.instances['update-editor'].setData('');
            $('.update-form-container .form-box form input[type=checkbox]')
                .attr('checked', false);
            $('.update-form-container .form-box form .input-filed .check-select .check-item .text')
                .text('Select Tags');
            $('.update-form-container .form-box form .bannerLabel').find('.filename').text('No File Chosen');
        }


        //  toggle add post container

        $('.post-container .post-header .add-button').click(function() {

            $('.add-form-container').show('fade', 200);
            $('.content-body').css("overflow", "hidden");


        });

        $('.form-box .form-header .close-btn').click(function() {
            $('.add-form-container').hide('fade', 200);
            $('.content-body').css("overflow", "auto");
        });
        $('.update-form-container .form-box .form-header .close-btn').click(function() {
            $('.update-form-container').hide('fade', 200);
            $('.content-body').css("overflow", "auto");

            resetform();
        });



        // checkbox dropdown show hide
        $('.form-box .input-filed .check-select').click(function() {
            $(this).find('.drop-down').show('blind', 80);
            $(this).css({
                'borderColor': 'black'
            });
        });

        $(document).mouseup(function(e) {
            var container = $(".form-box .input-filed .check-select");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(container).find('.drop-down').hide();
                $(container).css({
                    'borderColor': '#c4c4c4'
                });
            }
        });




        // custom tag checkbox dropdown

        var checkData = '';

        $('.add-form-container form .input-filed .check-select .drop-down input').change(function() {

            checkData = '';
            var checkboxValue;
            var checkedLength =
                $('.add-form-container form .input-filed .check-select .drop-down input:checked')
                .length;

            $('.add-form-container form .input-filed .check-select .drop-down input:checked')
                .each(function(index, element) {

                    var itemText = $('.add-form-container form .check-item .text');

                    if (checkedLength == (index + 1)) {
                        checkboxValue = this.value;
                        checkData = checkData + checkboxValue;
                    } //
                    else {
                        checkboxValue = this.value;
                        checkData = checkData + checkboxValue + ', ';
                    }

                    itemText.text(checkData);

                });

            if (checkedLength <= 0) {
                $('.add-form-container form .input-filed .check-select .check-item .text')
                    .text('Select Tags');
            }


            var checkedtext = $(
                '.add-form-container form .input-filed .check-select .check-item .text');
            var trimData;

            if (checkedtext.text().length > 41) {
                trimData = checkedtext.text().substring(0, 41) + '...';
                checkedtext.text(trimData);
            }


        });


        // image upload
        $('.add-form-container .form-box .input-filed #bannerImg').change(function() {

            var imgFile = $('.add-form-container .form-box .input-filed #bannerImg')[0].files[0];

            if (imgFile) {
                $('.add-form-container .form-box .input-filed .bannerLabel .filename')
                    .text(imgFile.name);
            } //
            else {
                $('.add-form-container .form-box .input-filed .bannerLabel .filename')
                    .text('No File Chosen');
            }

        });


        // form submit
        $('.add-form-container .form-box form').submit(function(e) {

            e.preventDefault();


            // validate input
            let title = $(this).find('.title');
            let category = $(this).find('.category');
            let bannerImg = $('.add-form-container .form-box .input-filed #bannerImg')[0].files[0];
            let bannerLabel = $(this).find('.bannerLabel');
            let errorText = $(this).find('.error-text');
            let content = CKEDITOR.instances['editor'].getData();

            let error = false;

            errorText.hide();
            $(this).find('input, select, .bannerLabel').css({
                borderColor: '#c4c4c4'
            })

            // title validation
            if (title.val() == '') {
                error = true;
                title.css({
                    borderColor: 'red'
                });
                title.parents('.input-filed').find('.error-text').text('Title Filed Is Required.');
                title.parents('.input-filed').find('.error-text').show('shake');
            }

            // category validation
            if (category.val() == null) {
                error = true;
                category.css({
                    borderColor: 'red'
                });
                category.parents('.input-filed').find('.error-text')
                    .text('Category Filed Is Required.');
                category.parents('.input-filed').find('.error-text').show('shake');
            }

            // banner image validation
            if (!bannerImg) {
                error = true;
                bannerLabel.css({
                    borderColor: 'red'
                });
                bannerLabel.parents('.input-filed').find('.error-text')
                    .text('Banner Image Is Required.');
                bannerLabel.parents('.input-filed').find('.error-text').show('shake');
            } //
            else {
                var ext = bannerImg['type'].split('/').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    error = true;
                    bannerLabel.css({
                        borderColor: 'red'
                    });
                    bannerLabel.parents('.input-filed').find('.error-text')
                        .text('Please Upload png, jpg or jpeg Files');
                    bannerLabel.parents('.input-filed').find('.error-text').show('shake');
                }
            }

            // post content validation
            if (content == '') {
                error = true;
                let editor = $('#editor');
                editor.parents('.input-filed').find('.error-text')
                    .text('Post Content Is Required.');
                editor.parents('.input-filed').find('.error-text').show('fade');
            }

            // let checkdata in ajax for tags

            var formData = new FormData($(this)[0]);
            var tags = checkData;

            formData.append('tags', tags);
            formData.append('content', content);


            if (!error) {

                $(this).find('.submit-btn').attr('disabled', true);

                $('.page-container .content-body .content').hide();
                $('.page-container .content-body .content-loader').show();

                $.ajax({
                    url: "{{ '/dashboard/viewPost/addPost' }}",
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {

                        reloadPage();

                        $('.add-form-container .form-box form').find('.submit-btn')
                            .attr('disabled', false);

                        if (data['status'] == 1) {

                            // reset form
                            $('.add-form-container .form-box form')[0].reset();
                            CKEDITOR.instances['editor'].setData('');
                            $('.add-form-container .form-box .input-filed .check-select .check-item input')
                                .attr('checked', false);
                            $('.add-form-container .form-box .input-filed .check-select .check-item .text')
                                .text('Select Tags');
                            bannerLabel.find('.filename').text('No File Chosen');

                            $('.add-form-container').hide('fade', 200);
                            $('.content-body').css("overflow", "auto");

                            Swal.fire({
                                icon: 'success',
                                title: data['msg']
                            });
                        } //
                        else if (data['status'] == 0) {
                            Swal.fire({
                                icon: 'error',
                                title: data['error']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: "Someething Wan't Wrong"
                            });
                        }
                    }
                });
            } //
            else {
                $(".add-form-container .form-box").animate({
                    scrollTop: 0
                }, "fast");

            }


        });


        // publish button click
        $(document).on('click', '.post-container .post-list .post-card .post-action .publish-box',
            function(e) {

                e.preventDefault();
                e.stopImmediatePropagation();


                $('.page-container .content-body .content').hide();
                $('.page-container .content-body .content-loader').show();


                let id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/dashboard/viewPost/published') }}",
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
                    url: "{{ url('/dashboard/viewPost/draft') }}",
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
                            url: "{{ url('/dashboard/viewPost/delete') }}",
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




        // ================== update =========================


        // custom drop down change(tags)
        var updateCheckData = '';

        $(document).on('change', '.update-form-container form .input-filed .check-select .drop-down input',
            function() {

                updateCheckData = '';
                var checkboxValue;
                var checkedLength =
                    $('.update-form-container form .input-filed .check-select .drop-down input:checked')
                    .length;

                $('.update-form-container form .input-filed .check-select .drop-down input:checked')
                    .each(function(index, element) {

                        var itemText = $('.update-form-container form .check-item .text');

                        if (checkedLength == (index + 1)) {
                            checkboxValue = this.value;
                            updateCheckData = updateCheckData + checkboxValue;
                        } //
                        else {
                            checkboxValue = this.value;
                            updateCheckData = updateCheckData + checkboxValue + ', ';
                        }

                        itemText.text(updateCheckData);

                    });

                if (checkedLength <= 0) {
                    $('.update-form-container form .input-filed .check-select .check-item .text')
                        .text('Select Tags');
                }


                var checkedtext = $(
                    '.update-form-container form .input-filed .check-select .check-item .text');
                var trimData;

                if (checkedtext.text().length > 41) {
                    trimData = checkedtext.text().substring(0, 41) + '...';
                    checkedtext.text(trimData);
                }


            });



        // edit btn click
        $(document).on('click', '.post-container .post-list .post-card .post-action .edit-box', function(e) {

            e.preventDefault();

            let id = $(this).data('id');

            $('.update-form-container').show('fade', 200);
            $('.content-body').scrollTop(0);
            $('.content-body').css("overflow", "hidden");

            // load blog data in form
            $.ajax({
                url: "{{ url('/dashboard/viewPost/loadUpdate') }}",
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    if (data['status'] === 1) {

                        const post = data['post'][0];
                        const tags = post['BlogTags'].split(',');

                        $('.update-form-container form').find('.title')
                            .val(post['BlogTitle']);

                        $('.update-form-container form').find('.category')
                            .val(post['CategoryName']);

                        tags.forEach(function(item) {
                            $(`.update-form-container form input[name=${item}]`)
                                .attr('checked', true);
                        });

                        $('.update-form-container form .check-item .text')
                            .text(post['BlogTags']);


                        $('.update-form-container form .blog-id').val(post['BlogId']);

                        updateCheckData = post['BlogTags'];


                        CKEDITOR.instances['update-editor'].setData(post['BlogContent']);


                    } //
                    else {
                        alert(data['error']);
                    }
                }
            })


        });

        $(document).on('change', '.update-form-container .form-box .input-filed #updateBannerImg', function() {

            var imgFile = $('.update-form-container .form-box .input-filed #updateBannerImg')[0].files[
                0];

            if (imgFile) {
                $('.update-form-container .form-box .input-filed .bannerLabel .filename')
                    .text(imgFile.name);
            } //
            else {
                $('.update-form-container .form-box .input-filed .bannerLabel .filename')
                    .text('No File Chosen');
            }

        });



        $('.update-form-container .form-box form').submit(function(e) {


            e.preventDefault();

            // validate input
            let title = $(this).find('.title');
            let category = $(this).find('.category');
            let bannerImg = $('.update-form-container .form-box .input-filed #updateBannerImg')[0]
                .files[0];
            let bannerLabel = $(this).find('.bannerLabel');
            let errorText = $(this).find('.error-text');
            let content = CKEDITOR.instances['update-editor'].getData();

            let error = false;

            errorText.hide();
            $(this).find('input, select, .bannerLabel').css({
                borderColor: '#c4c4c4'
            })

            // title validation
            if (title.val() == '') {
                error = true;
                title.css({
                    borderColor: 'red'
                });
                title.parents('.input-filed').find('.error-text').text('Title Filed Is Required.');
                title.parents('.input-filed').find('.error-text').show('shake');
            }

            // category validation
            if (category.val() == null) {
                error = true;
                category.css({
                    borderColor: 'red'
                });
                category.parents('.input-filed').find('.error-text')
                    .text('Category Filed Is Required.');
                category.parents('.input-filed').find('.error-text').show('shake');
            }

            // banner image validation
            if (bannerImg) {
                var ext = bannerImg['type'].split('/').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    error = true;
                    bannerLabel.css({
                        borderColor: 'red'
                    });
                    bannerLabel.parents('.input-filed').find('.error-text')
                        .text('Please Upload png, jpg or jpeg Files');
                    bannerLabel.parents('.input-filed').find('.error-text').show('shake');
                }
            }

            // post content validation
            if (content == '') {
                error = true;
                let editor = $('#update-editor');
                editor.parents('.input-filed').find('.error-text')
                    .text('Post Content Is Required.');
                editor.parents('.input-filed').find('.error-text').show('fade');
            }

            // let checkdata in ajax for tags

            var formData = new FormData($(this)[0]);
            var tags = updateCheckData;

            formData.append('tags', tags);
            formData.append('content', content);


            if (!error) {

                $(this).find('.submit-btn').attr('disabled', true);

                $('.page-container .content-body .content').hide();
                $('.page-container .content-body .content-loader').show();


                $.ajax({
                    url: "{{ '/dashboard/viewPost/updatePost' }}",
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {

                        reloadPage();

                        $('.update-form-container .form-box form').find('.submit-btn')
                            .attr('disabled', false);

                        if (data['status'] == 1) {

                            // reset form
                            resetform();

                            $('.update-form-container').hide('fade', 200);
                            $('.content-body').css("overflow", "auto");

                            Swal.fire({
                                icon: 'success',
                                title: data['msg']
                            });
                        } //
                        else if (data['status'] == 0) {
                            Swal.fire({
                                icon: 'error',
                                title: data['error']
                            });
                        } //
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: data
                            });
                        }

                    }
                });
            } //
            else {
                $(".add-form-container .form-box").animate({
                    scrollTop: 0
                }, "fast");

            }


        });










        // ================== load more data =========================

        function loadMorePost(offset, limit, element) {

            $.ajax({
                url: "{{ url('/dashboard/viewPost/loadMore') }}",
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
