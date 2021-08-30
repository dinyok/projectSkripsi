<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminPageController;
use App\Http\Controllers\profileController;
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

Route::get('/', [AuthController::class, 'showFormLogin']);
Route::get('/login1', [AuthController::class, 'showFormLogin']);
Route::post('/login1', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgetPassword', [AuthController::class, 'showFormForgetPassword']);
Route::post('/forgetPassword', [AuthController::class, 'forgetPassword']);

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('/home', function () {
        return view('index');
    });
    Route::get('/logout', [AuthController::class, 'logout']);
 
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', [WebController::class, 'store']);

Route::get('/about', function () {
    return redirect('/#about');
});

Route::get('/project', function () {
    return redirect('/#project');
});

Route::get('/profile', [profileController::class, 'index']);
Route::post('/profile', [profileController::class, 'changeProfile']);

Route::get('/changePassword', [profileController::class, 'ShowFromChangePassword']);
Route::post('/changePassword', [profileController::class, 'changePassword']);

// Route::get('/blog', function () {
//     return view('blog');
// });
Route::get('/blog', [DocumentController::class, 'index']);
Route::get('/blog/view/{id}', [DocumentController::class, 'viewFile']);
Route::get('/blog/delete/{id}', [DocumentController::class, 'destroy']);
Route::get('/blog/restore/{id}', [DocumentController::class, 'restore']);
Route::get('/blog/download/{id}', [DocumentController::class, 'show']);
Route::post('/upload', [DocumentController::class, 'store']);
// Route::get('/blog/download/{id}', [DocumentController::class, 'show']);

Route::get('/adminPage', [adminPageController::class, 'index']);
Route::get('/adminPage/show/{id}', [DocumentController::class, 'showFile']);
Route::get('/adminPage/delete/{id}', [adminPageController::class, 'delete']);
Route::get('/adminPage/restore/{id}', [adminPageController::class, 'restore']);

Route::get('/blog-detail', function () {
    return view('blog-detail');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/project-detail', function () {
    return view('project-detail');
});

