<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function loadAjaxView(Request $request)
    {

        if ($request->ajax()) {

            $ajaxView = $request->ajaxPage;

            // check view is exist or not
            if (view()->exists('Author/' . $ajaxView)) {
                return view('Author/' . $ajaxView);
            } //
            else {
                return abort(404);
            }
        } //
        else {
            return view('Author/dashboard');
        }
    }

    function Authorlogout(Request $request)
    {
        $request->session()->pull('author');
        return redirect('/');
    }
}
