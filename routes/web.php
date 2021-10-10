<?php

use App\Http\Controllers\admin\articleController;
use App\Http\Controllers\admin\authorController as AdminAuthorController;
use App\Http\Controllers\admin\categoryController as adminCategoryController;
use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\tagController as AdminTagController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboard\CommentController;
use App\Http\Controllers\dashboard\FavoriteController;
use App\Http\Controllers\dashboard\PostsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['clearCache']], function () {

    Route::get('/', [HomeController::class, 'fetchBlogData']);
    Route::get('/home', function () {
        return redirect('/');
    });
    Route::get('/category/{categoryName}', [CategoryController::class, 'index']);

    Route::get('/blog/{BlogId}', [BlogController::class, 'index']);
    Route::post('/blog/submitComment', [BlogController::class, 'commentSubmit']);
    Route::get('/blog/submitComment', function () {
        return abort(404);
    });

    Route::get('/author/{authorId}', [AuthorController::class, 'index']);
    Route::get('/tag/{tagName}', [TagController::class, 'index']);



    // login
    Route::group(['middleware' => ['loginCheck']], function () {
        Route::get('/login', function () {
            return view('login');
        });
        Route::post('/login/loginRequest', [LoginController::class, 'loginSubmit']);
        Route::get('/login/loginRequest', function () {
            return abort(404);
        });
        Route::post('/login/registerRequest', [LoginController::class, 'registerRequest']);
        Route::get('/login/registerRequest', function () {
            return abort(404);
        });
        Route::post('/login/forgotFormRequest', [LoginController::class, 'forgotFormRequest']);

        Route::get('/login/emailVerify/{token}', [LoginController::class, 'emailVerify']);
        Route::get('login/forgotPassword/{token}', [LoginController::class, 'forgotPassword']);
        Route::post('/login/forgotPassword/forgotRequest', [LoginController::class, 'forgotRequest']);
    });


    Route::get('/login/logout', [LoginController::class, 'logout']);



    //author dashboard
    Route::group(['middleware' => ['dashboardCheck']], function () {
        Route::get('/dashboard', function () {
            return view('author.dashboard');
        });
        Route::get('/dashboard/logout', [DashboardController::class, 'Authorlogout']);

        // view post
        Route::get('/dashboard/viewPost', [PostsController::class, 'PostView']);
        Route::post('/dashboard/viewPost/addPost', [PostsController::class, 'AddPost']);
        Route::get('/dashboard/viewPost/addPost', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/published', [PostsController::class, 'publishPost']);
        Route::get('/dashboard/viewPost/published', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/draft', [PostsController::class, 'unpublishPost']);
        Route::get('/dashboard/viewPost/draft', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/delete', [PostsController::class, 'deletePost']);
        Route::get('/dashboard/viewPost/delete', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/loadUpdate', [PostsController::class, 'loadUpdate']);
        Route::get('/dashboard/viewPost/loadUpdate', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/updatePost', [PostsController::class, 'updatePost']);
        Route::get('/dashboard/viewPost/updatePost', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewPost/loadMore', [PostsController::class, 'loadMore']);
        Route::get('/dashboard/viewPost/loadMore', function () {
            return abort(404);
        });

        Route::get('/dashboard/viewDashboard', [PostsController::class, 'DashboardView']);


        // view comment 
        Route::get('/dashboard/viewComment', [CommentController::class, 'index']);
        Route::post('/dashboard/viewComment/loadMore', [CommentController::class, 'loadMore']);
        Route::get('/dashboard/viewComment/loadMore', function () {
            return abort(404);
        });

        Route::post('/dashboard/viewComment/removeContent', [CommentController::class, 'removeContent']);
        Route::get('/dashboard/viewComment/removeContent', function () {
            return abort(404);
        });

        Route::post('/dashboard/viewComment/spamComment', [CommentController::class, 'spamComment']);
        Route::get('/dashboard/viewComment/spamComment', function () {
            return abort(404);
        });

        Route::post('/dashboard/viewComment/notSpamComment', [CommentController::class, 'notSpamComment']);
        Route::get('/dashboard/viewComment/notSpamComment', function () {
            return abort(404);
        });

        Route::post('/dashboard/viewComment/deleteComment', [CommentController::class, 'deleteCommentphp']);
        Route::get('/dashboard/viewComment/deleteComment', function () {
            return abort(404);
        });


        // view setting
        Route::get('/dashboard/viewSetting', [SettingController::class, 'index']);

        // setting form submit
        Route::post('dashboard/viewSetting/submitForm', [SettingController::class, 'submitForm']);
        Route::get('dashboard/viewSetting/submitForm', function () {
            return abort(404);
        });

        // view Favorite
        Route::get('/dashboard/viewFavorite', [FavoriteController::class, 'index']);

        Route::post('/dashboard/viewFavorite/published', [PostsController::class, 'publishPost']);
        Route::get('/dashboard/viewFavorite/published', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewFavorite/draft', [PostsController::class, 'unpublishPost']);
        Route::get('/dashboard/viewFavorite/draft', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewFavorite/delete', [PostsController::class, 'deletePost']);
        Route::get('/dashboard/viewFavorite/delete', function () {
            return abort(404);
        });
        Route::post('/dashboard/viewFavorite/loadMore', [PostsController::class, 'loadMore']);
        Route::get('/dashboard/viewFavorite/loadMore', function () {
            return abort(404);
        });
    });


    // admin site

    // dashboard
    Route::get('/admin', [indexController::class, 'index']);
    Route::post('/admin/loginRequest', [indexController::class, 'login']);

    // session check middleware
    Route::group(['middleware' => ['adminCheck']], function () {

        // logout
        Route::get('admin/logout', [indexController::class, 'logout']);


        // ================= articles==============
        Route::get('/admin/articles', [articleController::class, 'index']);

        // delete query
        Route::get('/admin/articles/delete/{blogId}', [articleController::class, 'deleteBlog']);

        // search query
        Route::get('/admin/articles/search', [articleController::class, 'search']);


        // ================= category==============
        Route::get('/admin/category', [admincategoryController::class, 'index']);

        // delete query
        Route::get('/admin/category/delete/{catId}', [adminCategoryController::class, 'deleteCategory']);

        // add query
        Route::post('/admin/category/add', [adminCategoryController::class, 'addCategory']);


        // ================= tag ==============
        Route::get('/admin/tags', [AdminTagController::class, 'index']);

        // delete query
        Route::get('/admin/tag/delete/{tagId}', [AdminTagController::class, 'deleteTag']);

        // add query
        Route::post('/admin/tag/add', [AdminTagController::class, 'addTag']);


        // ================= author ==============
        Route::get('/admin/authors', [AdminAuthorController::class, 'index']);
    });
});
