<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(AssignmentsTableSeeder::class);
        $this->call(WeeksTablesSeeder::class);
        $this->call(ReflectionTypesTableSeeder::class);
        $this->call(AssignmentTypesTableSeeder::class);
    }
}
