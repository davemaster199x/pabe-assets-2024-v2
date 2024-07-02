<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_status')->insert([
            ['status_id' => 1, 'status_name' => 'Available', 'delete' => '0'],
            ['status_id' => 2, 'status_name' => 'Check out', 'delete' => '0'],
            ['status_id' => 3, 'status_name' => 'Check in', 'delete' => '0'],
            ['status_id' => 4, 'status_name' => 'Repair', 'delete' => '0'],
            ['status_id' => 5, 'status_name' => 'Disposed', 'delete' => '0'],
            ['status_id' => 6, 'status_name' => 'Sold', 'delete' => '0'],
        ]);
    }
}
