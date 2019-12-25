<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    public static function ls($categoryId = null, $isRecommend = null, array $order = [], $limit = 6, $offset = 0)
    {
        $where = [
            'is_del' => false,
        ];
        
        isset($isRecommend) && $where['is_recommend'] = boolval($isRecommend);
        
        Is_id($categoryId) && $where['category_id'] = $categoryId;
        $order = $order ?: ['sort_weight', 'desc'];
        
        return  self::where($where)
        ->orderBy($order[0], $order[1])
        ->limit( intval($limit) )
        ->offset( intval($offset) )
        ->get();
    }
    

    public static function lsByCategory($categoryId, $pageNums = 12)
    {
        $where = [
            'is_del' => false,
            'category_id' => $categoryId
        ];
        
        $order = ['sort_weight', 'desc'];
        
        return  self::where($where)
        ->orderBy($order[0], $order[1])
        ->paginate($pageNums);
        
    }
    
    public static function lsFinished($pageNums = 12)
    {
        $where = [
            'is_del' => false,
            'state' => 'finish'
        ];
        
        $order = ['sort_weight', 'desc'];
        
        return  self::where($where)
        ->orderBy($order[0], $order[1])
        ->paginate($pageNums);
        
    }
    
    
    public static function lsByIds(array $ids, array $order = [], $limit = 0, $offset = 0)
    {
        
        $where = [
            'is_del' => false,
        ];
        
        $order = $order ?: ['sort_weight', 'desc'];
        
        return  self::where($where)
        ->orderBy($order[0], $order[1])
        ->whereIn('id', $ids)
        ->limit( intval($limit) )
        ->offset( intval($offset) )
        ->get();
        
    }
    
    
    public static function one($id)
    {
        $where = [
            'books.is_del' => false,
            'books.id' => $id
        ];
        
        return  self::where($where)
        ->select(
            'books.id',
            'books.name',
            'books.author',
            'books.category_id',
            'books.words',
            'books.state',
            'books.create_time',
            'books.is_recommend',
            'books.description',
            'books.cover',
            'categories.name as category'
        )
        ->join('categories', function($join){
            $join->on('categories.id', '=', 'books.category_id');
        })
        ->first();
    }
    
    public static function search($keyword, $pageNums = 12)
    {
        $where = [
            'is_del' => false,
        ];
        
        
        
        $order = ['sort_weight', 'desc'];
        
        return  self::where($where)
        ->where(function($query) use ($keyword){
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('author', 'like', "%{$keyword}%");
        })
        ->orderBy($order[0], $order[1])
        ->paginate($pageNums);
    }
    
}
