<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Rafael Moura',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 1,
            'profile' => 'Administrador',
        ]);
    }
}
