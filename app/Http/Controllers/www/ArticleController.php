<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ArticleService;
use App\Service\CategoryService;
use App\Service\BookService;

class ArticleController extends Controller
{
    
    public function index(Request $request, CategoryService $categoryService, BookService $bookService,  ArticleService $articleService, $idcode, $bookIdcode)
    {
        
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $article = $articleService->one($idcode, $bookIdcode);
        
        if ( !$article['data'] ) {
            return response()->view('www/global/404', $data, 404);
        }
        
       
        
        $prevArticle = $articleService->prevOne($article['data']->id, $article['data']->book_id);
        
        $nextArticle = $articleService->nextOne($article['data']->id, $article['data']->book_id);
        
        $data['article'] = $article['data'];
        $data['prev_article'] = $prevArticle['data'];
        $data['next_article'] = $nextArticle['data'];
        
        return view('www/article/index', $data);
    }
    
}