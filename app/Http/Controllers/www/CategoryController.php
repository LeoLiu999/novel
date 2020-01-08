<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\BookService;
use App\Service\ArticleService;

class CategoryController extends Controller
{
    
    
    public function index(CategoryService $categoryService, BookService $bookService, ArticleService $articleService, $idcode)
    {
        
        $categories = $categoryService->ls();
        
        $category = $categoryService->one($idcode);
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        if ( !$category['data'] ) {
            return response()->view('www/global/404', $data, 404);
        }
        
        $data['category'] = $category['data'];
        
        $books = $bookService->lsByCategory($category['data']->id);
        $data['books'] = $books['data'];
        
        $booksNew = $bookService->lsNew($category['data']->id);
        $data['books_new'] = $booksNew['data'];
        //最近更新
        $booksLatelyUpdate = $bookService->lslatelyUpdate($idcode);
        $data['books_lately_update'] = $booksLatelyUpdate['data'];
        
        $data['position'] = 'category_'.$category['data']->id;
        
        
        $data['title'] = sprintf(
            "%s-好看的%s免费小说", 
            $category['data']->name, 
            $category['data']->name
        );
        $data['keywords'] = sprintf(
            "%s免费小说、%d%s热门小说排行、%d%s热门小说排行", 
            $category['data']->name, 
            date('Y')-1, 
            $category['data']->name, 
            date('Y'), 
            $category['data']->name
        );
        $data['description'] =  sprintf(
            "%s免费小说,%d%s热门小说免费阅读,%d%s热门小说免费阅读，绿色无广告无弹窗", 
            $category['data']->name,
            date('Y')-1,
            $category['data']->name, 
            date('Y'),
            $category['data']->name
        );
        
        return view('www/category/index', $data);
    }
    
    
    
}