<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyTimeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_time_types')->truncate();
        $params = [
            [
                'name' => '復習',
            ],
            [
                'name' => '今週の課題',
            ],
        ];
        DB::table('study_time_types')->insert($params);
    }
}
