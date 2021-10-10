<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Articles</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

</head>

<body>

    <div class="dashboard-body">

        <x-sidebar />

        <div class="content">

            <div class="search-article-form">

                <form action="/admin/articles/search" method="get">

                    <input type="text" style="flex: 1;margin-right: 30px;" placeholder="Search Content" name="search"
                        required>

                    <button type="submit">Search</button>

                </form>

            </div>

            <div class="article-body">


                <table>

                    <thead>
                        <th>Action</th>
                        <th>ID</th>
                        <th style="min-width: 260px;">Title</th>
                        <th style="min-width: 230px;">Content</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Tags</th>
                        <th>Likes</th>
                        <th>Views</th>
                        <th>Post Date</th>
                        <th>Status</th>
                    </thead>

                    <tbody>

                        @foreach ($BlogData as $data)
                            <tr>
                                <td class="action-menu">
                                    <a style="background-color: rgb(223, 145, 0)" href="/blog/{{ $data->BlogId }}"
                                        title="View Post"><i class="far fa-eye"></i></a>
                                    <a style="background-color: green" href="#" title="Edit Post"><i
                                            class="far fa-edit"></i></a>
                                    <a style="background-color: rgb(245, 2, 2)"
                                        href="/admin/articles/delete/{{ $data->BlogId }}" class="delete-btn"
                                        title="Delete Post"><i class="far fa-trash-alt"></i></a>
                                </td>
                                <td>{{ $data->BlogId }}</td>
                                <td style="white-space: normal">{{ Str::limit($data->BlogTitle, 50) }}
                                </td>
                                <td style="white-space: normal">{{ Str::limit($data->BlogContent, 50) }}</td>
                                <td>{{ $data->CategoryName }}</td>
                                <td>{{ $data->AuthorName }}</td>
                                <td>{{ $data->BlogTags }}</td>
                                <td>{{ $data->BlogLikes }}</td>
                                <td>{{ $data->BlogViews }}</td>
                                <td>{{ $data->BlogPostDate }}</td>
                                <td>{{ $data->BlogStatus }}</td>
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


    <script>
        $(document).ready(function() {

            $('.article-body .delete-btn').click(function(e) {

                e.preventDefault();

                if (confirm("Are You Sure You Wan't To Delete This Blog")) {

                    let href = $(this).attr('href');
                    location.replace(href);

                }


            });

        });
    </script>

</body>


</html>
