<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class indexController extends Controller
{
    //
    function index(Request $request)
    {
        if ($request->session()->has('admin')) {
            return view('Admin/dashboard');
        } //
        else {
            return view('Admin/login');
        }
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check email is exist or not
        $checkEmail = DB::table('admin')
            ->where('AdminEmail', $request->email)
            ->first();

        if ($checkEmail) {

            // verify hash password
            $hashPassword = $checkEmail->AdminPassword;

            if (Hash::check($request->password, $hashPassword)) {

                $request->session()->put('admin', $checkEmail->AdminId);
                return redirect('/admin');
            } //
            else {
                $request->session()->flash('error', 2);
                return back();
            }
        } //
        else {
            $request->session()->flash('error', 1);
            return back();
        }
    }
}
