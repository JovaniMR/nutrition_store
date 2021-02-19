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
            'name' => 'Usuario de prueba',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'admin' => true 
        ]);
    }
}
