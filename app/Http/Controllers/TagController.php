<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    //

    function index(Request $request)
    {

        $tagName = $request->tagName;

        //if tag exist

        $fetchTag = DB::table('tags')
            ->where('TagName', $tagName)
            ->where('Status', '1')
            ->first();


        if ($fetchTag) {

            // fetch blog
            $fetchBlog = DB::table('blog')
                ->join('category', 'blog.BlogCategoryId', 'category.CategoryId')
                ->where('BlogTags', 'like', "%$tagName%")
                ->where('BlogStatus', '1')
                ->get();



            // fetch latest blog
            $latestBlog = DB::table('blog')
                ->where('BlogStatus', '1')
                ->limit(3)
                ->orderBy('BlogId', 'desc')
                ->get();


            if ($fetchBlog->isEmpty()) {
                return abort(404);
            } //
            else {
                return view('tagName', [
                    'tagName' => $tagName,
                    'postData' => $fetchBlog,
                    'latestBlog' => $latestBlog
                ]);
            }
        } //
        else {
            return abort(404);
        }
    }
}
