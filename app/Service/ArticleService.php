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
    
    
    public function lsByBook( $bookIdcode)
    {
        $bookId = $bookIdcode;
        
        if (!is_id($bookId)) {
            return makeResult('error_bookid');
        }
        
        $articles = $this->model::lsByBook( $bookId);
        
        return makeResult('success', $articles);
    }
    
    
    
    
    
    /*
    
    public function ls($categoryId = null, $bookIdcode = null, array $order = [],  $limit = 20, $offset = 0)
    {
        $bookId = $bookIdcode ?? null;
        
        $articles = $this->model::ls($categoryId, $bookId, $order,  $limit, $offset);
        
        return makeResult('success', $articles);
    }
    */
    public function one($idcode)
    {
        
        $id = $idcode;
        
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        $one = $this->model::one($id);
        return makeResult('success', $one);
    }
        
    
    public function nextOne($id, $bookId)
    {
                
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        if ( !is_id($bookId) ) {
            return makeResult('error_id');
        }
        
        $one = $this->model::nextOne($id, $bookId);
        return makeResult('success', $one);
    }
    
    public function prevOne($id, $bookId)
    {
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        if ( !is_id($bookId) ) {
            return makeResult('error_id');
        }
        
        $one = $this->model::prevOne($id, $bookId);
        return makeResult('success', $one);
        
    }
    
   
    
}