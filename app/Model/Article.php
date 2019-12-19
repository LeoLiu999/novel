<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    
    
    public static function ls($limit = 20, $offset = 0)
    {
        $where = [];
        $where['articles.is_del'] = false;
        $order = ['articles.id', 'desc'];
        $list = self::where($where)
        ->select(
            'books.id',
            'books.category',
            'books.author', 
            'books.name as book_name',
            'articles.*'
        )
        ->join('books', function($join){
            $join->on('articles.parent_flag', '=', 'books.relation_flag')
            ->on('articles.origin_site', '=', 'books.origin_site');
        })
        ->orderBy($order[0], $order[1])
        ->limit( intval($limit) )
        ->offset( intval($offset) )
        ->get();
        
        return $list;
    }
    
    
}
