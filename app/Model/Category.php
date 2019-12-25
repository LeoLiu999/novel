<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';
    
    
    public static function ls($isRecommend = null, $limit = 100)
    {
        $where = [
            'is_del' => false,
        ];
        
        isset($isRecommend) && $where['is_recommend'] = boolval($isRecommend);
        return  self::where($where)
                ->orderBy('sort_weight', 'desc')
                ->limit($limit)
                ->get();
    }
    
    
    public static function one($id)
    {
        $where = [
            'is_del' => false,
            'id' => $id
        ];
        
        return  self::where($where)
        ->select(
            'id',
            'name'
        )
        ->first();
        
    }
    
}