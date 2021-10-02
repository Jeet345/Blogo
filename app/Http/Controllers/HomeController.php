<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function fetchBlogData(Request $request)
    {

        $bannerData = DB::table('blog')
            ->where('BlogStatus', '1')
            ->join('category', 'blog.BlogCategoryId', '=', 'category.CategoryId')
            ->limit(6)
            ->get();


        $trendData = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', '=', 'category.CategoryId')
            ->where('BlogStatus', '1')
            ->where('CategoryName', '=', 'trends')
            ->orWhere('CategoryName', '=', 'news')
            ->limit(2)
            ->get();

        $gadgetData = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', '=', 'category.CategoryId')
            ->where('BlogStatus', '1')
            ->where('CategoryName', '=', 'gadgets')
            ->limit(6)
            ->get();

        return view(
            'home',
            [
                'bannerData' => $bannerData,
                'trendData' => $trendData,
                'gadgetData' => $gadgetData
            ]
        );
    }
}
