<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'codigo' => '1',
            'nombre' => 'COORDINADOR',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '2',
            'nombre' => 'ESTUDIANTE',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '3',
            'nombre' => 'SECRETARIA',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '4',
            'nombre' => 'VICERRECTOR',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '5',
            'nombre' => 'ADMINISTRADOR',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '6',
            'nombre' => 'RECTOR',
            'estado_id' => 1
        ]);
        DB::table('roles')->insert([
            'codigo' => '7',
            'nombre' => 'DOCENTE',
            'estado_id' => 1
        ]);
    }
}
