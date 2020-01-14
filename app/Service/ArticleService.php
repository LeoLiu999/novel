<?php

namespace App\Service;

use App\Model\Article;
use App\Model\Book;
use Illuminate\Support\Facades\Cookie;

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
        
        $requestData = [
            'book_id' => $book['relation_flag'],
            'article_id' => $one['relation_flag'],
            'origin_site' => $book['origin_site']
        ];
        
        $socketResult = $this->socketGetContent($requestData);
        
        $content = '';
        
        if ( $socketResult['msg'] == 'success' && isset($socketResult['data']['content']) && $socketResult['data']['content'] ) {
            foreach ($socketResult['data']['content'] as $p ) {
                $content .= '<p>'.$p.'</p>';
            }
            
        }
        
        $one['content'] = $content;
        
        return makeResult('success', $one);
    }
    
    public function socketGetContent(array $requestData)
    {
        
        $msg = json_encode($requestData);
        $len = strlen($msg);
        
        $host = '127.0.0.1';
        $port = 16666;
        
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            return makeResult('error_socket_create');
            //echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        }
        
        $result = socket_connect($socket, $host, $port);
        if ($result === false) {
            return makeResult('error_socket_connect');
            //echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        } 
        
        socket_write($socket, $msg, $len);
        
        $buffer = '';
        
        while (true){
            $input = socket_read($socket, 10240);
            if ( empty($input) ){
                break;
            } 
            $buffer .= $input;
        }
        socket_close($socket);
        return makeResult('success', $buffer ? json_decode($buffer, true) : null );
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
    
    public function setAlreadyRead($bookIdcode, $articleIdcode)
    {
        $key = 'already_read_book:'.$bookIdcode;
        return Cookie::queue($key, $articleIdcode, 3600*24*10000);
    }
    
    public function getAlreadyRead($bookIdcode)
    {
        $key = 'already_read_book:'.$bookIdcode;
        $alreadyReadArticleIdcode = Cookie::get($key);
        
        if ( !$alreadyReadArticleIdcode ) {
            return makeResult('success');
        }
        
        $articleId = $alreadyReadArticleIdcode;
        
        $article = $this->one($articleId, $bookIdcode);
        
        if ( $article['msg'] !== 'success' || !$article['data'] ) {
            return makeResult('error_article');
        }
        
        return makeResult('success', $article['data']);
    }
    
}