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
            'name' => 'Eduardo Molina',
            'email' => 'eduardo@gmail.com',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Jovani Martinez',
            'email' => 'jovani@gmail.com',
            'password' => bcrypt('123'),
            'admin' => true 
        ]);
    }
}
