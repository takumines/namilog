<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diaries = [
            ['id' => 1, 'spot_id' => 1, 'title' => 'test1', 'score' => '☆', 'condition' => 'ダンパー', 'size' => '膝〜腰', 'body' => 'texttexttexttexttexttexttexttexttexttexttext'],
            ['id' => 2, 'spot_id' => 1, 'title' => 'test2', 'score' => '☆☆', 'condition' => '面ツル', 'size' => '腰〜胸', 'body' => 'texttexttexttexttexttexttexttexttexttexttext'],
            ['id' => 3, 'spot_id' => 2, 'title' => 'test3', 'score' => '☆☆☆', 'condition' => 'ホレホレ', 'size' => '胸〜肩', 'body' => 'texttexttexttexttexttexttexttexttexttexttext'],
        ];

        foreach ($diaries as $diary) {
            DB::table('diaries')->insert([
                'spot_id'    => $diary['spot_id'],
                'title'      => $diary['title'],
                'score'      => $diary['score'],
                'condition'  => $diary['condition'],
                'size'       => $diary['size'],
                'body'       => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
