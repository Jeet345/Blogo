<div class="setting-page">
    <form action="" method="post">

        <div class="profile-box">
            <div class="img">
                <label for="profile-img">
                    @isset($AuthorData->AuthorImage)
                        <img src="{{ asset('assets/images/uploadImage/authorImage/' . $AuthorData->AuthorImage . '') }}"
                            alt="">
                    @else
                        <img src="{{ asset('assets/images/usericon2.png') }}" alt="">
                    @endisset
                </label>
                <input id="profile-img" type="file" name="profileImg" accept=".jpg,.jpeg,.png" style="display: none">
            </div>
            <div class="profile">
                <h2 class="name">{{ $AuthorData->AuthorName }}</h2>
                <h4>
                    <span class="city">{{ $AuthorData->AuthorCity }}</span>
                    @isset($AuthorData->AuthorCountry)
                        ,
                        <span class="country">{{ $AuthorData->AuthorCountry }}</span>
                    @endisset
                </h4>
            </div>
        </div>

        <div class="input-container">

            <div class="input-box">

                @csrf

                <div class="input-filed">
                    <h4>Full Name</h4>
                    <input type="text" name="name" value="{{ $AuthorData->AuthorName }}" required>
                </div>
                <div class="input-filed">
                    <h4>Email Address</h4>
                    <input type="email" name="email" value="{{ $AuthorData->AuthorEmail }}" required>
                </div>
                <div class="input-filed">
                    <h4>City</h4>
                    <input type="text" name="city" value="{{ $AuthorData->AuthorCity }}" required>
                </div>
                <div class="input-filed">
                    <h4>Country</h4>
                    <input type="text" name="country" value="{{ $AuthorData->AuthorCountry }}" required>
                </div>
                <div class="input-filed">
                    <h4>Facebook</h4>
                    <input type="url" name="facebook" value="{{ $AuthorData->AuthorFacebook }}">
                </div>
                <div class="input-filed">
                    <h4>Twitter</h4>
                    <input type="url" name="twitter" value="{{ $AuthorData->AuthorTwitter }}">
                </div>
                <div class="input-filed">
                    <h4>Author Bio</h4>
                    <textarea name="bio">{{ $AuthorData->AuthorBio }}</textarea>
                </div>

            </div>

            <center>
                <button type="submit" class="submit-btn">
                    Save Changes
                    <i class="fas fa-spinner fa-spin"></i>
                </button>
            </center>

        </div>

    </form>

</div>


<script>
    $(document).ready(function() {
        $('.setting-page form').submit(function(e) {

            e.preventDefault();

            var form = $(this);
            var authorId = {{ $AuthorData->AuthorId }};
            var formData = new FormData($(this)[0]);

            formData.append('id', authorId);

            form.find('.submit-btn').attr('disabled', true);

            function reloadPage() {
                $('.page-container .content-body .content')
                    .load(`/dashboard/viewSetting`, function(data, statusTxt, xhr) {
                        $('.page-container .content-body .content').show();
                        $('.page-container .content-body .content-loader').hide();
                    });
            }


            $.ajax({
                url: "{{ '/dashboard/viewSetting/submitForm' }}",
                type: 'post',
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {

                    reloadPage();

                    form.find('.submit-btn').attr('disabled', false)

                    if (data['status'] === 1) {
                        Swal.fire({
                            icon: 'success',
                            title: data['message'],
                        });
                    } //
                    else if (data['status'] === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: data['message'],
                        })
                    } //
                    else if (data['status'] === -1) {

                        let error = '';

                        $.each(data['error'], function(name, error) {

                            Swal.fire({
                                icon: 'error',
                                text: error
                            });

                        });

                    } //
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: "Something Wan't Wrong",
                        });
                    }

                }
            });

        });

        $('.setting-page form .profile-box #profile-img').change(function(e) {

            var file = e.target.files[0];

            if (file) {

                // create temp url using createObjectURL function
                var url = URL.createObjectURL(file);
                $('.setting-page form .profile-box .img img').attr('src', url);

            } //
            else {

                $('.setting-page form .profile-box .img img')
                    .attr('src', "{{ asset('assets/images/usericon2.png') }}");

            }

        });
    });
</script>
