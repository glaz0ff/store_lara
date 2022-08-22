<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
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
                'name' => 'покупатель не известен',
                'email' => 'buyer_unknown@g.g',
                'password' => bcrypt(Str::random(16)),
            ],
            [
                'name' => 'покупатель',
                'email' => 'buyer@g.g',
                'password' => bcrypt('123123'),
            ],
        ];

        \DB::table('users')->insert($data);
    }
}
