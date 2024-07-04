<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class TblPersons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_persons')->insert([
            [
                'person_name' => 'Juan Dela Cruz',
                'person_type' => 'type1',
                'person_contact' => '09269435280',
                'delete' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more seed data as needed
        ]);
    }
}
