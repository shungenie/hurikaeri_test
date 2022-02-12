<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generations')->truncate();
        $params = [
            [
                'generation' => 1.0,
                'is_graduated' => false,
            ],
            [
                'generation' => 1.5,
                'is_graduated' => false,
            ],
            [
                'generation' => 2.0,
                'is_graduated' => false,
            ],
        ];
        DB::table('generations')->insert($params);
    }
}
