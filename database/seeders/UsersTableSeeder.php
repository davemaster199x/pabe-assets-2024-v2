<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'remember_token' => \Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Stock Custodian',
                'email' => 'user@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'user_type' => 'stock_custodian',
                'remember_token' => \Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
