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

//categories

Route::get('/', function () {
    $newestItems = \App\Item::all()->last()->take(5)->get();

    return view('homepage/index', compact(['newestItems' => 'newestItems']));
})->name('home');

Route::get('/categories', 'CategoryController@index');

Route::post('/categories', 'CategoryController@store');

Route::get('/categories/{category}', 'CategoryController@show');

Route::put('/categories/{category}', 'CategoryController@update');

Route::delete('/categories/{category}', 'CategoryController@destroy');

//classifications

Route::get('/classifications', 'ClassificationController@index');

Route::post('/classifications', 'ClassificationController@store');

Route::get('/classifications/{classification}', 'ClassificationController@show');

Route::get('/classifications/{classification}/delete', 'ClassificationController@destroy');

//items

Route::get('/items', 'ItemController@index');

Route::post('/items', 'ItemController@store');

Route::get('/items/{item}', 'ItemController@show');

Route::get('/items/{item}/delete', 'ItemController@destroy');

//tags

Route::get('/tags', 'TagController@index');

Route::get('/tags/{tag}', 'TagController@show');

//auth

Route::get('/register', 'RegistrationController@index');

Route::post('/register', 'RegistrationController@store');

Route::get('/admin', 'SessionController@index');

Route::post('/admin', 'SessionController@newAdmin');

Route::delete('/admin', 'SessionController@removeAdmin');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');
