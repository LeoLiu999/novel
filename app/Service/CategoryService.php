<?php

namespace App\Service;

use App\Model\Category;

class CategoryService extends BaseService
{
    
    protected $model;
    
    public function __construct(Category $categoryModel)
    {
        $this->model = $categoryModel;
    }
    
    
    public function ls($isRecommend = null, $limit = 9)
    {
        if ( !is_id($limit) ) {
            return makeResult('error_limit');
        }
        
        $categories = $this->model->ls($isRecommend, $limit);
        return makeResult('success', $categories);
        
    }
    
    
    
}