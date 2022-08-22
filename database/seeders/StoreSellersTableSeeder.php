<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreSellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'продавец не известен',
                'email' => 'seller_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
                'description' => 'ничего не продает',
            ],
            [
                'name' => 'продавец',
                'email' => 'seller@g.g',
                'password' => bcrypt('123123'),
                'description' => 'что-то продает',
            ],
        ];

        \DB::table('store_sellers')->insert($data);
    }
}
