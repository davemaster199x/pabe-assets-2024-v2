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
                'full_name' => 'John Doe',
                'emp_id' => 'EMP001',
                'title' => 'Software Developer',
                'phone' => '123-456-7890',
                'email' => 'john.doe@example.com',
                'site_id' => 1,
                'location_id' => 1,
                'department_id' => 1,
                'notes' => 'Team lead for the project.',
            ],
            [
                'full_name' => 'Jane Smith',
                'emp_id' => 'EMP002',
                'title' => 'Project Manager',
                'phone' => '987-654-3210',
                'email' => 'jane.smith@example.com',
                'site_id' => 1,
                'location_id' => 2,
                'department_id' => 2,
                'notes' => 'Oversees project timelines.',
            ],
            // Add more seed data as needed
        ]);
    }
}
