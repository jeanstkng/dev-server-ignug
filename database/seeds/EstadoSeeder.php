<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ignug.estados')->insert([
            'nombre' => 'ACTIVE',
        ]);
        DB::table('ignug.estados')->insert([
            'nombre' => 'INACTIVE'
        ]);
        DB::table('ignug.estados')->insert([
            'nombre' => 'DELETED'
        ]);
        DB::table('ignug.estados')->insert([
            'id' => 11,
            'nombre' => 'IN_PROCESO'
        ]);

        DB::table('ignug.estados')->insert([
            'id' => 12,
            'nombre' => 'FINISHED'
        ]);
    }
}
