<?php

use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Andres Carranza',
            'email' => 'diacarry@gmail.com',
            'password' => bcrypt('Admin123'),
            'nickname' => 'Diacarry',
            'city' => 'carrera 1a # 11a - 11',
            'perfil' => 'Administrador',
        ]);
    }
}
