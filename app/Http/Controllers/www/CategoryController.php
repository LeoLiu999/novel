<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\BookService;
use Illuminate\Http\Request;
use App\Service\ArticleService;

class CategoryController extends Controller
{
    
    
    public function index(Request $request, CategoryService $categoryService, BookService $bookService, ArticleService $articleService, $idcode)
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
        
        $articlesNew = $articleService->lsNew($category['data']->id);
        
        $data['books_new'] = $booksNew['data'];
        $data['articles_new'] = $articlesNew['data'];
        $data['position'] = 'category_'.$category['data']->id;
        
        
        return view('www/category/index', $data);
    }
    
    
    
}