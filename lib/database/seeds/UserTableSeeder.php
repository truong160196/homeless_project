<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'System Admin', 'guard_name' => 'web']);

        // System Admin
        Model\MUser::create([
            'access_key' => Hash::make('0900000000'),
            'phone' => '0900000000',
            'full_name' => 'System Admin',
            'email' => 'admin@admin.com',
            'birthday' => '16-01-1996',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'code' => Str::random(5),
            'status' => 'Active',
            'role_id' => $roleAdmin->id,
            'last_update_password' => date("Y-m-d"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);

        $roleUser = Role::create(['name' => 'User', 'guard_name' => 'web']);

        // User
        Model\MUser::create([
            'access_key' => Hash::make('0900000000'),
            'phone' => '0900000000',
            'full_name' => 'User',
            'email' => 'user@admin.com',
            'birthday' => '16-01-1996',
            'username' => 'user',
            'password' => Hash::make('123456'),
            'code' => Str::random(5),
            'status' => 'Active',
            'role_id' => $roleUser->id,
            'last_update_password' => date("Y-m-d"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);

        $roleStore = Role::create(['name' => 'Store', 'guard_name' => 'web']);

        // Homeless
        Model\MUser::create([
            'access_key' => Hash::make('0900000000'),
            'phone' => '0900000000',
            'full_name' => 'Store',
            'email' => 'store@admin.com',
            'birthday' => '16-01-1996',
            'username' => 'store',
            'password' => Hash::make('123456'),
            'code' => Str::random(5),
            'status' => 'Homeless Approve',
            'role_id' => $roleStore->id,
            'last_update_password' => date("Y-m-d"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d")
        ]);

        $roleHomeless = Role::create(['name' => 'Homeless', 'guard_name' => 'web']);

        $listHomeless = [];
        $listWallet = [];
        // Homeless
        for($i = 0; $i < 20; $i++) {
            $account = [
                'access_key' => Hash::make('0900000000'),
                'phone' => '0900000000',
                'full_name' => 'account0' . $i,
                'email' => 'homeless@admin.com',
                'birthday' => '16-01-1990',
                'username' => 'account0' . $i,
                'password' => Hash::make('123456'),
                'code' => Str::random(5),
                'status' => 'Active',
                'role_id' => $roleHomeless->id,
                'last_update_password' => date("Y-m-d"),
                'remember_token' => Str::random(10),
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
            ];

            $wallet = [
                'address' => '0x35a7bbce80d11350de693716da6a4b25baa15c99',
                'type' => 'homeless',
                'token' => 'USD',
                'pk' => '0x9218212624e1f8a368eafcb6b60bbbebfa78a8addcc8345a6cc3bd6026d3c97c',
                'public_key' => '0x0171fba45252827d8470541a6e45767fe23d41149bd7368bc014c32cba670aac106570a1a6a122604bbe7814aa860849eca88631ac8a439a1778c92ae1edf329',
                'user_id' => $i + 4,
            ];

            array_push($listHomeless, $account);
            array_push($listWallet, $wallet);
        }

        DB::table('users')->insert($listHomeless);
        DB::table('wallets')->insert($listWallet);
    }
}
