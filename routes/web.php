<?php

//categories

Route::get('/', function () {
    $newestItems = array();
    $topRating = array();

    if (count(\App\Item::all()) >= 4) {
        $newestItems = \App\Item::orderBy('created_at', 'desc')->take(4)->get();
    }

    if (count(\App\Comment::all()) >= 3) {
        $topRating = \App\Comment::orderBy('star', 'desc')->take(3)->get();
    }

    return view('homepage/index', compact(['newestItems' => 'newestItems', 'topRating' => 'topRating']));
})->name('home');

Route::get('/home', function () {
    return redirect()->home();
});

Route::get('/categories', 'CategoryController@index');

Route::post('/categories', 'CategoryController@store');

Route::get('/categories/{category}', 'CategoryController@show');

Route::put('/categories/{category}', 'CategoryController@update');

Route::delete('/categories/{category}', 'CategoryController@destroy');

//classifications

Route::get('/classifications', 'ClassificationController@index');

Route::post('/classifications', 'ClassificationController@store');

Route::get('/classifications/{classification}', 'ClassificationController@show');

Route::put('//classifications/{classification}', 'ClassificationController@update');

Route::delete('/classifications/{classification}', 'ClassificationController@destroy');

//items

Route::get('/items', 'ItemController@index');

Route::post('/items', 'ItemController@store');

Route::get('/items/{item}', 'ItemController@show');

Route::put('/items/{item}', 'ItemController@update');

Route::delete('/items/{item}', 'ItemController@destroy');

Route::post('/items/{item}/{tag}', 'ItemController@attach');

Route::delete('/items/{item}/{tag}', 'ItemController@detach');

//tags

Route::get('/tags', 'TagController@index');

Route::get('/tags/{tag}', 'TagController@show');

Route::post('/tags', 'TagController@store');

Route::put('/tags/{tag}', 'TagController@update');

Route::delete('/tags/{tag}', 'TagController@destroy');

//comment

Route::post('/comments', 'CommentController@store');

Route::delete('/comments', 'CommentController@destroy');

//auth

Route::get('/register', 'RegistrationController@index');

Route::post('/register', 'RegistrationController@store');

Route::get('/admin', 'SessionController@admin');

Route::post('/admin', 'SessionController@newAdmin');

Route::delete('/admin', 'SessionController@removeAdmin');

Route::get('/login', 'SessionController@index');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');

//order

Route::get('/carts', 'OrderController@cart');

Route::post('/carts', 'OrderController@addCart');

Route::delete('/carts/{cart}', 'OrderController@removeCart');

Route::get('/orders', 'OrderController@index');

Route::post('/orders', 'OrderController@store');
