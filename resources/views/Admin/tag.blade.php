<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Tags</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

</head>

<body>

    <div class="dashboard-body">

        <x-sidebar />

        <div class="content">

            <div class="tag-body">

                <table style="width: 100%">

                    <thead>
                        <th>Action</th>
                        <th>ID</th>
                        <th>Tag Name</th>
                        <th>Status</th>
                    </thead>

                    <tbody>

                        @foreach ($tagsData as $data)
                            <tr>
                                <td class="action-menu">
                                    <a style="background-color: green" href="#" title="Edit Post"><i
                                            class="far fa-edit"></i></a>
                                    <a style="background-color: rgb(245, 2, 2)"
                                        href="/admin/tag/delete/{{ $data->TagId }}" class="delete-btn"
                                        title="Delete Post"><i class="far fa-trash-alt"></i></a>
                                </td>
                                <td>{{ $data->TagId }}</td>
                                <td style="white-space: normal">{{ $data->TagName }}
                                </td>
                                <td>{{ $data->Status }}</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- add tags --}}

            <div class="add-tag-form">

                <form action="/admin/tag/add" method="post">

                    @csrf

                    <input type="text" placeholder="Tag Name" name="tagName" style="flex: 1;margin-right: 30px;"
                        required>

                    <button type="submit">Add Tag</button>


            </div>



        </div>

    </div>

    @if (session('success'))
        <script>
            alert(`{{ session('success') }}`);
        </script>
    @endif


    <script>
        $(document).ready(function() {

            $('.tag-body .delete-btn').click(function(e) {

                e.preventDefault();

                if (confirm("Are You Sure You Wan't To Delete This Tag")) {

                    let href = $(this).attr('href');
                    location.replace(href);

                }

            });

        });
    </script>

</body>


</html>
