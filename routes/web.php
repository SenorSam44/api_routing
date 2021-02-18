<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\Api\AuthenticationController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthenticationController::class, 'registerIndex'])->name('register.index');

Route::get('/login', [AuthenticationController::class, 'loginIndex'])->name('login.index');

Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');


