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
                'url'   => route('m_book', ['idcode' => 60152]),
                'title' => '美食供应商'
            ],
            [
                'id'    => 2,
                'pic'   => '/static/mobile/images/banner_2.jpg',
                'url'   => route('m_book', ['idcode' => 103244]),
                'title' => '精灵掌门人'
            ],
            [
                'id'    => 3,
                'pic'   => '/static/mobile/images/banner_3.jpg',
                'url'   => route('m_book', ['idcode' => 106512]),
                'title' => '大宋第一状元郎'
            ],
            [
                'id'    => 4,
                'pic'   => '/static/mobile/images/banner_canyuantu.jpg',
                'url'   => route('m_book', ['idcode' => 7815]),
                'title' => '沧元图'
            ],
            [
                'id'    => 5,
                'pic'   => '/static/mobile/images/banner_tjwcbyy.jpg',
                'url'   => route('m_book', ['idcode' => 107160]),
                'title' => '天降我才必有用'
            ],
            
        ];
        
        return makeResult('success', $data);
        
    }
    
    
}