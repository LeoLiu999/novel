<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index(ArticleService $articleService, $idcode, $bookIdcode)
    {
        
        $data = [];
        
        $article = $articleService->one($idcode, $bookIdcode);
        
        if ($article['msg'] != 'success' or !$article['data'] ) {
            return response()->view('mobile/global/404', $data, 404);
        }
       
        $prevArticle = $articleService->prevOne($article['data']->id, $article['data']->book_id);
        
        $nextArticle = $articleService->nextOne($article['data']->id, $article['data']->book_id);
        
        $data['article'] = $article['data'];
        $data['prev_article'] = $prevArticle['data'];
        $data['next_article'] = $nextArticle['data'];
        
        $data['title'] = $article['data']->title.'-'.$article['data']->book->name.'-666看书_笔趣阁';
        $data['keywords'] = sprintf(
            "%s、%s免费阅读、666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费",
            $article['data']->title,
            $article['data']->book->name
        );
        $data['description'] = sprintf(
            '%s的%s是一本%s小说，666看书提供%s最新章节免费阅读,666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费',
            $article['data']->book->author,
            $article['data']->book->name,
            $article['data']->book->category,
            $article['data']->book->name
        );
        
        $articleService->setAlreadyRead($bookIdcode, $idcode);
        
        return view('mobile/article/index', $data);
    }
    
    public function actionGetArticle(Request $request, ArticleService $articleService)
    {
        
        $data = [];
        
        $idcode = $request->query('idcode');
        $bookIdcode = $request->query('book_idcode');
        
        $article = $articleService->one($idcode, $bookIdcode);
        
        if ($article['msg'] != 'success' or !$article['data'] ) {
            
            $data['code'] = '400';
        } else{
            
            $articleService->setAlreadyRead($bookIdcode, $idcode);
            
            $prevArticle = $articleService->prevOne($article['data']->id, $article['data']->book_id);
            
            $nextArticle = $articleService->nextOne($article['data']->id, $article['data']->book_id);
            
            
            $response['article']['id'] = $article['data']->id;
            $response['article']['title'] = $article['data']->title;
            $response['article']['content'] = $article['data']->content;
            
            $response['prev']['id'] = $prevArticle['data'] ? $prevArticle['data']->id : 'empty'; 
            $response['next']['id'] = $nextArticle['data'] ? $nextArticle['data']->id : 'empty';
            
            $data['code'] = 200;
            $data['data'] = $response;
        }
        
        return response()->json($data);
        
    }
    
}