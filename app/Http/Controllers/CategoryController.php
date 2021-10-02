<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    function index(Request $request)
    {

        $category = $request->categoryName;

        $fetchPost = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.CategoryId')
            ->where('category.CategoryName', $category)
            ->where('blog.BlogStatus', '1')
            ->get();

        if (!$fetchPost->isEmpty()) {
            return view('category', [
                'postData' => $fetchPost
            ]);
        } //
        else {
            return abort(404);
        }
    }
}
