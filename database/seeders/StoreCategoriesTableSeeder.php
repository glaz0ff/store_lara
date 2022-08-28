<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $cName = 'Без категории';

        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0,
            'description'=>'бабуба',
        ];

        for ($i = 1; $i <= 10; $i++)
        {
            $cName = 'Категория №'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title' => $cName,
                'slug' => Str::slug($cName),
                'parent_id' => $parentId,
                'description'=>'бабуба',
            ];
        }
        \DB::table('store_categories')->insert($categories);
    }
}
