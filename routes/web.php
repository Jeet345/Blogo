<?php

use App\Http\Controllers\dashboard\PostsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('/category', function () {
        return view('category');
    });
    Route::get('/blog', function () {
        return view('blog');
    });
    Route::get('/author/{authorname}', function () {
        return view('authorName');
    });
    Route::get('/tag/{tagname}', function () {
        return view('tagName');
    });




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
        // add 
    });
});
