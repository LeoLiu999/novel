<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    protected $suffix = null;
    
    
    
    // 设置表后缀
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        if ($suffix !== null) {
            $this->table = $this->getTable() . '_' . $suffix;
        }
    }
    
    
    // 提供一个静态方法设置表后缀
    public static function suffix($suffix)
    {
        $instance = new static;
        $instance->setSuffix($suffix);
        
        return $instance->newQuery();
    }
    
    public static function buildSuffix($hashId){
        return $hashId % 30;
    }
    
    public static function one($bookId, $id)
    {
        $where = [];
        $where['is_del'] = false;
        $where['id'] = $id;
        
        return self::suffix(self::buildSuffix($bookId))->where($where)
        ->select(
            'id',
            'title',
            'content',
            'create_time',
            'book_id'
         )
         ->first();
        
    }
    
    public static function ls()
    {
        
    }
    
    
    public static function lastOne($bookId)
    {
        $where = [];
        $where['is_del'] = false;
        $where['book_id'] = $bookId;
        
        return self::suffix(self::buildSuffix($bookId))->where($where)
        ->select(
            'id',
            'title',
            'content',
            'create_time',
            'book_id'
        )->latest('sort_weight')
        ->first();
    }
    
    /*
    
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
    */
    /*
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
    */
    
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
