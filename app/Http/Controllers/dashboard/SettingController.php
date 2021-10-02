<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    function index(Request $request)
    {
        if ($request->ajax()) {

            $authorId = $request->session()->get('author');

            // fetch author info
            $fetchAuthor = DB::table('authors')
                ->where('AuthorId', $authorId)
                ->first();

            if ($fetchAuthor) {
                return view(
                    'Author/viewSetting',
                    [
                        'AuthorData' => $fetchAuthor
                    ]
                );
            }
        } //
        else {
            return view('Author/dashboard');
        }
    }

    function submitForm(Request $request)
    {

        // update data

        if ($request->profileImg) {

            // update with image

            $validator = Validator::make($request->all(), [
                'profileImg' => 'mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => -1,
                    'error' => $validator->errors()->toArray()
                ]);
            }

            $profileImg = $request->profileImg;

            $path = 'assets/images/uploadImage/authorImage';
            $extension = $profileImg->getClientOriginalExtension();
            $newImgName = bin2hex(random_bytes(14)) . '.' . $extension;
            $store = $profileImg->move($path, $newImgName);


            if ($store) {

                $updateAuthor = DB::table('authors')
                    ->where('AuthorId', $request->id)
                    ->update([
                        'AuthorName' => $request->name,
                        'AuthorEmail' => $request->email,
                        'AuthorCity' => $request->city,
                        'AuthorCountry' => $request->country,
                        'AuthorFacebook' => $request->facebook,
                        'AuthorTwitter' => $request->twitter,
                        'AuthorImage' => $newImgName,
                        'AuthorBio' => $request->bio
                    ]);

                if ($updateAuthor) {
                    return response()->json([
                        'status' => 1,
                        'message' => "Changes Saved Successfully"
                    ]);
                } //
                else {
                    return response()->json([
                        'status' => 0,
                        'message' => "No Change Detected"
                    ]);
                }
            } //
            else {
                return response()->json([
                    'status' => 0,
                    'message' => "Error on uploading image"
                ]);
            }
        } //
        else {

            // update without image

            $updateAuthor = DB::table('authors')
                ->where('AuthorId', $request->id)
                ->update([
                    'AuthorName' => $request->name,
                    'AuthorEmail' => $request->email,
                    'AuthorCity' => $request->city,
                    'AuthorCountry' => $request->country,
                    'AuthorFacebook' => $request->facebook,
                    'AuthorTwitter' => $request->twitter,
                    'AuthorBio' => $request->bio

                ]);

            if ($updateAuthor) {
                return response()->json([
                    'status' => 1,
                    'message' => "Changes Saved Successfully"
                ]);
            } //
            else {
                return response()->json([
                    'status' => 0,
                    'message' => "No Change Detected"
                ]);
            }
        }
    }
}
