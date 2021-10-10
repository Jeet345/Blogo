<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Authors</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

</head>

<body>

    <div class="dashboard-body">

        <x-sidebar />

        <div class="content">

            <div class="author-body">

                <table style="width: 100%">

                    <thead>
                        <th>Action</th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>City</th>
                        <th>Country</th>
                        <th style="min-width: 210px">Bio</th>
                        <th>Image</th>
                        <th>Token</th>
                        <th>Status</th>
                    </thead>

                    <tbody>

                        @foreach ($authorData as $data)
                            <tr>
                                <td class="action-menu">
                                    <a style="background-color: rgb(223, 145, 0)" href="/author/{{ $data->AuthorId }}"
                                        title="View Author"><i class="far fa-eye"></i></a>
                                    <a style="background-color: green" href="#" title="Edit Post"><i
                                            class="far fa-edit"></i></a>
                                    <a style="background-color: rgb(245, 2, 2)"
                                        href="/admin/tag/delete/{{ $data->AuthorId }}" class="delete-btn"
                                        title="Delete Post"><i class="far fa-trash-alt"></i></a>
                                </td>
                                <td>{{ $data->AuthorId }}</td>
                                <td style="white-space: normal">{{ $data->AuthorEmail }}</td>
                                <td>{{ $data->AuthorName }}</td>
                                <td style="white-space: normal">{{ $data->AuthorFacebook }}</td>
                                <td style="white-space: normal">{{ $data->AuthorTwitter }}</td>
                                <td>{{ $data->AuthorCity }}</td>
                                <td>{{ $data->AuthorCountry }}</td>
                                <td style="white-space: normal">{{ Str::limit($data->AuthorBio, 70) }}</td>
                                <td>{{ $data->AuthorImage }}</td>
                                <td>{{ $data->AuthorToken }}</td>
                                <td style="font-weight: 500">
                                    <?php
                                    
                                    if ($data->AuthorStatus == '2') {
                                        echo '<span style="color: rgb(3, 167, 3)">Verified Author<i style="margin-left: 7px;font-size: .8rem" class="fas fa-check-circle"></i></span>';
                                    }
                                    //
                                    elseif ($data->AuthorStatus == '1') {
                                        echo '<span style="color: rgb(3, 167, 3)">Author</span>';
                                    }
                                    //
                                    elseif ($data->AuthorStatus == '-1') {
                                        echo '<span style="color: red">Blocked</span>';
                                    }
                                    //
                                    else {
                                        echo '<span>Email Not Verified</span>';
                                    }
                                    
                                    ?>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        </div>

    </div>

    @if (session('success'))
        <script>
            alert(`{{ session('success') }}`);
        </script>
    @endif



</body>


</html>
