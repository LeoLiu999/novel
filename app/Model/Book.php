<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    
    
    public static function ls($categoryId = null, $isRecommend = null, $order = [], $limit = 6, $offset = 0)
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
    
    
}
