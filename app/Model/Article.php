<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    
    
    public static function ls($categoryId = null, $bookId = null, array $order = [],  $limit = 20, $offset = 0)
    {
        $where = [];
        $where['articles.is_del'] = false;
        
        is_id($bookId) && $where['articles.book_id'] = $bookId;
        is_id($categoryId) && $where['books.category_id'] = $categoryId;
        
        $order = $order ?: $order = ['articles.sort_weight', 'desc'];
        
        $list = self::where($where)
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
    
    public static function one($id)
    {
        
        $where = [];
        $where['articles.is_del'] = false;
        $where['articles.id'] = $id;
        
        return self::where($where)
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
        ->first();
    }
    
    
    public static function nextOne($id, $bookId)
    {
        $where = [];
        $where['articles.is_del'] = false;
        $where[] = ['articles.id', '>', $id];
        
        return self::where($where)
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
        ->first();
        
    }
    
    public static function prevOne($id, $bookId)
    {
        $where = [];
        $where['articles.is_del'] = false;
        $where[] = ['articles.id', '<', $id];
        
        return self::where($where)
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
        ->first();
            
    }
    
    
}
