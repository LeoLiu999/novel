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


Route::domain('www.novel.local')->namespace('www')->group(function(){
   
    Route::get('/', 'HomeController@index');
    
    Route::get('categories/{idcode}', 'CategoryController@index')->name('category');
    
    Route::get('books/finished', 'BookController@finished')->name('finished');
    
    Route::get('books/rankingList', 'BookController@rankingList')->name('rankingList');
    
    Route::get('books/search', 'BookController@search')->name('search');
    
    Route::get('books/{idcode}', 'BookController@index')->name('book');
    
    Route::post('books/actionRecommend', 'BookController@actionRecommend')->name('recommend');
    
    Route::get('articles/{idcode}', 'ArticleController@index')->name('article');
    
    Route::get('users/myBookrack', 'UserController@myBookrack')->name('bookrack');
    
    Route::post('users/actionSetBookrack', 'UserController@actionSetBookrack')->name('setBookrack');
    
    Route::fallback(function () {
        return response()->view('www/global/404', ['categories' => App\Model\Category::ls(true)], 404);
    });
});
