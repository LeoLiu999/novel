<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\ArticleService;
use App\Service\CategoryService;

class ArticleController extends Controller
{
    
    public function index(Request $request, CategoryService $categoryService,  ArticleService $articleService, $idcode)
    {
        $categories = $categoryService->ls();
        
        $article = $articleService->one($idcode);
        
        $data = [];
        $data['categories'] = $categories['data'];
        $data['article'] = $article['data'];
        
        return view('www/article/index', $data);
    }
    
}