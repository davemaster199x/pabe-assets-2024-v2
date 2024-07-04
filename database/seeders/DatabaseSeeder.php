<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call([
            UsersTableSeeder::class,
            TblAssetsSeeder::class,
            TblStatus::class,
            TblSites::class,
            TblPersons::class,
            TblCategory::class,
            TblLocation::class,
            TblDepartment::class,
        ]);
    }
}
