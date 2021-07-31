<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
        Route::get('dashboard/{ajaxPage}', [DashboardController::class, 'loadAjaxView']); // ajax load page


        // add 
    });
});
