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
    
    public function ls($bookIdcode = null, array $order = [],  $limit = 20, $offset = 0)
    {
        $bookId = isset($bookIdcode) ? $bookIdcode : null;
        
        $articles = $this->model->ls($bookId, $order,  $limit, $offset);
        
        return makeResult('success', $articles);
    }
    
    public function one($idcode)
    {
        
        $id = $idcode;
        
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        $one = $this->model->one($id);
        return makeResult('success', $one);
    }
        
}