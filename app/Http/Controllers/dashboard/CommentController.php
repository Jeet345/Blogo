<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CommentController extends Controller
{
    //
    function index(Request $request)
    {
        if ($request->ajax()) {
            return view(
                'Author/viewComment',
            );
        } //
        else {
            return view('Author/dashboard');
        }
    }

    function loadMore(Request $request)
    {

        $authorId = $request->session()->get('author');

        $commentLength = DB::table('comments')
            ->join('blog', 'comments.BlogId', 'blog.BlogId')
            ->where('blog.BlogAuthorId', $authorId)
            ->count();


        // return card

        if ($request->offset >= $commentLength) {

            return response()->json([
                'status' => 0
            ]);
        } //
        else {

            // fetch data by offset

            $fetchComment = DB::table('comments')
                ->join('blog', 'comments.BlogId', 'blog.BlogId')
                ->where('blog.BlogAuthorId', $authorId)
                ->orderBy('comments.CommentId', 'desc')
                ->limit($request->limit)
                ->offset($request->offset)
                ->get();


            $returnValue = '';

            foreach ($fetchComment as $value) {

                $returnValue .=

                    "
    
                        <div class='comment-card'>
    
                            <div class='left-side'>
    
                                <div class='user-image'>
                                    <img src='" . asset('assets/images/usericon.png') . "' alt=''>
                                </div>
     
                                <div class='user-info'>
                                    <h5 class='user-line'>
                                        <span class='userName'>$value->UserName</span>
                                        commented on
                                        <a href='/blog/$value->BlogId' title='blog title'>
                                            '<span>$value->BlogTitle</span>'
                                        </a>
                                    </h5>
                                    ";

                if ($value->CommentStatus == 0) {
                    $returnValue .= "<h3 class='comment-content'>This comment has been removed by the author.</h3>";
                } //
                else {
                    $returnValue .= "<h3 class='comment-content'>$value->UserComment</h3>";
                }


                $returnValue .=
                    "
                                    
                                </div>
                            </div>
    
                            <div class='right-side'>
                                <h5 class='comment-date'>$value->CommentDate</h5>
                                <ul class='hover-menu'>
                                ";

                if ($value->CommentStatus != 0) {
                    $returnValue .= "<li><a href='javascript:void(0)' class='remove-content-btn' data-id='$value->CommentId' title='Remove content of this comment'><i class='fas fa-times-hexagon'></i></a></li>";
                }

                if ($value->CommentStatus == 2) {
                    $returnValue .= "<li><a href='javascript:void(0)' class='not-spam-btn' data-id='$value->CommentId' title='Not Spam'><i class='fas fa-comment-check'></i></a></li>";
                } //
                else {
                    $returnValue .= "<li><a href='javascript:void(0)' class='spam-btn' data-id='$value->CommentId' title='Mark this comment as spam'><i class='fas fa-exclamation-square'></i></a></li>";
                }
                $returnValue .=
                    "
                                    
                                    <li><a href='javascript:void(0)' class='delete-btn' data-id='$value->CommentId' title='Delete this comment'><i class='fas fa-trash'></i></a></li>
                                </ul>
                            </div>
    
                        </div>
    
                    ";
            }

            return response()->json([
                'status' => 1,
                'data' => $returnValue
            ]);
        }
    }

    function removeContent(Request $request)
    {
        // update status 
        $updateStatus  = DB::table('comments')
            ->where('CommentId', $request->id)
            ->update([
                'CommentStatus' => 0
            ]);

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'message' => 'Content of this comment is removed'
            ]);
        } //
    }

    function spamComment(Request $request)
    {

        $id = $request->id;

        // update status 
        $updateStatus  = DB::table('comments')
            ->where('CommentId', $id)
            ->update([
                'CommentStatus' => 2
            ]);

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'message' => 'The comment is marked as spam'
            ]);
        } //



    }

    function notSpamComment(Request $request)
    {

        $id = $request->id;

        // update status 
        $updateStatus  = DB::table('comments')
            ->where('CommentId', $id)
            ->update([
                'CommentStatus' => 1
            ]);

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'message' => 'The comment is now live on post'
            ]);
        } //



    }

    function deleteComment(Request $request)
    {

        $id = $request->id;

        // update status 
        $updateStatus  = DB::table('comments')
            ->where('CommentId', $id)
            ->delete();

        if ($updateStatus) {
            return response()->json([
                'status' => 1,
                'message' => 'The comment has been deleted forever'
            ]);
        } //

    }
}
