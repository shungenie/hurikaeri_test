<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignments')->truncate();
        $params = [
            [
                'week' => 1,
                'assignment_type_id' => 1,
                'detail' => '■ N予備校 Webデザインコース
                【HTMLとCSSの基礎学習】
                N予備校：01.HTML・CSSデザインコースをはじめる方へ
                https://www.nnn.ed.nico/courses/488/chapters/6600'
            ],
            [
                'week' => 1,
                'assignment_type_id' => 1,
                'detail' => 'N予備校：02.Webサイトとブラウザの基礎知識'
            ],
            [
                'week' => 1,
                'assignment_type_id' => 1,
                'detail' => 'N予備校：03.HTMLとCSSを使ってみよう'
            ],
            [
                'week' => 1,
                'assignment_type_id' => 2,
                'detail' => 'Google Chromeをインストールしましたか？'
            ],
            [
                'week' => 1,
                'assignment_type_id' => 2,
                'detail' => 'Google Chromeのデベロッパーツールを使いましたか？'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 1,
                'detail' => '■ N予備校 Webデザイン HTML・CSSデザインコース
                【HTMLとCSSの応用学習】
                01.ボタンをつくってみよう'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 1,
                'detail' => 'N予備校：02.CSSを使った自由な表現'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 1,
                'detail' => 'N予備校：03.お問い合わせフォームを作ってみよう'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 2,
                'detail' => '選択肢のボックスと文字を表示出来ましたか？'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 2,
                'detail' => '「x. この地名はなんて読む？」を表示出来ましたか？'
            ],
            [
                'week' => 2,
                'assignment_type_id' => 2,
                'detail' => '選択肢のボックスと文字を表示出来ましたか？'
            ],
            [
                'week' => 3,
                'assignment_type_id' => 1,
                'detail' => '■ N予備校 Webデザインコース
                【JavaScriptの基礎を学ぶ】
                01.はじめてのJavaScript
                <a href="https://www.nnn.ed.nico/courses/488">N予備校</a>'
            ],
            [
                'week' => 3,
                'assignment_type_id' => 2,
                'detail' => '「x. この地名はなんて読む？」に緑色の下線を引けましたか？'
            ],
            [
                'week' => 3,
                'assignment_type_id' => 2,
                'detail' => '選択肢のボックスを3個並べて表示出来ましたか？'
            ],
            [
                'week' => 3,
                'assignment_type_id' => 2,
                'detail' => '選択肢のボックスを灰色で表示出来ましたか？'
            ],
            [
                'week' => 3,
                'assignment_type_id' => 2,
                'detail' => '全体的な見た目は見本サイトと同じになっていますか？'
            ],
            [
                'week' => 4,
                'assignment_type_id' => 1,
                'detail' => '■ドットインストール
                【詳解JavaScript オブジェクト編】
                https://dotinstall.com/lessons/basic_javascript_objects_v2'
            ],
            [
                'week' => 4,
                'assignment_type_id' => 1,
                'detail' => '【詳解JavaScript DOM編】
                https://dotinstall.com/lessons/basic_javascript_dom_v2'
            ],
            [
                'week' => 4,
                'assignment_type_id' => 2,
                'detail' => 'htmlファイルの中でstyle指定をしていないことを確認しましたか？'
            ],
            [
                'week' => 4,
                'assignment_type_id' => 2,
                'detail' => '全体的な見た目は見本サイトと同じになっていますか？'
            ],
            [
                'week' => 5,
                'assignment_type_id' => 1,
                'detail' => '■ N予備校 プログラミング入門コース
                【第1章 はじめよう】
                06.はじめてのJavaScript'
            ],
            [
                'week' => 5,
                'assignment_type_id' => 1,
                'detail' => '07.JavaScriptでの計算'
            ],
            [
                'week' => 5,
                'assignment_type_id' => 1,
                'detail' => '08.JavaScriptで論理を扱う'
            ],
            [
                'week' => 5,
                'assignment_type_id' => 1,
                'detail' => '09.JavaScriptのループ'
            ],
            [
                'week' => 5,
                'assignment_type_id' => 2,
                'detail' => 'htmlファイルの中でJavaScriptを記述していないことを確認しましたか？'
            ],
        ];
        DB::table('assignments')->insert($params);
    }
}
