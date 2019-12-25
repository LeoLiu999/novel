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
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $book = $bookService->one($idcode); 
                
        if ( !$book['data'] ) {
            return response()->view('www/global/404', $data, 404);
        }
        
        $articles = $articleService->ls(null, $idcode, ['articles.sort_weight', 'asc']);
        
        $data['book'] = $book['data'];
        $data['articles'] = $articles['data'];
        $data['position'] = 'category_'.$book['data']->category_id;
        
        return view('www/book/index', $data);
    }
 
    
    public function finished(Request $request, CategoryService $categoryService, BookService $bookService, ArticleService $articleService)
    {
        
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $books = $bookService->lsFinished();
        
        $data['books'] = $books['data'];
        
        $booksNew = $bookService->lsNew();
        
        $articlesNew = $articleService->lsNew();
        
        $data['books_new'] = $booksNew['data'];
        $data['articles_new'] = $articlesNew['data'];
        $data['position'] = 'finish';
        
        return view('www/book/finished', $data);
    }
    
    public function rankingList(Request $request, CategoryService $categoryService, BookService $bookService)
    {
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $books = $bookService->lsRankingList();
        
        $data['books'] = $books['data'];
        
        $data['position'] = 'rankingList';
        
        return view('www/book/rankingList', $data);
    }
    
    public function search(Request $request, CategoryService $categoryService, BookService $bookService)
    {
        
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        
        $keyword = $request->input('keyword');
        
        $books = $bookService->search($keyword);
        
        $data['books'] = $books['data'];
        $data['keyword'] = $keyword;
        
        return view('www/book/search', $data);
        
    }
    
    
    public function actionRecommend(Request $request, BookService $bookService)
    {
        
        $bookIdcode = $request->input('book_idcode');
        
        $recommend = $bookService->recommend($bookIdcode);
        
        switch ($recommend['msg']) {
            
            case 'success':
                return response()->json(['msg'=> 'success', 'code' => 200]) ;
                break;
            default: 
                return response()->json(['msg'=> '操作失败', 'code' => 400]) ;
                break;
            
        }
       
        
    }
    
}