<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TblDepartment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_department')->insert([
            [
                'department_name' => 'Department1',
                'delete' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more seed data as needed
        ]);
    }
}
