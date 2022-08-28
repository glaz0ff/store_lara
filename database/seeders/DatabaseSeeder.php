<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class, StoreCategoriesTableSeeder::class]);
        \App\Models\StoreProduct::factory(100)->create();
        \App\Models\StoreBuy::factory(100)->create();
    }
}
