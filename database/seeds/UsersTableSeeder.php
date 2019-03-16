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
            'name' => 'teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Ernani',
            'email' => 'naninmartins@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
