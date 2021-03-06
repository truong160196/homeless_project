<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(DonateTableSeeder::class);
        $this->call(AuctionTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
