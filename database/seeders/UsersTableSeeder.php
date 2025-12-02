<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'image'        => 'default.png',
                'name'         => 'Super Admin',
                'username'     => 'superadmin',
                'address'      => 'Head Office',
                'phonenumber'  => '081234567890',
                'email'        => 'superadmin@example.com',
                'password'     => Hash::make('password123'),
                'role'         => 'super_admin',
                'is_active'    => 'active',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'image'        => 'default.png',
                'name'         => 'Admin',
                'username'     => 'admin',
                'address'      => 'Office',
                'phonenumber'  => '081298765432',
                'email'        => 'admin@example.com',
                'password'     => Hash::make('password123'),
                'role'         => 'admin',
                'is_active'    => 'active',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'image'        => 'default.png',
                'name'         => 'Waiter User',
                'username'     => 'waiter',
                'address'      => 'Restaurant',
                'phonenumber'  => '081233344455',
                'email'        => 'waiter@example.com',
                'password'     => Hash::make('password123'),
                'role'         => 'waiters',
                'is_active'    => 'active',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'image'        => 'default.png',
                'name'         => 'Rahmat',
                'username'     => 'rahmat',
                'address'      => 'Langensari',
                'phonenumber'  => '085659738675',
                'email'        => 'rahmat@example.com',
                'password'     => Hash::make('password123'),
                'role'         => 'waiters',
                'is_active'    => 'active',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}