<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->truncate();
        $params = [
            [
                'name' => 'HTML,CSS,JavaScriptコース',
            ],
            [
                'name' => 'PHP,Dockerコース',
            ],
            [
                'name' => 'Laravelコース',
            ],
            [
                'name' => 'Webアプリ開発基礎知識コース',
            ],
            [
                'name' => 'AWSコース',
            ],
            [
                'name' => 'Linuxコース',
            ],
        ];
        DB::table('courses')->insert($params);
    }
}
