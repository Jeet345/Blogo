<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class authorController extends Controller
{
    //
    function index()
    {

        $fetchAuthor = DB::table('authors')
            ->orderBy('AuthorId', 'desc')
            ->get();

        return view('Admin/author', [
            'authorData' => $fetchAuthor
        ]);
    }
}
