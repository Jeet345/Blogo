<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Category</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

</head>

<body>

    <div class="dashboard-body">

        <x-sidebar />

        <div class="content">

            <div class="category-body">

                <table style="width: 100%">

                    <thead>
                        <th>Action</th>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Status</th>
                    </thead>

                    <tbody>

                        @foreach ($categoryData as $data)
                            <tr>
                                <td class="action-menu">

                                    <a style="background-color: green" href="#" title="Edit Post"><i
                                            class="far fa-edit"></i></a>
                                    <a style="background-color: rgb(245, 2, 2)"
                                        href="/admin/category/delete/{{ $data->CategoryId }}" class="delete-btn"
                                        title="Delete Post"><i class="far fa-trash-alt"></i></a>
                                </td>
                                <td>{{ $data->CategoryId }}</td>
                                <td style="white-space: normal">{{ $data->CategoryName }}
                                </td>
                                <td style="white-space: normal">{{ $data->CategoryImage }}</td>
                                <td>{{ $data->CategoryStatus }}</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- add category --}}

            <div class="add-category-form">

                <form action="/admin/category/add" method="post">

                    @csrf

                    <input type="text" placeholder="Category Name" name="categoryName" required>

                    <input type="file" name="image" id="categoryImg" style="display: none">
                    <label for="categoryImg">Category Image</label>

                    <button type="submit">Add Category</button>

                </form>

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

            $('.category-body .delete-btn').click(function(e) {

                e.preventDefault();

                if (confirm("Are You Sure You Wan't To Delete This Category")) {

                    let href = $(this).attr('href');
                    location.replace(href);

                }

            });

        });
    </script>

</body>


</html>
