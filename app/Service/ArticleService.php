<?php

namespace App\Service;

use App\Model\Article;

class ArticleService extends BaseService
{
    protected $model;
    
    public function __construct(Article $articleModel)
    {
        $this->model = $articleModel;
    }
    
    public function ls()
    {
        $articles = $this->model->ls();
        
        return makeResult('success', $articles);
    }
    
    
}