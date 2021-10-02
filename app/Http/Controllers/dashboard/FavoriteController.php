<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    //

    function index(Request $request)
    {
        if ($request->ajax()) {

            $authorId = $request->session()->get('author');

            // get post list
            $postData = DB::table('blog')
                ->where('BlogAuthorId', $authorId)
                ->orderBy('BlogId', 'desc')
                ->limit(3)
                ->offset(0)
                ->get();

            // published post
            $publishedPostCount = DB::table('blog')
                ->where('BlogAuthorId', $authorId)
                ->where('BlogStatus', '=', '1')
                ->count();

            // Unpublished post
            $UnpublishedPostCount = DB::table('blog')
                ->where('BlogAuthorId', $authorId)
                ->where('BlogStatus', '=', '0')
                ->count();


            return view(
                'Author/viewFavorite',
                [
                    'publishedPostCount' => $publishedPostCount,
                    'UnpublishedPostCount' => $UnpublishedPostCount,
                    'postData' => $postData,
                ]
            );
        } //
        else {
            return view('Author/dashboard');
        }
    }

    function publishPost(Request $request)
    {
        $updateStatus = DB::table('blog')
            ->where('BlogId', '=', $request->id)
            ->update([
                'BlogStatus' => '1'
            ]);

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'msg' => "Post Published"
            ]);
        } //
        else {
            return response()->json([
                'status' => 0,
                'error' => "Something Wan't Wrong"
            ]);
        }
    }

    function unpublishPost(Request $request)
    {
        $updateStatus = DB::table('blog')
            ->where('BlogId', '=', $request->id)
            ->update([
                'BlogStatus' => '0'
            ]);

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'msg' => "Post Unpublished"
            ]);
        } //
        else {
            return response()->json([
                'status' => 0,
                'error' => "Something Wan't Wrong"
            ]);
        }
    }

    function deletePost(Request $request)
    {

        $deletePost = DB::table('blog')
            ->where('BlogId', '=', $request->id)
            ->delete();

        if ($deletePost) {
            return response()->json([
                'status' => 1,
                'msg' => 'Post Deleted'
            ]);
        } //
        else {
            return response()->json([
                'status' => 0,
                'error' => "Something Wan't Wrong"
            ]);
        }
    }

    function loadUpdate(Request $request)
    {
        $fetchPost = DB::table('blog')
            ->join('category', 'blog.BlogCategoryId', 'category.CategoryId')
            ->where('BlogId', '=', $request->id)
            ->get();

        if (!$fetchPost->isEmpty()) {
            return response()->json([
                'status' => 1,
                'post' => $fetchPost
            ]);
        } //
        else {
            return response()->json([
                'status' => 0,
                'error' => "Post Not Found"
            ]);
        }
    }

    function loadMore(Request $request)
    {

        $authorId = $request->session()->get('author');

        $postLength = DB::table('blog')
            ->where('BlogAuthorId', $authorId)
            ->count();

        if ($request->offset >= $postLength) {
            return response()->json([
                'status' => 2
            ]);
        } //
        else {
            $fetchPost = DB::table('blog')
                ->where('BlogAuthorId', $authorId)
                ->orderBy('BlogId', 'desc')
                ->limit($request->limit)
                ->offset($request->offset)
                ->get();


            // return card

            $returnValue = '';

            foreach ($fetchPost as $value) {
                $returnValue .= "

                    
                    <div class='post-card'>
                        <div class='post-img'>
                            <img src='" . asset('assets/images/uploadImage/' . $value->BlogImage . '') . "'
                                title='$value->BlogTitle' alt='' loading='lazy'>
                        </div>
                        <div class='post-desc'>

                            <a class='title' href=''>$value->BlogTitle</a>
                            <p>
                                " . Str::limit($value->BlogContent, 230) . "
                            </p>
                            <div class='user-action'>
                                <li class='btn'>
                                    <div class='icon' style='background-color: #9B5AB6'>
                                        <i class='fas fa-comment-alt-lines'></i>
                                        <span class='dot'></span>
                                    </div>
                                    <div class='count'>
                                        10
                                    </div>
                                </li>

                                <li>
                                    <div class='icon' style='background-color: #E54D3C'>
                                        <i class='fas fa-heart'></i>
                                    </div>
                                    <div class='count'>
                                        $value->BlogLikes
                                    </div>
                                </li>

                                <li>
                                    <h4 class='post-time'>$value->BlogPostDate</h4>
                                </li>

                            </div>
                        </div>
                        <div class='post-action'>
                    ";


                if ($value->BlogStatus == '1')

                    $returnValue .= "
                        <a href='' class='draft-box box' data-id='$value->BlogId' title='Revert To Draft'>
                            <span style='background-color: #9B5AB6; font-size: 0.7rem ' class='icon'><i
                                    class='fas fa-file'></i></span>
                            <span class='name'>Draft</span>
                        </a>
                    ";
                else
                    $returnValue .= "
                        <a href='' class='publish-box box' data-id='$value->BlogId' title='Publish Post'>
                            <span style='background-color: #9B5AB6; font-size: 0.7rem ' class='icon'><i
                                    class='fab fa-telegram-plane'></i></span>
                            <span class='name'>Publish</span>
                        </a>
                    ";

                $returnValue .= "

                        <a href='' class='edit-box box' data-id='$value->BlogId'>
                            <span style='background-color: #1ABD9B' class='icon'><i class='fas fa-pencil'></i></span>
                            <span class='name'>Edit</span>
                        </a>
                        <a href='' class='view-box box' data-id='$value->BlogId'>
                            <span style='background-color: #2980B9' class='icon'><i class='fas fa-eye'></i></span>
                            <span class='name'>View</span>
                        </a>
                        <a href='' class='delete-box box' data-id='$value->BlogId'>
                            <span style='background-color: #E54D3C' class='icon'><i class='fas fa-trash'></i></span>
                            <span class='name'>Trash</span>
                        </a>
                        <a href='' class='box' data-id='$value->BlogId'>
                            <span style='background-color: #6C75FF; font-size: 0.9rem' class='icon'><i
                                    class='far fa-ellipsis-h'></i></span>
                            <span class='name'>More</span>
                        </a>

                    </div>
                </div>

                ";
            }


            return response()->json([
                'status' => 1,
                'postData' => $returnValue
            ]);
        }
    }
}
