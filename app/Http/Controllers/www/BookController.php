<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\CategoryService;
use App\Service\BookService;
use App\Service\ArticleService;
use App\Service\RankinglistService;

class BookController extends Controller
{
    
    public function index(CategoryService $categoryService, BookService $bookService, ArticleService $articleService, $idcode)
    {
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $book = $bookService->one($idcode); 
                
        if ( $book['msg'] != 'success' || !$book['data'] ) {
            return response()->view('www/global/404', $data, 404);
        }
        
        $articles = $articleService->lsByBook($idcode);
        
        $data['book'] = $book['data'];
        $data['articles'] = $articles['data']['articles'];
        $data['position'] = 'category_'.$book['data']->category_id;
        
        $data['title'] = $book['data']->name.'免费阅读-666看书_笔趣阁';
        $data['keywords'] = sprintf(
            '666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费、%s最新章节、%s',
            $book['data']->name,
            $book['data']->author
        );
        $data['description'] = sprintf(
            '%s的%s是一本%s小说，666看书提供%s最新章节免费阅读，666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费',
            $book['data']->author,
            $book['data']->name,
            $book['data']->category,
            $book['data']->name
        );
        return view('www/book/index', $data);
    }
 
    
    public function finished(CategoryService $categoryService, BookService $bookService)
    {
        
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        $books = $bookService->lsFinished();
        
        $data['books'] = $books['data'];
        
        $booksNew = $bookService->lsNew();
        $data['books_new'] = $booksNew['data'];
        
        $booksLatelyUpdate = $bookService->lslatelyUpdate();
        $data['books_lately_update'] = $booksLatelyUpdate['data'];
        
        $data['position'] = 'finish';
        
        $data['title'] = '完本小说';
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门完本小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
        
        return view('www/book/finished', $data);
    }
    
    public function rankingList(CategoryService $categoryService, RankinglistService $rankinglistService)
    {
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        
        $rankingClick     = $rankinglistService->lsRankList('click');
        $rankingRecommend = $rankinglistService->lsRankList('recommend');
        $rankingCollect   = $rankinglistService->lsRankList('collect');
        
        $data['ranking_click']     = $rankingClick['data'];
        $data['ranking_recommend'] = $rankingRecommend['data'];
        $data['ranking_collect']   = $rankingCollect['data'];
        
        $data['position'] = 'rankingList';
        
        $data['title'] = '排行榜';
        $data['keywords'] = sprintf(
            "%d热门小说排行榜、%d热门小说排行榜",
            date('Y')-1,
            date('Y')
        );
        $data['description'] =  sprintf(
            "小说排行榜,%d热门小说免费阅读,%d热门小说免费阅读，绿色无广告无弹窗",
            date('Y')-1,
            date('Y')
        );
        
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
        
        
        $data['title'] = $keyword.'搜索结果';
        
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
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