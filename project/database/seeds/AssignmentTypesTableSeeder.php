<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignment_types')->truncate();
        $params = [
            [
                'name' => 'オンライン教材',
            ],
            [
                'name' => 'POSSE 課題',
            ],
        ];
        DB::table('assignment_types')->insert($params);
    }
}
