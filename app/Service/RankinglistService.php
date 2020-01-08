<?php

namespace App\Service;

use App\Service\BaseService;
use App\Model\Book;

class RankinglistService extends BaseService{
    
    protected $bookModel;
    
    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }
    
    
    public function lsCollect()
    {
        
        $list = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
        ];
        $data = [];
        foreach ($list as $bookId) {
            
            $book = $this->bookModel->one($bookId);
            
            if ( !$book ) {
                continue;
            }
            
            $data[] = $book;
        }
        
        return makeResult('success', $data);
        
    }
    
    
    public function lsClick()
    {
        $list = [
            9,
            10,
            11,
            12,
            13,
            14,
            15,
            16,
        ];
        $data = [];
        foreach ($list as $bookId) {
            
            $book = $this->bookModel->one($bookId);
            
            if ( !$book ) {
                continue;
            }
            
            $data[] = $book;
        }
        
        return makeResult('success', $data);
    }
    
    public function lsRecommend()
    {
        $list = [
            17,
            18,
            19,
            20,
            21,
            22,
            23,
            24,
        ];
        $data = [];
        foreach ($list as $bookId) {
            
            $book = $this->bookModel->one($bookId);
            
            if ( !$book ) {
                continue;
            }
            
            $data[] = $book;
        }
        
        return makeResult('success', $data);
    }
    
}