<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name' => '玄幻奇幻',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 9,
                'create_time' => time()
            ],
            [
                'name' => '武侠修真',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 8,
                'create_time' => time()
            ],
            [
                'name' => '历史军事',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 7,
                'create_time' => time()
            ],
            [
                'name' => '都市言情',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 6,
                'create_time' => time()
            ],
            [
                'name' => '科幻灵异',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 5,
                'create_time' => time()
            ],
            [
                'name' => '侦探推理',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 4,
                'create_time' => time()
            ],
            [
                'name' => '网游动漫',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 3,
                'create_time' => time()
            ],
            [
                'name' => '其他类型',
                'is_del' => 0,
                'is_recommend' => 1,
                'sort_weight' => 1,
                'create_time' => time()
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
