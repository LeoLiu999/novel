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
    
    public static function one($id, $bookId)
    {
        $where = [];
        $where['is_del'] = false;
        $where['id'] = $id;
        
        return self::suffix(self::buildSuffix($bookId))
        ->where($where)
        ->select(
            'id',
            'title',
            'create_time',
            'book_id',
            'sort_weight'
         )
         ->first();
        
    }
    
    public static function lsByBook($bookId = null)
    {
        $where = [];
        $where['is_del'] = false;
        $where['book_id'] = $bookId;
        
        return self::suffix(self::buildSuffix($bookId))
        ->where($where)
        ->select(
            'id',
            'title',
            'create_time',
            'book_id'
        )->orderBy('sort_weight', 'asc')
        ->get();
        
    }
    
    
    public static function lastOne($bookId)
    {
        $where = [];
        $where['is_del'] = false;
        $where['book_id'] = $bookId;
        
        return self::suffix(self::buildSuffix($bookId))
        ->where($where)
        ->select(
            'id',
            'title',
            'create_time',
            'book_id'
        )->latest('sort_weight')
        ->first();
    }
    
    
    public static function nextOne($bookId, $sortWeight)
    {
        $where = [];
        $where['is_del'] = false;
        $where['book_id'] = $bookId;
        $where[] = ['sort_weight', '>', $sortWeight];
        
        return self::suffix(self::buildSuffix($bookId))
        ->where($where)
        ->select(
            'id',
            'book_id',
            'title',
            'create_time'
        )
        ->orderBy('sort_weight', 'asc')
        ->first();
        
    }
    
    public static function prevOne($bookId, $sortWeight)
    {
        $where = [];
        $where['is_del'] = false;
        $where['book_id'] = $bookId;
        $where[] = ['sort_weight', '<', $sortWeight];
        
        return self::suffix(self::buildSuffix($bookId))
        ->where($where)
        ->select(
            'id',
            'book_id',
            'title',
            'create_time'
        )
        ->orderBy('sort_weight', 'desc')
        ->first();
            
    }
    
    
}
