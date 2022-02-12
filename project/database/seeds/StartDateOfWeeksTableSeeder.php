<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StartDateOfWeeksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('start_date_of_weeks')->truncate();
        $params = [
            [
                'week_id' => 1,
                'generation_id' => 1,
                'start_date' => '2022-01-31',
            ],
            [
                'week_id' => 1,
                'generation_id' => 2,
                'start_date' => '2022-01-31',
            ],
            [
                'week_id' => 1,
                'generation_id' => 3,
                'start_date' => '2022-01-31',
            ],
            [
                'week_id' => 2,
                'generation_id' => 1,
                'start_date' => '2022-02-07',
            ],
            [
                'week_id' => 2,
                'generation_id' => 2,
                'start_date' => '2022-02-07',
            ],
            [
                'week_id' => 2,
                'generation_id' => 3,
                'start_date' => '2022-02-07',
            ],
            [
                'week_id' => 3,
                'generation_id' => 1,
                'start_date' => '2022-02-14',
            ],
            [
                'week_id' => 3,
                'generation_id' => 2,
                'start_date' => '2022-02-14',
            ],
            [
                'week_id' => 3,
                'generation_id' => 3,
                'start_date' => '2022-02-14',
            ],
            [
                'week_id' => 4,
                'generation_id' => 1,
                'start_date' => '2022-02-21',
            ],
            [
                'week_id' => 4,
                'generation_id' => 2,
                'start_date' => '2022-02-21',
            ],
            [
                'week_id' => 4,
                'generation_id' => 3,
                'start_date' => '2022-02-21',
            ],
            [
                'week_id' => 5,
                'generation_id' => 1,
                'start_date' => '2022-02-28',
            ],
            [
                'week_id' => 5,
                'generation_id' => 2,
                'start_date' => '2022-02-28',
            ],
            [
                'week_id' => 5,
                'generation_id' => 3,
                'start_date' => '2022-02-28',
            ],
        ];
        DB::table('start_date_of_weeks')->insert($params);
    }
}
