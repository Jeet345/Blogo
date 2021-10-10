<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    //
    function index(Request $request)
    {

        // fetch blog
        $fetchBlog = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.categoryId')
            ->join('authors', 'blog.BlogAuthorId', 'authors.AuthorId')
            ->orderBy('BlogId', 'desc')
            ->get();

        return view(
            '/admin/articles',
            [
                'BlogData' => $fetchBlog
            ]
        );
    }

    function deleteBlog(Request $request)
    {

        $blogId = $request->blogId;

        $deleteBlog = DB::table('blog')
            ->where('BlogId', $blogId)
            ->delete();


        if ($deleteBlog) {
            return redirect()->back()->withSuccess('Blog Deleted !!');
        }
    }

    function search()
    {

        if (!isset($_GET['search'])) {
            return redirect(404);
        }

        $search = $_GET['search'];

        // fetch blog
        $fetchBlog = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.categoryId')
            ->join('authors', 'blog.BlogAuthorId', 'authors.AuthorId')
            ->where('blog.BlogTitle', 'LIKE', '%' . $search . '%')
            ->orWhere('category.CategoryName', 'LIKE', '%' . $search . '%')
            ->orWhere('authors.AuthorName', 'LIKE', '%' . $search . '%')
            ->orWhere('blog.BlogTags', 'LIKE', '%' . $search . '%')
            ->orWhere('blog.BlogId', $search)
            ->orderBy('BlogId', 'desc')
            ->get();

        return view(
            '/admin/articles',
            [
                'BlogData' => $fetchBlog
            ]
        );
    }
}
