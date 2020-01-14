<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\BookService;
use App\Service\ArticleService;
use App\Service\RankinglistService;

class BookController extends Controller
{
    
    public function index(BookService $bookService, ArticleService $articleService, $idcode)
    {
        
        $data = [];
        
        $book = $bookService->one($idcode); 
                
        if ( $book['msg'] != 'success' or !$book['data'] ) {
            return response()->view('mobile/global/404', $data, 404);
        }
        
        $articles = $articleService->lsByBook($idcode);
        
        $alreadyRead = $articleService->getAlreadyRead($idcode);
        
        $data['book'] = $book['data'];
        $data['articles'] = $articles['data']['articles'];
        $data['already_read'] = $alreadyRead['data']; 
        
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
        
        return view('mobile/book/index', $data);
    }
 
    public function finished(BookService $bookService)
    {
        $data = [];
        
        $books = $bookService->lsFinished();
        
        $randRecommendList = $bookService->lsRandRecommend(8);
        $data['books_recommend']   = $randRecommendList['data'];
        
        $data['books'] = $books['data'];
        
        $data['title'] = '完本小说-666看书_笔趣阁';
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门完本小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
        return view('mobile/book/finished', $data);
    }
    
    public function rankingList( RankinglistService $rankinglistService)
    {
        $rankingClick     = $rankinglistService->lsRankList('click');
        $rankingRecommend = $rankinglistService->lsRankList('recommend');
        $rankingCollect   = $rankinglistService->lsRankList('collect');
        
        $data = [];
        $data['ranking_click']     = $rankingClick['data'];
        $data['ranking_recommend'] = $rankingRecommend['data'];
        $data['ranking_collect']   = $rankingCollect['data'];
        $data['position'] = 'rankingList';
        $data['title'] = '排行榜-666看书_笔趣阁';
        $data['keywords'] = sprintf(
            "666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费、%d热门小说排行榜、%d热门小说排行榜",
            date('Y')-1,
            date('Y')
        );
        $data['description'] =  sprintf(
            "666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费，小说排行榜,%d热门小说免费阅读,%d热门小说免费阅读，绿色无广告无弹窗",
            date('Y')-1,
            date('Y')
        );
        
        return view('mobile/book/rankingList', $data);
    }
    
    public function catalog(BookService $bookService, ArticleService $articleService, $bookIdcode)
    {
        
        $data = [];
        
        $articles = $articleService->lsByBook($bookIdcode);
        
        if ( $articles['msg'] != 'success' ) {
            return response()->view('mobile/global/404', $data, 404);
        }
        
        $alreadyRead = $articleService->getAlreadyRead($bookIdcode);
        
        $data['book'] = $articles['data']['book'];
        $data['articles'] = $articles['data']['articles'];
        $data['already_read'] = $alreadyRead['data'] ?? null;
        
        $bookName = $articles['data']['book']->name;
        $bookAuthor = $articles['data']['book']->author;
        $bookCategory = $articles['data']['book']->category;
        
        $data['title'] = $bookName.'免费阅读-666看书_笔趣阁';
        $data['keywords'] = sprintf(
            '666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费、%s最新章节、%s',
            $bookName,
            $bookAuthor
        );
        $data['description'] = sprintf(
            '%s的%s是一本%s小说，666看书提供%s最新章节免费阅读，666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费',
            $bookAuthor,
            $bookName,
            $bookCategory,
            $bookName
        );
        
        return view('mobile/book/catalog', $data);
        
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