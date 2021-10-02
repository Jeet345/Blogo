<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //
    function loginSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }
        // 
        else {

            // check email is exist or not
            $fetchEmail = DB::table('authors')
                ->where('AuthorEmail', '=', $request->email)
                ->first();

            if ($fetchEmail) {

                // verify password
                if (Hash::check($request->password, $fetchEmail->AuthorPassword)) {
                    if ($fetchEmail->AuthorStatus === 1 || $fetchEmail->AuthorStatus === 2) {

                        $request->session()->put('author', $fetchEmail->AuthorId);

                        return response()->json([
                            'status' => 1,
                            'message' => 'Login Successfully'
                        ]);
                    } //
                    else if ($fetchEmail->AuthorStatus === 0) {
                        return response()->json([
                            'status' => 2,
                            'message' => 'Please Verify Your Account'
                        ]);
                    } //
                    else {
                        return response()->json([
                            'status' => 2,
                            'message' => 'Your Account Is Blocked By Admin'
                        ]);
                    }
                } //
                else {
                    return response()->json([
                        'status' => 2,
                        'message' => 'Password Wrong'
                    ]);
                }
            }
            //
            else {
                return response()->json([
                    'status' => 2,
                    'message' => 'Account Is Not Exist'
                ]);
            }
        }
    }

    function registerRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:20',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }
        // 
        else {


            // check if email is exist or not
            $checkEmail = DB::table('authors')
                ->where('AuthorEmail', $request->email)
                ->first();

            if ($checkEmail) {
                return response()->json([
                    'status' => 2,
                    'msg' => 'Email Already Exist'
                ]);
            }
            //
            else {

                $authorToken = bin2hex(random_bytes(20));

                // insert record in db
                $insert =  DB::table('authors')
                    ->insert([
                        'AuthorName' => $request->username,
                        'AuthorEmail' => $request->email,
                        'AuthorPassword' => Hash::make($request->password),
                        'AuthorToken' => $authorToken
                    ]);

                if ($insert) {

                    $mailData = ['token' => $authorToken];

                    Mail::send('mails.registerMail', $mailData, function ($msg) use ($request) {
                        $msg->to($request->email);
                        $msg->subject('Blogo Account Verification');
                    });

                    return response()->json([
                        'status' => 1,
                        'message' => " We Send Verification Link On $request->email "
                    ]);
                }
                // 
                else {
                    return "Something Wan't Wrong";
                }
            }
        }
    }

    function emailVerify(Request $request)
    {

        $newToken = bin2hex(random_bytes(20));
        // update author status
        $updateStatus = DB::table('authors')
            ->where('AuthorToken', $request->token)
            ->update([
                'AuthorStatus' => 1,
                'AuthorToken' => $newToken
            ]);

        if ($updateStatus) {
            return '<h2>You Are Verified</h2>';
        } //
        else {
            return '<h2>Invalid Token</h2>';
        }
    }

    function logout(Request $request)
    {
        $request->session()->pull('author');
        return back();
    }

    function forgotFormRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            // check email is exist or not

            $fetchEmail = DB::table('authors')
                ->where('AuthorEmail', '=', $request->email)
                ->first();

            if (!$fetchEmail) {
                return response()->json([
                    "status" => 2,
                    "message" => 'Email Not Exist'
                ]);
            } else {
                // if exist then send email

                $mailData = ['token' => $fetchEmail->AuthorToken];

                Mail::send('mails.forgotPasswordMail', $mailData, function ($msg) use ($request) {
                    $msg->to($request->email);
                    $msg->subject('Blogo Account Verification');
                });

                return response()->json([
                    "status" => 1,
                    'message' => "We Have Send Password Reset Link On $request->email"
                ]);
            }
        }
    }

    function forgotPassword(Request $request)
    {

        $verifyToken = DB::table('authors')
            ->where('AuthorToken', '=', $request->token)
            ->first();

        if ($verifyToken) {
            $token = $request->token;

            $data = ['token' => $token];

            return view(
                'forgotPassword',
                [
                    'data' => $data
                ]
            );
        } else {
            return '<h1>Invalid Token</h1>';
        }
    }
    function forgotRequest(Request $request)
    {

        $newToken = bin2hex(random_bytes(20));

        $validation = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validation->errors()->toArray()
            ]);
        } //
        else {

            $updatePassword = DB::table('authors')
                ->where('AuthorToken', '=', $request->authorToken)
                ->update(
                    [
                        'AuthorPassword' => Hash::make($request->password),
                        'AuthorToken' => $newToken,
                    ]
                );

            if ($updatePassword) {
                return response()->json([
                    'status' => 1,
                    'message' => 'Password Reset'
                ]);
            }
        }
    }
}
