<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//New Routes

Route::group(['middleware' => 'checkPermission'], function () {
	Route::get('user/add', [App\Http\Controllers\UserController::class, 'add'])->name('add'); //Rota para página 'adicionar novo usuário'
	Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('store'); //Rota para criação um novo usuário no banco
	Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit'); //Rota para página 'editar usuário'
	Route::post('user/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update'); //Rota para editar nome e email de um usuário no banco
	Route::post('user/password{id}', [App\Http\Controllers\UserController::class, 'password'])->name('password'); //Rota para editar senha de um usuario no banco
	Route::post('user/delete{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete'); //Rota deletar um usuário no banco
});