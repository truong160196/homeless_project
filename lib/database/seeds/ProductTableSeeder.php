<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataProduct = [
            [
                'product_name' => "Meat Products",
                'product_price' => 34,
                'product_sku' => 'ST1',
                'product_image' => "https://www.rednewswire.com/wp-content/uploads/2018/04/frozenmeat1.jpeg",
            ],
            [
                'product_name' => "Chicken Products",
                'product_price' => 15,
                'product_sku' => 'ST2',
                'product_image' => "https://nationalpostcom.files.wordpress.com/2018/04/gettyimages-98130644.jpg",
            ],
            [
                'product_name' => "Waitrose Homebaking",
                'product_price' => 78,
                'product_sku' => 'ST3',
                'product_image' => "https://www.britishcornershop.co.uk/img/cat/134.jpg",
            ],
            [
                'product_name' => "Seafood",
                'product_price' => 28,
                'product_sku' => 'ST4',
                'product_image' => "https://www.britishcornershop.co.uk/img/cat/60.jpg",
            ],
            [
                'product_name' => "Cooking Chocolate",
                'product_price' => 3.29,
                'product_sku' => 'ST5',
                'product_image' => "https://www.britishcornershop.co.uk/img/thumb/QWOP3224.jpg",
            ],
            [
                'product_name' => "Browse Waitrose Cereals",
                'product_price' => 32.29,
                'product_sku' => 'ST6',
                'product_image' => "https://www.britishcornershop.co.uk/img/cat/142.jpg",
            ],
        ];

        DB::table('products')->insert($dataProduct);

        $dataProductStore = [
            [
                'store_id' => 4,
                'product_id' => 1,
            ],
            [
                'store_id' => 4,
                'product_id' => 2,
            ],
            [
                'store_id' => 4,
                'product_id' => 3,
            ],
            [
                'store_id' => 4,
                'product_id' => 4,
            ]
        ];

        // join donates and activity
        DB::table('join_products_stores')->insert($dataProductStore);

    }
}
