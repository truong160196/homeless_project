<?php

use Illuminate\Database\Seeder;
use App\Model;

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
        ];

        DB::table('donate_categories')->insert($dataCategory);

        $roleAdmin = Model\DonateCategory::create([
            'category_name' => 'Food Banks',
        ]);

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
            'category_id' => $roleAdmin->id,
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
