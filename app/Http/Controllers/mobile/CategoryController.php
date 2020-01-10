<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\BookService;

class CategoryController extends Controller
{
    protected $categoryTags = [
        1 => [
            '东方玄幻',
            '异世大陆',
            '剑与魔法',
            '史诗奇幻'
        ],
        2 => [
            '传统武侠',
            '古武未来',
            '古典仙侠',
            '现代修真'
        ],
        3 => [
            '架空历史',
            '军事战争',
            '战争幻想',
            '历史传记'
        ],
        4 => [
            '都市异能',
            '青春校园',
            '爱情婚姻',
            '都市生活'
        ],
        5 => [
            '未来世界',
            '超级科技',
            '黑暗幻想',
            '进化变异'
        ],
        6 => [
            '诡秘悬疑',
            '探险生存',
            '侦探推理',
            '奇妙世界'
        ], 
        7 => [
            '虚拟网游',
            '电子竞技',
            '游戏异界',
            '二次元'
        ],
    ];
    
    public function index(CategoryService $categoryService, BookService $bookService)
    {
        
        $categories = $categoryService->ls();
        
        $data = [];
        $data['categories'] = $categories['data'];
        
        foreach ($categories['data'] as &$category) {
            
            $count = $bookService->countByCategory($category->id);
            $category['book_nums'] = $count['data'];
            $categoriesName [] = $category->name.'小说';
            $category['tags'] = $this->categoryTags[$category->id] ?? [];
        }
        
        $data['title'] = '分类小说推荐-666看书_笔趣阁_中文小说排行榜';
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费、'.implode('、', $categoriesName);
        $data['description'] =  sprintf('666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费，666看书提供%s等小说', implode('、', $categoriesName));
        
        return view('mobile/category/index', $data);
    }
    
    public function one(CategoryService $categoryService, BookService $bookService, $idcode)
    {
        
        $category = $categoryService->one($idcode);
        
        $data = [];
        
        if (  $category['msg'] !== 'success' || !$category['data']  ) {
            return response()->view('mobile/global/404', $data, 404);
        }
        
        $data['title'] = $category['data']->name.'小说推荐-666看书_笔趣阁_中文小说排行榜';
        
        $data['keywords'] = sprintf(
            "666看书、笔趣阁、书趣阁、最热最全完本小说、无广告无弹窗小说网、免费小说、VIP小说免费、%s免费小说、%d%s热门小说排行、%d%s热门小说排行",
            $category['data']->name,
            date('Y')-1,
            $category['data']->name,
            date('Y'),
            $category['data']->name
        );
        
        $data['description'] =  sprintf(
            "666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费，666看书提供%s免费小说,%d%s热门小说免费阅读,%d%s热门小说免费阅读，绿色无广告无弹窗",
            $category['data']->name,
            date('Y')-1,
            $category['data']->name,
            date('Y'),
            $category['data']->name
        );
        
        $books = $bookService->lsByCategory($category['data']->id);
        $data['books'] = $books['data'];
        
        $randRecommendList = $bookService->lsRandRecommend(8, $category['data']->id);
        $data['books_recommend']   = $randRecommendList['data'];
        
        $data['category'] = $category['data'];
        
        return view('mobile/category/one', $data);
    }
    
    
}