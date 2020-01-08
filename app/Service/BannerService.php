<?php

namespace App\Service;

use App\Service\BaseService;

class BannerService extends BaseService{
    
    public function __construct()
    {
        
    }
    
    
    public function ls()
    {
        
        $data =  [
            [
                'id'    => 1,
                'pic'   => '/static/mobile/images/banner_1.jpg',
                'url'   => route('m_book', ['idcode' => 1]),
                'title' => '第一张轮播图'
            ],
            [
                'id'    => 2,
                'pic'   => '/static/mobile/images/banner_2.jpg',
                'url'   => route('m_book', ['idcode' => 2]),
                'title' => '第二张轮播图'
            ],
            [
                'id'    => 3,
                'pic'   => '/static/mobile/images/banner_3.jpg',
                'url'   => route('m_book', ['idcode' => 3]),
                'title' => '第三张轮播图'
            ]
        ];
        
        return makeResult('success', $data);
        
    }
    
    
}