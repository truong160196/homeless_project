<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Model;

class AuctionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Donate
        $auctionList = [
            [
                'auction_title' => "Aid to the Earthquake Victims in the Kurdish Region",
                'auction_detail' => "Vestibulum id ligula porta felis euismod semper."
                    . " Donec ullamcorper nulla non metus auctor fringilla. "
                    . "Maecenas sed diam eget risus varius blandit sit amet non magna. "
                    ."Donec ullamcorper nulla non metus auctor fringilla. "
                    ."Nullam quis risus eget urna mollis ornare vel eu leo. "
                    ."Aenean lacinia bibendum nulla sed consectetur.",
                'auction_start_time'=> Carbon::now()->addHour(-43)->format('Y-m-d H:i:s'),
                'auction_end_time'=> Carbon::now()->addHour(-43)->format('Y-m-d H:i:s'),
                'auction_raised' => 7500,
                'product_title' => "At the Auction of the Ruby Slippers",
                'product_image' => "\assets\images\product\img1.jpg",
                'product_detail' => "The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works",
                'production_author' => "Kanye West",
                'auction_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'auction_private_key'  => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'auction_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            ],
            [
                'auction_title' => "Food Not Bombs - Perth",
                'auction_detail' => "Vestibulum id ligula porta felis euismod semper."
                    . " Donec ullamcorper nulla non metus auctor fringilla. "
                    . "Maecenas sed diam eget risus varius blandit sit amet non magna. "
                    ."Donec ullamcorper nulla non metus auctor fringilla. "
                    ."Nullam quis risus eget urna mollis ornare vel eu leo. "
                    ."Aenean lacinia bibendum nulla sed consectetur.",
                'auction_start_time'=> Carbon::now()->addHour(43)->format('Y-m-d H:i:s'),
                'auction_end_time'=> Carbon::now()->addHour(46)->format('Y-m-d H:i:s'),
                'auction_raised' => 5500,
                'product_title' => "At the Auction of the Ruby Slippers",
                'product_image' => "\assets\images\product\img2.jpg",
                'product_detail' => "The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works",
                'production_author' => "Kanye West",
                'auction_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'auction_private_key'  => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'auction_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            ],
            [
                'auction_title' => "Chicago Coalition for the Homeless",
                'auction_detail' => "Vestibulum id ligula porta felis euismod semper."
                    . " Donec ullamcorper nulla non metus auctor fringilla. "
                    . "Maecenas sed diam eget risus varius blandit sit amet non magna. "
                    ."Donec ullamcorper nulla non metus auctor fringilla. "
                    ."Nullam quis risus eget urna mollis ornare vel eu leo. "
                    ."Aenean lacinia bibendum nulla sed consectetur.",
                    'auction_start_time'=> Carbon::now()->addHour(17)->format('Y-m-d H:i:s'),
                    'auction_end_time'=> Carbon::now()->addHour(19)->format('Y-m-d H:i:s'),
                'auction_raised' => 1200,
                'product_title' => "At the Auction of the Ruby Slippers",
                'product_image' => "\assets\images\product\img3.jpg",
                'product_detail' => "The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works",
                'production_author' => "Kanye West",
                'auction_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'auction_private_key'  => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'auction_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            ],
            [
                'auction_title' => "New England Center and Home for Veterans",
                'auction_detail' => "Vestibulum id ligula porta felis euismod semper."
                    . " Donec ullamcorper nulla non metus auctor fringilla. "
                    . "Maecenas sed diam eget risus varius blandit sit amet non magna. "
                    ."Donec ullamcorper nulla non metus auctor fringilla. "
                    ."Nullam quis risus eget urna mollis ornare vel eu leo. "
                    ."Aenean lacinia bibendum nulla sed consectetur.",
                'auction_start_time'=> Carbon::now()->addHour(7)->format('Y-m-d H:i:s'),
                'auction_end_time'=> Carbon::now()->addHour(9)->format('Y-m-d H:i:s'),
                'auction_raised' => 9500,
                'product_title' => "At the Auction of the Ruby Slippers",
                'product_image' => "\assets\images\product\img4.jpg",
                'product_detail' => "The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works",
                'production_author' => "Kanye West",
                'auction_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'auction_private_key'  => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'auction_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            ]
        ];

        DB::table('auctions')->insert($auctionList);


        // join auction and activity
        Model\JoinAuctionsActivity::create([
            'auction_id' => 1,
            'activity_id' => 1,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => 1,
            'activity_id' => 2,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => 2,
            'activity_id' => 3,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => 1,
            'activity_id' => 4,
        ]);

        // join auction and location
        Model\JoinAuctionsLocation::create([
            'auction_id' => 3,
            'location_id' => 1,
        ]);

        // donate history
        Model\AuctionHistory::create([
            'value' => 1585.4545,
            'hash' => "0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee",
            'auction_id' => 1,
            'user_id' => "2",
        ], [
            'value' => 1785.4545,
            'hash' => "0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee",
            'auction_id' => 1,
            'user_id' => "1",
        ], [
            'value' => 1905.4545,
            'hash' => "0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee",
            'auction_id' => 1,
            'user_id' => "2",
        ]);
    }
}
