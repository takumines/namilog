<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 6)->create();

        DB::table('users')->insert([
            'name' => '波のり太朗',
            'stance' => 1,
            'board' => 1,
            'introduction' => 'testtest',
            'email' => 'testsurf@dummy',
            'email_verified_at' => now(),
            'password' => bcrypt('testtest'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
