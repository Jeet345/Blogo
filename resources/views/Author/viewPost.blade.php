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
                    <i class="fas fa-print"></i>
                </div>
                <h5>Published</h5>
                <h4 class="count">
                    07
                </h4>
            </div>

            <div class="box">
                <div class="icon">
                    <i class="fas fa-exclamation"></i>
                </div>
                <h5>Pending</h5>
                <h4 class="count">
                    02
                </h4>
            </div>
        </div>

    </div>

    <div class="post-list">
        <div class="post-card">
            <div class="post-img">
                <img src="{{ asset('assets/images/ballone.jpg') }}" title="image" alt="">
            </div>
            <div class="post-desc">

                <a class="title" href="">Get Help as soon as your exit system</a>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus expedita excepturi voluptatibus
                    dolore fugiat vitae ea amet minus recusandae, ipsa, alias facilis quae ratione ex adipisci iste
                    sequi, quis nisi.
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
                            13
                        </div>
                    </li>

                    <li>
                        <h4 class="post-time">10 minutes Ago</h4>
                    </li>

                </div>
            </div>
            <div class="post-action">
                <a href="" class="box">
                    <span style="background-color: #9B5AB6; font-size: 0.7rem " class="icon"><i
                            class="fab fa-telegram-plane"></i></span>
                    <span class="name">Publish</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #1ABD9B" class="icon"><i class="fas fa-pencil"></i></span>
                    <span class="name">Edit</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #2980B9" class="icon"><i class="fas fa-eye"></i></span>
                    <span class="name">View</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #E54D3C" class="icon"><i class="fas fa-trash"></i></span>
                    <span class="name">Trash</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #6C75FF; font-size: 0.9rem" class="icon"><i
                            class="far fa-ellipsis-h"></i></span>
                    <span class="name">More</span>
                </a>
            </div>
        </div>

        <div class="post-card">
            <div class="post-img">
                <img src="{{ asset('assets/images/ballone.jpg') }}" title="image" alt="">
            </div>
            <div class="post-desc">

                <a class="title" href="">Get Help as soon as your exit system</a>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus expedita excepturi voluptatibus
                    dolore fugiat vitae ea amet minus recusandae, ipsa, alias facilis quae ratione ex adipisci iste
                    sequi, quis nisi.
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
                            13
                        </div>
                    </li>

                    <li>
                        <h4 class="post-time">10 minutes Ago</h4>
                    </li>

                </div>
            </div>
            <div class="post-action">
                <a href="" class="box">
                    <span style="background-color: #9B5AB6; font-size: 0.7rem " class="icon"><i
                            class="fab fa-telegram-plane"></i></span>
                    <span class="name">Publish</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #1ABD9B" class="icon"><i class="fas fa-pencil"></i></span>
                    <span class="name">Edit</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #2980B9" class="icon"><i class="fas fa-eye"></i></span>
                    <span class="name">View</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #E54D3C" class="icon"><i class="fas fa-trash"></i></span>
                    <span class="name">Trash</span>
                </a>
                <a href="" class="box">
                    <span style="background-color: #6C75FF; font-size: 0.9rem" class="icon"><i
                            class="far fa-ellipsis-h"></i></span>
                    <span class="name">More</span>
                </a>
            </div>
        </div>
    </div>

</div>


<div class="add-form-container">

    <div class="form-box">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-header">
                <h3>Create New Post</h3>
                <div class="close-btn">
                    <i class="far fa-times"></i>
                </div>
            </div>
            <div class="input-box">


                <div class="input-filed">
                    <h5>Post Title :</h5>
                    <input type="text" name="title">
                </div>

                <div class="row">
                    <div class="input-filed">
                        <h5>Post Category :</h5>
                        <select name="category">
                            <option value="0" selected disabled>Select Category</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                            <option value="option1">option1</option>
                        </select>
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
                                <label for="check1">
                                    <input type="checkbox" value="Checkbox1" id="check1" name="check1">
                                    <span>Checkbox1</span>
                                </label>
                                <label for="check2">
                                    <input type="checkbox" id="check2" value="Checkbox2" name="check2">
                                    <span>Checkbox2</span>
                                </label>
                                <label for="check3">
                                    <input type="checkbox" id="check3" value="Checkbox3" name="check3">
                                    <span>Checkbox3</span>
                                </label>
                                <label for="check4">
                                    <input type="checkbox" id="check4" value="Checkbox4" name="check4">
                                    <span>Checkbox4</span>
                                </label>
                                <label for="check5">
                                    <input type="checkbox" id="check5" value="Checkbox5" name="check5">
                                    <span>Checkbox5</span>
                                </label>
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
                </div>

                <div class="input-filed">
                    <h5>Post Content :</h5>
                    <textarea name="" id="editor" cols="30" rows="10"></textarea>
                </div>


            </div>
            <div class="form-footer">
                <div class="buttons">
                    <button class="reset-btn" type="reset">Reset</button>
                    <button class="submit-btn" type="submit">Publish</button>
                </div>
            </div>

        </form>

    </div>

</div>


<script>
    CKEDITOR.replace("editor"); // add ckeditor


    $(document).ready(function() {



        //  toggle add post container

        $('.post-container .post-header .add-button').click(function() {
            $('.add-form-container').show('fade', 200);
        });
        $(document).mouseup(function(e) {
            var container = $(".add-form-container .form-box");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.add-form-container').hide('fade', 200);
            }
        });
        $('.add-form-container .form-box .form-header .close-btn').click(function() {
            $('.add-form-container').hide('fade', 200);
        });



        $('.add-form-container .form-box .input-filed .check-select').click(function() {
            $(this).find('.drop-down').show('blind', 80);
            $(this).css({
                'borderColor': 'black'
            });
        });

        $(document).mouseup(function(e) {
            var container = $(".add-form-container .form-box .input-filed .check-select");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(container).find('.drop-down').hide();
                $(container).css({
                    'borderColor': '#c4c4c4'
                });
            }
        });




        // custom tag checkbox dropdown
        var checkData = '';

        $('.add-form-container .form-box .input-filed .check-select .drop-down input').change(function() {

            checkData = '';
            var checkboxValue;
            var checkedLength =
                $('.add-form-container .form-box .input-filed .check-select .drop-down input:checked')
                .length;

            $('.add-form-container .form-box .input-filed .check-select .drop-down input:checked')
                .each(function(index, element) {

                    var itemText =
                        $(
                            '.add-form-container .form-box .input-filed .check-select .check-item .text'
                        );

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
                $('.add-form-container .form-box .input-filed .check-select .check-item .text')
                    .text('Select Tags');
            }




            var checkedtext = $(
                '.add-form-container .form-box .input-filed .check-select .check-item .text');
            var trimData;

            if (checkedtext.text().length > 41) {
                trimData = checkedtext.text().substring(0, 41) + '...';
                checkedtext.text(trimData);
            }



            if (checkedtext.text().length > 41) {

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


        $('.add-form-container .form-box form').submit(function(e) {
            e.preventDefault();

            // let checkdata in ajax for tags

            var content = CKEDITOR.instances['editor'].getData();

            alert(content);
        });


    });
</script>
