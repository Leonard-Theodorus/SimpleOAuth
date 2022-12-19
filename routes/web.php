<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('appPages.home');
});
Route::get('/home', function(){
    return view('appPages.home');
})->name('home');
Route::get('/login', [AuthController::class, 'loginpage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login/github', [GitHubController::class, 'redirect'])->name('githublogin');
Route::get('/login/github/callback', [GitHubController::class, 'callback']);
Route::get('/login/google', [GoogleController::class, 'redirect'])->name('googlelogin');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);
Route::get('/register', [AuthController::class, 'registerpage'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

