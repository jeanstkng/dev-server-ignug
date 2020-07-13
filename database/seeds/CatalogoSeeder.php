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
        //        Jornada Actividades  Principal
        DB::table('catalogos')->insert([
            'codigo' => 'jornada',
            'nombre' => 'Jornada',
            'tipo' => 'jornada_actividades.principal',
            'icono' => 'pi pi-calendar',
            'estado_id' => 1,
        ]);

        //        Jornada Actividades Secundaria
        DB::table('catalogos')->insert([
            'codigo' => 'almuerzo',
            'nombre' => 'Almuerzo',
            'tipo' => 'jornada_actividades.secundaria',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);

        //        Jornada Activiades Procesos
        DB::table('catalogos')->insert([
            'codigo' => 'academico',
            'nombre' => 'ACADEMICO',
            'tipo' => 'jornada_actividades.procesos',
            'icono' => 'pi pi-calendar',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo' => 'administrativo',
            'nombre' => 'ADMINISTRATIVO',
            'tipo' => 'jornada_actividades.procesos',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo' => 'vinculacion',
            'nombre' => 'VINCULACION',
            'tipo' => 'jornada_actividades.procesos',
            'icono' => 'pi pi-calendar',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo' => 'investigacion',
            'nombre' => 'INVESTIGACION',
            'tipo' => 'jornada_actividades.procesos',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);

        //        Docente Activiades ACADEMICO
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '1',
            'nombre' => 'IMPARTIR CLASES PRESENCIALES, VIRTUALES O EN LINEA',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '2',
            'nombre' => 'PREPARACION Y ACTUALIZACION DE CLASES, SEMINARIOS, TALLERES Y OTROS',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '3',
            'nombre' => 'DISEÑO Y ELABORACION DE GUIAS, MATERIAL DIDACTICO Y SYLLABUS',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '4',
            'nombre' => 'ORIENTACION Y ACOMPAÑAMIENTO A TRAVES DE TUTORIAS PRESENCIALES O VIRTUALES, INDIVIDUALES O GRUPALES',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '5',
            'nombre' => 'ELABORACION DE REPORTES DE NIVEL ACADEMICO REFERENTE A EVALUACIONES, TRABAJOS Y RENDIMIENTO DEL ESTUDIANTE',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '6',
            'nombre' => 'VISITAS DE CAMPO',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 3,
            'codigo' => '7',
            'nombre' => 'PREPARACION, ELABORACION, APLICACION Y CALIFICACION DE EXAMENES Y  PRACTICAS ',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);

        //        Docente Activiades ADMINISTRATIVO
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 4,
            'codigo' => '1',
            'nombre' => 'PARTICIPACION EN PROCESOS DEL SISTEMA NACIONAL DE EVALUACION PARA INGRESO A UNIVERSIDADES',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 4,
            'codigo' => '2',
            'nombre' => 'ACTIVIDADES DE DIRECCION O GESTION EN SUS DISTINTOS NIVEL ES DE ORGANIZACION ACADEMICA E INSTITUCIONAL',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 4,
            'codigo' => '3',
            'nombre' => 'REUNIONES DE ORGANO COLEGIADO SUPERIOR',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 4,
            'codigo' => '4',
            'nombre' => 'DISEÑO DE PROYECTOS DE CARRERAS Y PROGRAMAS DE ESTUDIOS',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 4,
            'codigo' => '5',
            'nombre' => 'ACTIVIDADES RELACIONADAS CON LA EVALUACION INSTITUCIONAL EXTERNA',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);

        //        Docente Activiades VINCULACION
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 5,
            'codigo' => '1',
            'nombre' => 'DIRECCION SEGUIMIENTO Y EVALUACION DE PRACTICAS PRE PROFESIONALES',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 5,
            'codigo' => '2',
            'nombre' => 'DISEÑO E IMPARTICION DE CURSOS DE EDUCACION CONTINUA O DE CAPACITACION Y ACTUALIZACION',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 5,
            'codigo' => '3',
            'nombre' => 'PARTICIPACION EN ACTIVIDADES DE PROYECTOS SOCIALES, ARTISTICOS, PRODUCTIVOS Y EMPRESARIALES DE VINCULACION CON LA SOCIEDAD',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 5,
            'codigo' => '4',
            'nombre' => 'ELABORACION DE INFORMES DE SEGUIMIENTO DE PROYECTOS DE VINCULACION',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);

        //        Docente Activiades INVESTIGACION
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '1',
            'nombre' => 'GESTIONAR PROYECTOS DE INVESTIGACION, COMUNITARIOS Y/O DE EMPRENDIMIENTO',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '2',
            'nombre' => 'DIRECCION Y TUTORIAS PARA LA ELABORACION DE TRABAJOS PARA LA OBTENCION DE TITULO',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '3',
            'nombre' => 'DIRECCION Y PARTICIPACION DE PROYECTOS DE INVESTIGACION E INNOVACION BASICA, APLICADA, TECNOLOGICA',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '4',
            'nombre' => 'REALIZACION DE INVESTIGACION PARA LA RECUPERACION, FORTALECIMIENTO Y POTENCIAC ION DE LOS SABERES ANCESTRALES',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '5',
            'nombre' => 'PARTICIPACION EN CONGRESOS, SEMINARIOS Y CONFERENCIAS PARA LA PRESENTACION DE AVANCES Y RESULTADOS DE SUS INVESTIGACIONES',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '6',
            'nombre' => 'DISEÑO, GESTION Y PARTICIPACION EN REDES Y PROGRAMAS DE INVESTIGACION LOCAL NACIONAL E INTERNACIONAL',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '7',
            'nombre' => 'PARTICIPACION EN COMITES O CONSEJOS ACADEMICOS Y EDITORIALES DE REVISTAS CIENTIFICAS Y
                         ACADEMICAS INDEXADAS, Y DE ALTO IMPACTO CIENTIFICO O ACADEMICO',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
        DB::table('catalogos')->insert([
            'codigo_padre_id' => 6,
            'codigo' => '8',
            'nombre' => 'DIFUSION DE RESULTADOS Y BENEFICIOS SOCIALES DE LA INVESTIGACION, A TRAVES DE PUBLICACIONES,
                         PRODUCCIONES ARTISTICAS, ACTUACIONES, CONCIERTOS, CREACION U ORGANIZACION DE INSTALACIONES Y
                         DE EXPOSICIONES, ENTRE OTROS',
            'tipo' => 'docente_actividades.actividades',
            'icono' => 'pi pi-briefcase',
            'estado_id' => 1,
        ]);
    }
}
