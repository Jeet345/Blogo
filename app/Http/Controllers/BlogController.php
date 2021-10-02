<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //

    function index(Request $request)
    {

        $blogId = $request->BlogId;

        $fetchBlog = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.CategoryId')
            ->join('authors', 'blog.BlogAuthorId', 'authors.AuthorId')
            ->where('BlogId', $blogId)
            ->where('BlogStatus', '1')
            ->first();

        if ($fetchBlog) {

            // update view column
            DB::table('blog')
                ->where('BlogId', $blogId)
                ->increment('BlogViews', 1);


            // fetch comment of blog
            $fetchComment = DB::table('comments')
                ->where('BlogId', $blogId)
                ->where('CommentStatus', '!=', '2')
                ->orderBy('CommentId', 'desc')
                ->get();

            if ($fetchComment->isEmpty()) {
                return view('blog', [
                    'blogData' => $fetchBlog,
                    'commentData' => false
                ]);
            } //
            else {
                return view('blog', [
                    'blogData' => $fetchBlog,
                    'commentData' => $fetchComment
                ]);
            }


            // 

        } else {
            return abort(404);
        }
    }


    function commentSubmit(Request $request)
    {

        $commentDate = date('M d Y');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }
        //
        else {

            $addComment = DB::table('comments')
                ->insert([
                    'BlogId' => $request->blogId,
                    'UserName' => $request->name,
                    'UserEmail' => $request->email,
                    'UserWebsite' => $request->website,
                    'UserComment' => $request->comment,
                    'CommentDate' => $commentDate
                ]);

            if ($addComment) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Comment Submitted'
                ]);
            }
        }
    }
}
