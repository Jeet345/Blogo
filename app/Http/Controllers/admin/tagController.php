<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tagController extends Controller
{
    //
    function index()
    {
        $fetchTags = DB::table('tags')
            ->orderBy('TagId', 'desc')
            ->get();

        return view('admin/tag', [
            'tagsData' => $fetchTags
        ]);
    }

    function deleteTag(Request $request)
    {
        $tagId = $request->tagId;

        $deleteTag = DB::table('tags')
            ->where('TagId', $tagId)
            ->delete();


        if ($deleteTag) {
            return redirect()->back()->withSuccess('Tag Deleted !!');
        }
    }

    function addTag(Request $request)
    {

        $request->validate([
            'tagName' => 'required'
        ]);

        $tagName = $request->tagName;

        // check already exist
        $checkExist = DB::table('tags')
            ->where('TagName', $tagName)
            ->get();

        if ($checkExist->isEmpty()) {

            $addTag = DB::table('tags')
                ->insert([
                    'TagName' => $tagName
                ]);

            if ($addTag) {
                return redirect()->back()->withSuccess('Tag Added Successfully !!');
            }
        } //
        else {
            return redirect()->back()->withSuccess('Tag Already Exist !!');
        }
    }
}
