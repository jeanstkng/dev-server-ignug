<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // States
        factory(App\Models\State::class)->create([
            'code' => '1',
            'name' => 'ACTIVE',
            'state' => 1,
        ]);
        factory(App\Models\State::class)->create([
            'code' => '2',
            'name' => 'INACTIVE',
            'state' => 1,
        ]);
        factory(App\Models\State::class)->create([
            'code' => '3',
            'name' => 'DELETED',
            'state' => 1,
        ]);

        // Workday Principal
        factory(App\Models\Catalogue::class)->create([
            'code' => 'work',
            'name' => 'Jornada',
            'type' => 'workdays.principal',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);

        // Workday Secundary
        factory(App\Models\Catalogue::class)->create([
            'code' => 'lunch',
            'name' => 'Almuerzo',
            'type' => 'workdays.secondary',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);

        // Task Processes
        factory(App\Models\Catalogue::class)->create([
            'code' => 'academic',
            'name' => 'ACADEMICO',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'code' => 'administrative',
            'name' => 'ADMINISTRATIVO',
            'type' => 'tasks.processes',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'code' => 'entailment',
            'name' => 'VINCULACION',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'code' => 'investigation',
            'name' => 'INVESTIGACION',
            'type' => 'tasks.process',
            'icon' => 'pi pi-calendar',
            'state_id' => 1,
        ]);

        // Task Subprocesses academic
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '1',
            'name' => 'IMPARTIR CLASES PRESENCIALES, VIRTUALES O EN LINEA',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '2',
            'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '3',
            'name' => 'DISEÑO Y ELABORACION DE GUIAS, MATERIAL DIDACTICO Y SYLLABUS',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '4',
            'name' => 'ORIENTACION Y ACOMPAÑAMIENTO A TRAVES DE TUTORIAS PRESENCIALES O VIRTUALES, INDIVIDUALES O GRUPALES',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '5',
            'name' => 'ELABORACION DE REPORTES DE NIVEL ACADEMICO REFERENTE A EVALUACIONES, TRABAJOS Y RENDIMIENTO DEL ESTUDIANTE',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '6',
            'name' => 'VISITAS DE CAMPO',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        factory(App\Models\Catalogue::class)->create([
            'parent_code_id' => 3,
            'code' => '7',
            'name' => 'PREPARACION, ELABORACION, APLICACION Y CALIFICACION DE EXAMENES Y  PRACTICAS ',
            'type' => 'tasks.activity',
            'icon' => 'pi pi-briefcase',
            'state_id' => 1,
        ]);
        /*
                // Task Subprocesses administrative
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);

                // Task Subprocesses entailment
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);

                // Task Subprocesses investigation
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
                factory(App\Catalogue::class)->create([
                    'parent_code_id' => 3,
                    'code' => '2',
                    'name' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
                    'type' => 'tasks.activity',
                    'icon' => 'pi pi-briefcase',
                    'state_id' => 1,
                ]);
        */

        //factory(App\Models\User::class, 3)->create();
        /*
                $this->call(EstadoSeeder::class);
                $this->call(RoleSeeder::class);
                $this->call(UserSeeder::class);
                $this->call(CatalogoSeeder::class);
        */

    }
}
