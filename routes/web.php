<?php

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

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@index')->name('post.index');
});

Route::prefix('user')->group(function () {
    Route::post('/sendmail', 'UserController@sendMail')->name('user.sendmail');
});
