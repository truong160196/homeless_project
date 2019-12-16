<?php

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
        $auction = Model\Auction::create([
            'auction_title' => "We are charity, fundraising, NGO organizations. Our activities are taken place around the world.",
            'auction_detail' => "Vestibulum id ligula porta felis euismod semper."
                . " Donec ullamcorper nulla non metus auctor fringilla. "
                . "Maecenas sed diam eget risus varius blandit sit amet non magna. "
                ."Donec ullamcorper nulla non metus auctor fringilla. "
                ."Nullam quis risus eget urna mollis ornare vel eu leo. "
                ."Aenean lacinia bibendum nulla sed consectetur.",
            'auction_start_time'=> date("Y-m-d"),
            'auction_end_time'=> date("Y-m-d"),
            'auction_raised' => 18000,
            'product_title' => "At the Auction of the Ruby Slippers",
            'product_image' => "https://image.businessinsider.com/5d7fbe202e22af1fe5293ca0?width=1100&format=jpeg&auto=webp",
            'product_detail' => "The domes that West is building in Calabasas, which were reportedly inspired by the dome homes in Star War’s fictional planet “Tatooine.” | Courtesy of Los Angeles County Public Works",
            'production_author' => "Kanye West",
            'auction_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
            'auction_private_key'  => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'auction_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
        ]);

        // join auction and activity
        Model\JoinAuctionsActivity::create([
            'auction_id' => $auction->id,
            'activity_id' => 1,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => $auction->id,
            'activity_id' => 2,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => $auction->id,
            'activity_id' => 3,
        ]);

        Model\JoinAuctionsActivity::create([
            'auction_id' => $auction->id,
            'activity_id' => 4,
        ]);

        // join auction and location
        Model\JoinAuctionsLocation::create([
            'auction_id' => $auction->id,
            'location_id' => 1,
        ]);

        // donate history
        Model\AuctionHistory::create([
            'value' => 1585.4545,
            'hash' => "0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee",
            'auction_id' => $auction ->id,
            'user_id' => "2",
        ]);
    }
}
