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

Route::domain(env('WWW_SITE'))->namespace('www')->group(function(){
   
    Route::get('/', 'HomeController@index')->name('www');
    
    Route::get('categories/{idcode}', 'CategoryController@index')->name('category');
    
    Route::get('books/finished', 'BookController@finished')->name('finished');
    
    Route::get('books/rankingList', 'BookController@rankingList')->name('rankingList');
    
    Route::get('books/search', 'BookController@search')->name('search');
    
    Route::get('books/{idcode}', 'BookController@index')->name('book');
    
    Route::post('books/actionRecommend', 'BookController@actionRecommend')->name('recommend');
    
    Route::get('articles/{idcode}/book/{book_idcode}', 'ArticleController@index')->name('article');
    
    Route::get('users/myBookrack', 'UserController@myBookrack')->name('bookrack');
    
    Route::post('users/actionSetBookrack', 'UserController@actionSetBookrack')->name('setBookrack');
    
    Route::fallback(function () {
        return response()->view('www/global/404', ['categories' => App\Model\Category::ls(true)], 404);
    });
});

    
Route::domain(env('MOBILE_SITE'))->namespace('mobile')->group(function(){
    
    Route::get('/', 'HomeController@index')->name('mobile');
    
    Route::get('books/search', 'BookController@search')->name('m_search');
    
    Route::get('books/{idcode}', 'BookController@index')->name('m_book');
    
    Route::fallback(function () {
        return response()->view('www/global/404', ['categories' => App\Model\Category::ls(true)], 404);
    });
});



Route::fallback(function () {
    return response()->redirectTo(env('APP_URL'));
});