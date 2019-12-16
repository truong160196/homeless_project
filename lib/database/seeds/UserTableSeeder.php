<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
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
            'status' => 1,
            'role_id' => $roleAdmin->id,
            'last_update_password' => date("Y-m-d H:i:s.v"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s.v"),
            'updated_at' => date("Y-m-d H:i:s.v")
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
            'status' => 1,
            'role_id' => $roleUser->id,
            'last_update_password' => date("Y-m-d H:i:s.v"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s.v"),
            'updated_at' => date("Y-m-d H:i:s.v")
        ]);

        $roleHomeless = Role::create(['name' => 'Homeless', 'guard_name' => 'web']);

        // Homeless
        Model\MUser::create([
            'access_key' => Hash::make('0900000000'),
            'phone' => '0900000000',
            'full_name' => 'Homeless',
            'email' => 'homeless@admin.com',
            'birthday' => '16-01-1996',
            'username' => 'homeless',
            'password' => Hash::make('123456'),
            'code' => Str::random(5),
            'status' => 1,
            'role_id' => $roleHomeless->id,
            'last_update_password' => date("Y-m-d H:i:s.v"),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s.v"),
            'updated_at' => date("Y-m-d H:i:s.v")
        ]);
    }
}
