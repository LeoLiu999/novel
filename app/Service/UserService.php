<?php

namespace App\Service;

use App\Service\BaseService;
use App\Model\Book;
use Illuminate\Support\Facades\Cookie;

class UserService extends BaseService
{
    protected $bookModel;
    protected $myBookrackCookieName = 'Cookie_MyBookrackCookie';
    protected $rankingListService;
    
    public function __construct(Book $bookModel, RankinglistService $rankingListService)
    {
        $this->bookModel = $bookModel;
        $this->rankingListService = $rankingListService;
    }
    
    public function setMyBookrack($userId, $bookIdcode)
    {
        
        $bookId = $bookIdcode;
        
        if ( !is_id($bookId)  ) {
            return makeResult('error_bookid');
        }
        
        $book = $this->bookModel->one($bookId);
        
        if ( !$book ) {
            return makeResult('error_book');
        }
        
        $this->setMyBookrackCookie(
            [
                $bookIdcode => ['book_idcode' => $bookIdcode]
            ]
        );
        
        $this->rankingListService->setRankingList($bookId, 'collect');
        
        return makeResult('success');
    }
    
    public function lsMyBookrack($userId)
    {
        
        $myBookrackCookie = $this->getMyBookrackCookie();
        
        if ( !$myBookrackCookie ) {
            return makeResult('success');
        }
        
        $return = [];
        foreach ($myBookrackCookie as $val){
            
            $bookId = $val['book_idcode'];
            $book = $this->bookModel->one($bookId);
            
            if( !$book ) {
                continue;
            }
            
            $return[] = $book;
        }
        
        return makeResult('success', $return);
    }
    
    protected function getMyBookrackCookie()
    {
        
        $mybookrack = Cookie::get($this->myBookrackCookieName);
        
        if ( $mybookrack ) {
            return unserialize($mybookrack);
        }
        
        return false;
        
    }
    
    protected function setMyBookrackCookie(array $data)
    {
        
        $myBookrackCookie = $this->getMyBookrackCookie();
        if ( $myBookrackCookie ) {
            
            $array = $data + $myBookrackCookie;
            
        } else {
            $array = $data;
        }
        
        return Cookie::queue($this->myBookrackCookieName, serialize($array), 3600*24*10000);
    }
    
    
    
}