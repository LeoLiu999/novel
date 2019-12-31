<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\BookService;
use App\Service\CategoryService;
use App\Service\ArticleService;


class HomeController extends Controller
{
    //
    
    public function index(Request $request, BookService $bookService, CategoryService $categoryService, ArticleService $articleService)
    {
        
        $categoriesRecommend = $categoryService->ls(true, 6);
        
        $booksByCategory = [];
        
        if ( isset($categoriesRecommend['data']) && !$categoriesRecommend['data']->isEmpty() ) {
            
            
            foreach ($categoriesRecommend['data'] as $category) {
                
                $temp = [];
                
                $temp['category'] = $category;
                
                $books = $bookService->ls($category->id, true, ['sort_weight', 'desc'], 8, 0);
                
                $temp['books'] = $books['data'];
                 
                $booksByCategory[] = $temp;
            }
                
        } 
        
        $categories = $categoryService->ls();
        
        //新书上架
        $booksNew = $bookService->lsNew();
        
        //最近更新
        $booksLatelyUpdate = $bookService->lslatelyUpdate();
        
        $randRecommendList = $bookService->lsRandRecommend();
        
        $data = [];
        $data['books_by_category'] = $booksByCategory;
        $data['categories'] = $categories['data'];
        $data['books_new'] = $booksNew['data'];
        $data['books_lately_update'] = $booksLatelyUpdate['data'];
        $data['books_recommend'] = $randRecommendList['data'];
        $data['position'] = 'home';
        
        return view('www/home/index', $data);
        
    }    
    
    
}
