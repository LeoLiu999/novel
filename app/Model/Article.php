<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    
    
    public function ls($bookId = null, array $order = [],  $limit = 20, $offset = 0)
    {
        $where = [];
        $where['articles.is_del'] = false;
        
        is_id($bookId) && $where['articles.book_id'] = $bookId;
        
        $order = $order ?: $order = ['articles.sort_weight', 'desc'];
        
        $list = $this->where($where)
        ->select(
            'books.id as book_id',
            'books.category',
            'books.category_id',
            'books.author', 
            'books.name as book_name',
            'articles.id',
            'articles.title',
            'articles.content',
            'articles.create_time'
        )
        ->join('books', function($join){
            $join->on('articles.book_id', '=', 'books.id');
        })
        ->orderBy($order[0], $order[1])
        ->limit( intval($limit) )
        ->offset( intval($offset) )
        ->get();
        
        return $list;
    }
    
    public function one($id)
    {
        
        $where = [];
        $where['is_del'] = false;
        $where['id'] = $id;
        
        return $this->where($where)
        ->first();
    }
    
    
}
