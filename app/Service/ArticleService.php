<?php

namespace App\Service;

use App\Model\Article;
use App\Model\Book;

class ArticleService extends BaseService
{
    protected $model;
    protected $bookModel;
    
    public function __construct(Article $articleModel, Book $bookModel)
    {
        $this->model = $articleModel;
        $this->bookModel = $bookModel;
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
    public function one($idcode, $bookIdcode)
    {
        
        $id = $idcode;
        
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        $bookId = $bookIdcode;
        
        if ( !is_id($bookId) ) {
            makeResult('error_bookid');
        }
        
        $book = $this->bookModel::one($bookId);
        if ( !$book ) {
            return makeResult('error_book');
        }
        
        $one = $this->model::one($id, $bookId);
        if ( !$one || $one['book_id'] != $bookId ) {
            return makeResult('error_article');
        }
        
        $one['book'] = $book;
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
        
        $one = $this->model::one($id, $bookId);
        if ( !$one ) {
            return makeResult('error_one');
        }
        
        $nextOne = $this->model::nextOne($bookId, $one['sort_weight']);
        return makeResult('success', $nextOne);
    }
    
    public function prevOne($id, $bookId)
    {
        if ( !is_id($id) ) {
            return makeResult('error_id');
        }
        
        if ( !is_id($bookId) ) {
            return makeResult('error_id');
        }
        
        $one = $this->model::one($id, $bookId);
        if ( !$one ) {
            return makeResult('error_one');
        }
        
        $prevOne = $this->model::prevOne($bookId, $one['sort_weight']);
        return makeResult('success', $prevOne);
        
    }
    
   
    
}