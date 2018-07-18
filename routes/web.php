<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    //
    echo 'asdf';
})->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {

    Route::get('/dashboard', 'admin\DashboardController@index')->name('admin.dashboard.index');

    Route::get('/users', 'admin\UserController@index')->name('admin.users.index');
    Route::get('/users/create', 'admin\UserController@create')->name('admin.users.create');
    Route::post('/users/store', 'admin\UserController@store')->name('admin.users.store');
    Route::get('/users/{id}/edit', 'admin\UserController@edit')->name('admin.users.edit');
    Route::put('/users/{id}/update', 'admin\UserController@update')->name('admin.users.update');
    Route::put('/users/{id}/delete', 'admin\UserController@destroy')->name('admin.users.delete');
    Route::get('/users/{id}', 'admin\UserController@profile')->name('admin.users.profile');
    
    // Route::get('users', function () {
    //     // Matches The "/admin/users" URL
    //     echo 'asdf';
    // });
    Route::get('settings', function () {
        // Matches The "/admin/users" URL
        echo 'settings';
    });
});
