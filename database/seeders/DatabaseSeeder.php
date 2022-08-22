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
        $this->call(UsersTableSeeder::class);
        $this->call(StoreCategoriesTableSeeder::class);
        $this->call(StoreSellersTableSeeder::class);
        \App\Models\StoreProduct::factory(100)->create();
    }
}
