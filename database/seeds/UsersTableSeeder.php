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
        \App\User::create([
            'name'	=> 'novelia',
            'email'	=> 'alifacantik@gmail.com',
            'password'	=> bcrypt('12345678')
    ]);
    }
}
