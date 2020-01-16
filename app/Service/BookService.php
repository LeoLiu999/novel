<?php

namespace App\Service;

use App\Model\Book;
use App\Model\Article;

class BookService extends BaseService
{
    protected $model;
    protected $articleModel;
    protected $rankingListService;
    
    public function __construct(Book $bookModel, Article $articleModel, RankinglistService $rankingListService)
    {
        $this->model = $bookModel;
        $this->articleModel = $articleModel;
        $this->rankingListService = $rankingListService;
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
        
        $this->rankingListService->setRankingList($id, 'click');
        
        return makeResult('success', $one);
        
    }
    
    public function lsRandRecommend($limit = 6, $categoryId = null)
    {
        $isRecommend = true;
        $recommendList = $this->model::ls($categoryId, $isRecommend, ['sort_weight', 'desc'], 100);
        
        if ( $recommendList->isEmpty() ) {
            return makeResult('success');
        }
            
        $ids = array_column($recommendList->toArray(), 'id');
        
        $idsToKey = array_flip($ids);
        
        $idsRand = array_rand($idsToKey, $recommendList->count() > $limit ? $limit : $recommendList->count());
        
        $recommendRandList = $this->model::lsByIds($idsRand, ['sort_weight', 'desc'], $limit);
        
        return makeResult('success', $recommendRandList);
        
    }
    
    public function lsNew($categoryId = null)
    {
        $isRecommend = null;
        
        $books = $this->model::ls($categoryId, $isRecommend, ['id', 'desc'], 20, 0);
        
        return makeResult('success', $books);
    }
    
    public function lslatelyUpdate($categoryId = null)
    {
        $isRecommend = null;
        $books = $this->model::ls($categoryId, $isRecommend, ['update_article_time', 'desc'], 20, 0);
        
        
        if ( !$books->isEmpty() ) {
            
            foreach ($books as &$book) {
                
                $article = $this->articleModel->lastOne($book->id);
                $book->article = $article;
                
            }
            
        }
        
        return makeResult('success', $books);
    }
    
    
    public function lsByCategory($categoryIdCode)
    {
        
        $categoryId = $categoryIdCode;
        
        if( !is_id($categoryId) ) {
            return makeResult('error_category');
        }
        
        $books = $this->model::lsByCategory($categoryId);
        
        return makeResult('success', $books);
        
    }
    
    public function countByCategory($categoryId)
    {
        
        $count = $this->model::countByCategory($categoryId);
        
        return makeResult('success', $count);
        
    }
    
    public function lsFinished()
    {
        $books = $this->model::lsFinished();
        
        return makeResult('success', $books);
    }
    
    public function search($keyword, $limit = 12)
    {
        
        if ( !$keyword ) {
            return makeResult('error_keyword');
        }
        
        $books = $this->model::search($keyword, $limit);
        
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
        
        return $this->rankingListService->setRankingList($bookId, 'recommend');
    }
    
}