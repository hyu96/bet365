<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
            'name' => 'admin',
            'email' => 'altplus@gmail.com',
            'password' => bcrypt('altplus'),
            'role' => 1
        ]);
    }
}
