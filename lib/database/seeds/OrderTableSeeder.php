<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'order_total' => 75.56,
                'order_tax' => 7.556,
                'order_address' => "0x5968b664460d17d35650932618eff7233d7401de",
                'hash' => "0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93",
            ],
            [
                'order_total' => 150.46,
                'order_tax' => 15.046,
                'order_address' => "0x5968b664460d17d35650932618eff7233d7401de",
                'hash' => "0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93",
            ],
            [
                'order_total' => 97.76,
                'order_tax' => 9.776,
                'order_address' => "0x5968b664460d17d35650932618eff7233d7401de",
                'hash' => "0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93",
            ],
            [
                'order_total' => 67.41,
                'order_tax' => 6.741,
                'order_address' => "0xda605fd5e003e6de0f33f6474080623fa6483e3e",
                'hash' => "0x6a0082aec4a0c999a0e5eb6bbcf71a43c3723be7bcdc999ff045dcd6bfe4ad93",
            ],
        ];

        DB::table('orders')->insert($order);

        $dataProductOrder = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 15,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 2,
                'price' => 10.36,
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 1,
                'price' => 15.36,
            ],
            [
                'order_id' => 2,
                'product_id' => 4,
                'quantity' => 4,
                'price' => 15.36,
            ],
            [
                'order_id' => 3,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 67.36,
            ],
            [
                'order_id' => 4,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 64.36,
            ],
        ];

        // join donates and activity
        DB::table('join_orders_products')->insert($dataProductOrder);
    }
}
