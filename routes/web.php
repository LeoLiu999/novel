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
    
    Route::get('categories/{idcode}', 'CategoryController@index')
    ->name('category');
    
    
    Route::get('books/{idcode}', 'BookController@index');
    
    Route::get('articles/{idcode}', 'ArticleController@index');
    
});
