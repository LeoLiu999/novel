<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\BookService;
use App\Service\ArticleService;

class BookController extends Controller
{
    
    public function index(BookService $bookService, ArticleService $articleService, $idcode)
    {
        
        $data = [];
        
        $book = $bookService->one($idcode); 
                
        if ( !$book['data'] ) {
            exit('404 not found');
        }
        
        $articles = $articleService->lsByBook($idcode);
        
        $data['book'] = $book['data'];
        $data['articles'] = $articles['data'];
        
        $data['title'] = $book['data']->name.'免费阅读';
        $data['keywords'] = sprintf(
            '%s、%s、666看书、笔趣阁、免费、无广告无弹窗、最新章节', 
            $book['data']->name, 
            $book['data']->author
        );
        $data['description'] = sprintf(
            '%s的%s是一本%s小说，666看书提供%s最新章节免费阅读', 
            $book['data']->author, 
            $book['data']->name, 
            $book['data']->category, 
            $book['data']->name
        );
        
        return view('mobile/book/index', $data);
    }
 
    public function search(Request $request, BookService $bookService)
    {
        $data = [];
        
        $keyword = $request->input('keyword');
        
        $books = $bookService->search($keyword);
        
        $data['books'] = $books['data'];
        $data['keyword'] = $keyword;
        
        $data['title'] = $keyword.'搜索结果';
        
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
        return view('mobile/book/search', $data);
        
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