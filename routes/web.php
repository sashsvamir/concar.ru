<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/category/{slug}', 'CategoryController')
    ->where('slug', '[\d\w]+[/[\d\w]+]?')
    ->name('category-view');

Route::get('/page/{slug}', 'PageController')
    ->name('page-view');

Route::get('/', 'SiteController')
    ->name('site-index');


Auth::routes(['register' => App::environment('local'), 'reset' => false, 'verify' => false]);

Route::get('/admin', 'Admin\HomeController@index')->name('admin');

Route::get('/admin/user', 'Admin\UserController@index')->name('admin-user-index');
Route::get('/admin/user/create', 'Admin\UserController@showCreateForm')->name('admin-user-create');
Route::get('/admin/user/{id}', 'Admin\UserController@showUpdateForm')->where('id', '[\d]+')->name('admin-user-update');
Route::post('/admin/user/{id}', 'Admin\UserController@destroy')->where('id', '[\d]+')->name('admin-user-remove');
Route::post('/admin/user', 'Admin\UserController@store')->name('admin-user-store');
