<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\BookService;
use App\Service\CategoryService;
use App\Service\BannerService;
use App\Service\RankinglistService;


class HomeController extends Controller
{
    //
    
    public function index(Request $request, BookService $bookService, 
                        CategoryService $categoryService, BannerService $bannerService, 
                        RankinglistService $rankinglistService)
    {
        
        $categoriesRecommend = $categoryService->ls(true, 6);
        
        $booksByCategory = [];
        
        if ( isset($categoriesRecommend['data']) && !$categoriesRecommend['data']->isEmpty() ) {
            
            foreach ($categoriesRecommend['data'] as $category) {
                
                $temp = [];
                
                $temp['category'] = $category;
                
                $books = $bookService->ls($category->id, true, ['sort_weight', 'desc'], 8, 0);
                
                $temp['books'] = $books['data'];
                 
                $booksByCategory[] = $temp;
            }
        } 
        
        $randRecommendList = $bookService->lsRandRecommend(8);
        
        $rankingClick     = $rankinglistService->lsClick();
        $rankingRecommend = $rankinglistService->lsRecommend();
        $rankingCollect   = $rankinglistService->lsCollect();
        
        $banners = $bannerService->ls();
        
        $data = [];
        $data['books_by_category'] = $booksByCategory;
        $data['books_recommend']   = $randRecommendList['data'];
        
        $data['ranking_click']     = $rankingClick['data'];
        $data['ranking_recommend'] = $rankingRecommend['data'];
        $data['ranking_collect']   = $rankingCollect['data'];
        
        $data['banners']  = $banners['data'];
        $data['position'] = 'home';
        
        $data['title'] = '666看书-最新最全热门小说';
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
        return view('mobile/home/index', $data);
        
    }    
    
    
}
