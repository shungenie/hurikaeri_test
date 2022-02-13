<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeeksTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weeks')->truncate();
        $params = [
            [
                'week_number' => 1,
                'course_id' => 1
            ],
            [
                'week_number' => 2,
                'course_id' => 1
            ],
            [
                'week_number' => 3,
                'course_id' => 1
            ],
            [
                'week_number' => 4,
                'course_id' => 2
            ],
            [
                'week_number' => 5,
                'course_id' => 2
            ],
        ];
        DB::table('weeks')->insert($params);
    }
}
