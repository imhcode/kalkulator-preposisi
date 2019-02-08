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
    return redirect('/dashboard');
});

Auth::routes();
/*admin only*/
Route::get('/dashboard', 'HomeController@index')->name('home');

/* applikasi */
Route::get('/dashboard/app/modulo', 'HomeController@appModulo')->name('app.modulo');
Route::post('/dashboard/app/modulo', 'HomeController@appModuloStore')->name('app.modulo');
Route::get('/dashboard/app/table-kebenaran', 'HomeController@appTable')->name('app.table-kebenaran');
Route::post('/dashboard/app/table-kebenaran', 'HomeController@appTableStore')->name('app.table-kebenaran');


/*users*/
Route::get('/dashboard/users', 'HomeController@user')->name('user');
Route::get('/dashboard/user/add', 'HomeController@userAdd')->name('user');
Route::post('/dashboard/user/add', 'HomeController@userStore')->name('user');
Route::get('/dashboard/user/edit/{id}', 'HomeController@userEdit')->name('user');
Route::post('/dashboard/user/edit/{id}', 'HomeController@userUpdate')->name('user');
Route::get('/dashboard/user/delete/{id}', 'HomeController@userDelete')->name('user');


/*Contact*/
Route::get('/dashboard/contact', 'HomeController@contact')->name('contact');


/*History*/
Route::get('/dashboard/history', 'HomeController@history')->name('history');
Route::get('/dashboard/history/view/{id}', 'HomeController@historyView')->name('history');
Route::get('/dashboard/history/delete/{id}', 'HomeController@historyDelete')->name('history');


/*end admin*/
Auth::routes();

Route::get('/dashboard/logout', function(){
	Auth::logout();
	return redirect('/login');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});