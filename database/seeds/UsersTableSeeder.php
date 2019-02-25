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
        DB::table('tai_khoan')->truncate();
        App\User::create([
        	
        	'username' =>'ntb',
        	'password' => bcrypt('12345678')
        ]);
    }
}
