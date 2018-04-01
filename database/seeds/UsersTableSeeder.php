<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //Creating the first user with Database Seeds
    {
        DB::table('users')->insert([
            'name' => 'First',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
