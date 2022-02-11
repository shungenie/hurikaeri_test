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
                'phase_number' => 1
            ],
            [
                'week_number' => 2,
                'phase_number' => 1
            ],
            [
                'week_number' => 3,
                'phase_number' => 1
            ],
            [
                'week_number' => 4,
                'phase_number' => 2
            ],
            [
                'week_number' => 5,
                'phase_number' => 2
            ],
        ];
        DB::table('weeks')->insert($params);
    }
}
