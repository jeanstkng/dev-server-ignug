<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 7,
            'identificacion' => '1724909443',
            'nombre1' => 'CESAR',
            'nombre2' => 'MAURICIO',
            'apellido1' => 'TAMAYO',
            'apellido2' => 'LOPEZ',
            'user_name' => 'CESAR TAMAYO',
            'email' => 'ctamayo@yavirac.edu.ec',
            'password' => Hash::make('123'),
        ]);
    }
}
