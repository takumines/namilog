<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spots = [
            ['id' => 1, 'users_id' => 1, 'name' => 'けなし', 'place' => '宮崎', 'body' => 'texttexttexttexttexttexttexttexttexttexttexttexttext'],
            ['id' => 2, 'users_id' => 1, 'name' => 'ハウス', 'place' => '宮崎', 'body' => 'texttexttexttexttexttexttexttexttexttexttexttexttext'],
            ['id' => 3, 'users_id' => 1, 'name' => '汐汲み場', 'place' => '宮崎', 'body' => 'texttexttexttexttexttexttexttexttexttexttexttexttext'],
        ];
        
        foreach ($spots as $spot) {
            DB::table('spots')->insert([
                'name' => $spot['name'],
                'place' => $spot['place'],
                'body' => $spot['body'],
                'users_id' => $spot['users_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        
    }
}
