<?php

use Illuminate\Database\Seeder;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogos')->insert([
            'codigo' => 'jornada',
            'nombre' => 'Jornada',
            'tipo' => 'jornada_actividades',
            'icono' => 'pi pi-calendar',
            'estado' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo' => 'almuerzo',
            'nombre' => 'Almuerzo',
            'tipo' => 'jornada_actividades',
            'icono' => 'pi pi-briefcase',
            'estado' => 1,
        ]);
    }
}
