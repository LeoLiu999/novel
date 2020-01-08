<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use App\Service\CategoryService;
use App\Service\BookService;

class ArticleController extends Controller
{
    
    public function index(CategoryService $categoryService, BookService $bookService,  ArticleService $articleService, $idcode, $bookIdcode)
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
        
        
        
        $data['title'] = $article['data']->title.'-'.$article['data']->book->name;
        $data['keywords'] = sprintf(
            "%s、%s免费阅读、书趣阁、笔趣阁、666看书",
            $article['data']->title,
            $article['data']->book->name
        );
        $data['description'] = sprintf(
            '%s的%s是一本%s小说，666看书提供%s最新章节免费阅读',
            $article['data']->book->author,
            $article['data']->book->name,
            $article['data']->book->category,
            $article['data']->book->name
        );
        
        return view('www/article/index', $data);
    }
    
}