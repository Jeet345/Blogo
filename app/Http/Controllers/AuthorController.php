<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    //
    function index(Request $request)
    {
        $authorId = $request->authorId;

        $fetchAuthor = DB::table('authors')
            ->where('AuthorStatus', '2')
            ->where('AuthorId', $authorId)
            ->first();


        // fetch author blogs
        $fetchBlog = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.CategoryId')
            ->where('BlogStatus', '1')
            ->where('BlogAuthorId', $authorId)
            ->orderBy('BlogId', 'desc')
            ->get();


        if ($fetchAuthor) {

            if ($fetchBlog->isEmpty()) {
                return view('authorName', [
                    'authorData' => $fetchAuthor,
                    'message' => 'Blog Not Available.'
                ]);
            } //
            else {
                return view('authorName', [
                    'authorData' => $fetchAuthor,
                    'postData' => $fetchBlog
                ]);
            }
        } //
        else {
            return abort(404);
        }
    }
}
