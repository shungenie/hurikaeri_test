<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReflectionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reflection_types')->truncate();
        $params = [
            [
                'name' => '人格',
            ],
            [
                'name' => '学習',
            ],
        ];
        DB::table('reflection_types')->insert($params);
    }
}
