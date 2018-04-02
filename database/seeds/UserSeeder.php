<?php

/* Author : Noviyanto Rachmady 
 * E-mail : novay@about.me
 * Copyright 2017 EnterWind Co. */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
	public function run() {
		DB::table('users')->truncate();
		$temp = [
			[
				'nama' => 'Noviyanto Rahmadi',
				'username' => 'novay',
				'password' => bcrypt('admin')
			]
		];
		DB::table('users')->insert($temp);
	}
}