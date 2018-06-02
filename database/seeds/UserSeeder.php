<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->delete();

		for($i = 0; $i < 10; $i++) {
			\App\User::create([
				'email' => '12345'.$i.'@qq.com',
				'password' => Hash::make(123456),
				'identy' => '1',
			]);
		}
    }
}
