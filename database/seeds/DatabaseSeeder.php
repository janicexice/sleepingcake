<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        'username'=>'admin',          // 帳號
        'password'=>bcrypt('wmmkslab'),  // 密碼
    ]);
        // $this->call(UserSeeder::class);
    }
}
