<?php

namespace App\Service;

use App\Service\BaseService;
use App\Model\Book;
use Illuminate\Support\Facades\Redis;

class RankinglistService extends BaseService{
    
    protected $bookModel;
    protected static $rankListRedisKey = [
        'recommend' => 'rankinglist_recommend',
        'click'     => 'rankinglist_click',
        'collect'   => 'rankinglist_collect'
    ];
    
    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }
    
    public function lsRankList($type, $start = 0, $stop = 30)
    {
        $list = $this->getRankingList($type, $start, $stop);
        
        if( $list['msg'] !== 'success' || !$list['data'] ) {
            return $list;
        }
        
        $data = [];
        foreach ($list['data'] as $bookId => $score) {
            $start++;
            $book = $this->bookModel->one($bookId);
            
            if ( !$book ) {
                continue;
            }
            
            $book['score'] = $score;
            $book['rank'] = $start;
            
            $data[] = $book;
        }
        
        return makeResult('success', $data);
    }
    
    public function setRankingList($bookId, $type)
    {
        
        $key = $this->buildRedisKey($type);
        
        if ( !$key ) {
            return makeResult('error_type');
        }
        
        if ( Redis::zIncrBy($key, 1, $bookId) ) {
            return makeResult('success');
        }
        
        return makeResult('error_set');
        
    }
    
    protected function getRankingList($type, $start = 0, $stop = 20)
    {
        $key = $this->buildRedisKey($type);
        
        if ( !$key ) {
            return makeResult('error_type');
        }
        
        $list = Redis::zRevRange($key, $start, $stop, true);
        
        return makeResult('success', $list);
    }
    
    
    protected function buildRedisKey($type)
    {
        $type = strtolower($type);
        return isset(self::$rankListRedisKey[$type]) ? self::$rankListRedisKey[$type] : false;
    }
    
}