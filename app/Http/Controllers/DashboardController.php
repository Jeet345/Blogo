<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function Authorlogout(Request $request)
    {
        $request->session()->pull('author');
        return redirect('/');
    }
}
