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
            'senha' => bcrypt('123456'),
            'status' => 1,
            'profile' => 'Administrador',
        ]);
    }
}
