<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Service\BookService;
use App\Service\ArticleService;

class BookController extends Controller
{
    
    public function index(Request $request, CategoryService $categoryService, BookService $bookService, ArticleService $articleService, $idcode)
    {
        $categories = $categoryService->ls();
       
        $book = $bookService->one($idcode); 
        
        $articles = $articleService->ls($idcode, ['articles.sort_weight', 'asc']);
        
        $data = [];
        $data['categories'] = $categories['data'];
        $data['book'] = $book['data'];
        $data['articles'] = $articles['data'];
        
        return view('www/book/index', $data);
    }
    
}