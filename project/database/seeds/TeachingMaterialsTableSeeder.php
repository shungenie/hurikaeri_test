<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachingMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teaching_materials')->truncate();
        $params = [
            [
                'week' => 1,
                'detail' => '■ N予備校 Webデザインコース
                【HTMLとCSSの基礎学習】
                N予備校：01.HTML・CSSデザインコースをはじめる方へ
                https://www.nnn.ed.nico/courses/488/chapters/6600'
            ],
            [
                'week' => 1,
                'detail' => 'N予備校：02.Webサイトとブラウザの基礎知識'
            ],
            [
                'week' => 1,
                'detail' => 'N予備校：03.HTMLとCSSを使ってみよう'
            ],
            [
                'week' => 2,
                'detail' => '■ N予備校 Webデザイン HTML・CSSデザインコース
                【HTMLとCSSの応用学習】
                01.ボタンをつくってみよう'
            ],
            [
                'week' => 2,
                'detail' => 'N予備校：02.CSSを使った自由な表現'
            ],
            [
                'week' => 2,
                'detail' => 'N予備校：03.お問い合わせフォームを作ってみよう'
            ],
        ];
        DB::table('teaching_materials')->insert($params);
    }
}
