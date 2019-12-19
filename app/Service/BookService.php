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
    
    public function ls($categoryId = null, $isRecommend = null, $order = [], $limit = 6, $offset = 0)
    {
        $books = $this->model->ls($categoryId, $isRecommend, $order, $limit, $offset);
        
        return makeResult('success', $books);
    }
    
    
}