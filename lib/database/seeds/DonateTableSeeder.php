<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Model;
use Illuminate\Support\Facades\DB;

class DonateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataCategory = [
            [
                'category_name' => 'Food Pantries',
            ],
            [
                'category_name' => 'Soup Kitchens',
            ],
            [
                'category_name' => 'Food Banks',
            ],
        ];

        DB::table('donate_categories')->insert($dataCategory);

        $donateList = [
            [
                'donate_title' => "Saved by Soup - mental health help for homeless people",
                'donate_detail' => "There are approximately 1600 Soup Kitchens in London. Between them, they have only one goal: To help the 180,000 people officially designated as homeless in our capital city (data from Shelter).",
                'donate_start_time' => Carbon::createFromFormat('Y/m/d', '2020/01/15')->format('Y-m-d'),
                'donate_end_time' => Carbon::createFromFormat('Y/m/d', '2020/01/30')->format('Y-m-d'),
                'donate_goal' => 35000,
                'donate_raised' => 0,
                'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_image' => 'assets\images\portfolio\img-1.jpg',
                'category_id' => 2,
            ],
            [
                'donate_title' => "Crowdfunding to rebuild our homes destroyed in Portugal fire",
                'donate_detail' => "Help us raise funds to rebuild homes and restore the lives of people ruined by the catastrophic wildfire that swept through rural Portugal, this October.",
                'donate_start_time' => Carbon::createFromFormat('Y/m/d', '2020/01/15')->format('Y-m-d'),
                'donate_end_time' => Carbon::createFromFormat('Y/m/d', '2020/03/30')->format('Y-m-d'),
                'donate_goal' => 55000,
                'donate_raised' => 0,
                'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_image' => 'assets\images\portfolio\img-2.jpg',
                'category_id' => 1,
            ],
            [
                'donate_title' => "Operation Care Kit Detroit: Winter Homeless Survival Kit Drive",
                'donate_detail' => "This year, we're extending our efforts to provide meals as they're donated. Learn more about our monetary donation methods below. Physical clothing drop off locations to be announced soon.",
                'donate_start_time' => Carbon::createFromFormat('Y/m/d', '2020/01/05')->format('Y-m-d'),
                'donate_end_time' => Carbon::createFromFormat('Y/m/d', '2020/02/05')->format('Y-m-d'),
                'donate_goal' => 55000,
                'donate_raised' => 0,
                'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
                'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
                'donate_image' => 'assets\images\portfolio\img-3.jpg',
                'category_id' => 3,
            ]
        ];

        DB::table('donates')->insert($donateList);

        // Donate
        $donate = Model\Donate::create([
            'donate_title' => "Supply Quality Foods To Africa's Village Area",
            'donate_detail' => "We are charity, non-profit, fundraising, NGO organizations. Our activities are taken place around the world, let contribute to them with us",
            'donate_start_time' => date("Y-m-d"),
            'donate_end_time' => date("Y-m-d"),
            'donate_goal' => 18000,
            'donate_raised' => 1000.564,
            'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
            'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_image' => 'assets\images\portfolio\img-1.jpg',
            'category_id' => 1,
        ]);

        $donate = Model\Donate::create([
            'donate_title' => "Bishop O'Byrne Housing Association",
            'donate_detail' => "Our activities are taken place around the world, let contribute to them with us",
            'donate_start_time' => date("Y-m-d"),
            'donate_end_time' => date("Y-m-d"),
            'donate_goal' => 9000,
            'donate_raised' => 2654.564,
            'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
            'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_image' => 'assets\images\portfolio\img-2.jpg',
            'category_id' => 2,
        ]);

        $donate = Model\Donate::create([
            'donate_title' => "Chisholm Services for Children",
            'donate_detail' => "Our activities are taken place around the world, let contribute to them with us",
            'donate_start_time' => date("Y-m-d"),
            'donate_end_time' => date("Y-m-d"),
            'donate_goal' => 9000,
            'donate_raised' => 2654.564,
            'donate_address' => '0xaDE77C46Bab809E7cab3b0C4930d58f0F88bDaE9',
            'donate_private_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_public_key' => '7C23D8EC9590641ABAC826B8BC515B1C93E1D92C9479D35215475C4CF7607283',
            'donate_image' => 'assets\images\portfolio\img-3.jpg',
            'category_id' => 3,
        ]);
        // activity
        $activity_1 = Model\DonateActivity::create([
            'activity_name' => '1Sponsor meals for 50 children for 1 full year.',
        ]);

        $activity_2 =Model\DonateActivity::create([
            'activity_name' => 'Sponsor mid-day meals for one month.',
        ]);

        $activity_3 =Model\DonateActivity::create([
            'activity_name' => 'You can donate clothes, blankets and ect...',
        ]);

        $activity_4 =Model\DonateActivity::create([
            'activity_name' => 'You can donate food material like rice, veggies.',
        ]);

        // join donates and activity
        Model\JoinDonatesActivity::create([
            'donate_id' => $donate->id,
            'activity_id' => $activity_1->id,
        ]);

        Model\JoinDonatesActivity::create([
            'donate_id' => $donate->id,
            'activity_id' => $activity_2->id,
        ]);

        Model\JoinDonatesActivity::create([
            'donate_id' => $donate->id,
            'activity_id' => $activity_3->id,
        ]);

        Model\JoinDonatesActivity::create([
            'donate_id' => $donate->id,
            'activity_id' => $activity_4->id,
        ]);

        // location

        Model\Locations::create([
            'location_name' => 'Alaska',
        ]);

        Model\Locations::create([
            'location_name' => 'California',
        ]);

        $location = Model\Locations::create([
            'location_name' => 'New York',
        ]);

        // join donates and activity
        Model\JoinDonatesLocation::create([
            'donate_id' => $donate->id,
            'location_id' => $location->id,
        ]);

        // donate history
        Model\DonateHistory::create([
            'value' => 350,
            'hash' => "0x7fa55cf74e28dde06565d80f58db0d9c44560b9bb30f61d638abad85e4da8cee",
            'donate_id' => $donate ->id,
            'user_id' => "1",
        ]);
    }
}
