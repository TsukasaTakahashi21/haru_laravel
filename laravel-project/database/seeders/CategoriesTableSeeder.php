<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Haru'],
            ['name' => '観光'],
            ['name' => 'ライフスタイル'],
            ['name' => 'イベント'],
            ['name' => 'グルメ'],
            ['name' => 'お知らせ'],
        ]);
    }
}
