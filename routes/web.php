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


if ( App::environment('local') ){
    $wwwSite = 'www.novel.local';
    $mobileSite = 'm.novel.local';
}

if ( App::environment('production') ){
    $wwwSite = 'www.666kanshu.com';
    $mobileSite = 'm.666kanshu.com';
}

Route::domain($wwwSite)->namespace('www')->group(function(){
   
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
    
Route::domain($mobileSite)->namespace('mobile')->group(function(){
    
    Route::get('/', 'HomeController@index')->name('mobile');
    
    Route::get('categories/{idcode}', 'CategoryController@one')->name('m_category');
    
    Route::get('categories', 'CategoryController@index')->name('m_categories');
    
    Route::get('books/finished', 'BookController@finished')->name('m_finished');
    
    Route::get('books/rankingList', 'BookController@rankingList')->name('m_rankingList');
    
    Route::get('books/search', 'BookController@search')->name('m_search');
    
    Route::get('books/{idcode}', 'BookController@index')->name('m_book');
    
    Route::get('users/myBookrack', 'UserController@myBookrack')->name('m_bookrack');
    
    Route::fallback(function () {
        return response()->view('mobile/global/404', [], 404);
    });
});

Route::fallback(function () {
    return response()->redirectTo(env('APP_URL'));
});
