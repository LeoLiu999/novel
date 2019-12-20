<?php

namespace App\Service;

use App\Model\Book;

class BookService extends BaseService
{
    protected $model;
    
    public function __construct(Book $bookModel)
    {
        $this->model = $bookModel;
    }
    
    public function ls($categoryId = null, $isRecommend = null, array $order = [], $limit = 6, $offset = 0)
    {
        $books = $this->model->ls($categoryId, $isRecommend, $order, $limit, $offset);
        
        return makeResult('success', $books);
    }
    
    public function one($idcode)
    {
        
        $id = $idcode;
        
        if ( !is_id($id) ) {
            return makeResult('error_idcode');
        }
        
        $one = $this->model->one($id);
        
        return makeResult('success', $one);
        
    }
    
    
}