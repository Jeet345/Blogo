<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class categoryController extends Controller
{
    //
    function index(Request $request)
    {

        $fetchCategory = DB::table('category')
            ->orderBy('CategoryId', 'desc')
            ->get();

        return view('/admin/category', [
            'categoryData' => $fetchCategory
        ]);
    }


    function deleteCategory(Request $request)
    {

        $catId = $request->catId;

        $deleteBlog = DB::table('category')
            ->where('CategoryId', $catId)
            ->delete();


        if ($deleteBlog) {
            return redirect()->back()->withSuccess('Category Deleted !!');
        }
    }

    function addCategory(Request $request)
    {

        $request->validate([
            'categoryName' => 'required'
        ]);

        $categoryName = $request->categoryName;

        // check already exist
        $checkExist = DB::table('category')
            ->where('CategoryName', $categoryName)
            ->get();

        if ($checkExist->isEmpty()) {

            $addCategory = DB::table('category')
                ->insert([
                    'CategoryName' => $categoryName,
                    'CategoryImage' => ''
                ]);

            if ($addCategory) {
                return redirect()->back()->withSuccess('Category Added Successfully !!');
            }
        } //
        else {
            return redirect()->back()->withSuccess('Category Already Exist !!');
        }
    }
}
