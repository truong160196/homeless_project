<?php

use Illuminate\Database\Seeder;
use App\Model;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model\RedInvoice::create(
            [
                'name' => "K.O.I The International Company",
                'address' => "9682 Wakehurst Avenue Arlington Heights, IL, 60004",
                'district' => "Heights",
                'city' => "IL",
                'taxCode' => "P77744944",
            ]
        );

        Model\Store::create(
            [
                'name' => "	K.O.I The.",
                'address' => "521 Hồ Tùng Mậu, D1, HCM",
                'district' => "Ward 1",
                'city' => "HCM",
                'phone' => "3388869944",
                'logoUrl' => "",
                'red_invoice_id' => 1,
            ]
        );
    }
}
