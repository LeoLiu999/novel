<?php

namespace App\Service;

use App\Model\Book;
use Illuminate\Support\Facades\Redis;

class BookService extends BaseService
{
    protected $model;
    
    protected static $rankListRedisKey = [
        'recommend' => 'rankinglist_recommend'
    ];
    
    public function __construct(Book $bookModel)
    {
        $this->model = $bookModel;
    }
    
    public function ls($categoryId = null, $isRecommend = null, array $order = [], $limit = 8, $offset = 0)
    {
        $books = $this->model::ls($categoryId, $isRecommend, $order, $limit, $offset);
        
        return makeResult('success', $books);
    }
    
    public function one($idcode)
    {
        
        $id = $idcode;
        
        if ( !is_id($id) ) {
            return makeResult('error_idcode');
        }
        
        $one = $this->model::one($id);
        
        return makeResult('success', $one);
        
    }
    
    public function lsRandRecommend()
    {
        $recommendList = $this->model::ls(null, true, [], 100);
        
        if ( $recommendList->isEmpty() ) {
            return makeResult('success');
        }
        
        $limit = 6;
        
        $ids = array_column($recommendList->toArray(), 'id');
        
        $idsToKey = array_flip($ids);
        
        $idsRand = array_rand($idsToKey, $limit);
        
        $recommendRandList = $this->model::lsByIds($idsRand, [], $limit);
        
        return makeResult('success', $recommendRandList);
        
    }
    
    public function lsNew($categoryId = null)
    {
        $books = $this->model::ls($categoryId, null, ['relation_flag', 'desc'], 20, 0);
        
        return makeResult('success', $books);
    }
    
    public function lsByCategory($categoryId)
    {
        
        $books = $this->model::lsByCategory($categoryId);
        
        return makeResult('success', $books);
        
    }
    
    public function lsFinished()
    {
        $books = $this->model::lsFinished();
        
        return makeResult('success', $books);
    }
    
    public function lsRankingList()
    {
        $books = [];
        return makeResult('success', $books);
    }
    
    public function search($keyword)
    {
        
        if ( !$keyword ) {
            return makeResult('error_keyword');
        }
        
        $books = $this->model::search($keyword);
        
        return makeResult('success', $books);
    }
    
    
    public function recommend($bookIdcode)
    {
        
        $bookId = $bookIdcode;
        
        if ( !is_id($bookId) ) {
            return makeResult('error_id');
        }
        
        $book = $this->model::one($bookId);
        if ( !$book ) {
            return makeResult('error_book');
        }  
        
        $key = $this->buildRedisKey(__FUNCTION__);
        
        $set = Redis::zIncrBy($this->buildRedisKey(__FUNCTION__), 1, $book->id);
        
        if ( !$set ) {
            return makeResult('error_recommend');
        }
        
        return makeResult('success');
    }
    
    
    protected static function buildRedisKey($type)
    {
        return isset(self::$rankListRecommendRedisKey[$type]) ? self::$rankListRecommendRedisKey[$type] : false;
    }
    
    
}