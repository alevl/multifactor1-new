<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Nivele::create(['nivel'=>'Administrator']);
        \App\Models\Nivele::create(['nivel'=>'Franchisee']);
        \App\Models\Nivele::create(['nivel'=>'User']);
        \App\Models\Nivele::create(['nivel'=>'Read Only']);

        \App\Models\EstatusUser::create(['estatus'=>'Active']);
        \App\Models\EstatusUser::create(['estatus'=>'Inactive']);

        \App\Models\Hora::create(['id_hora'=>'00','horas'=>'00']);
        \App\Models\Hora::create(['id_hora'=>'01','horas'=>'01']);
        \App\Models\Hora::create(['id_hora'=>'02','horas'=>'02']);
        \App\Models\Hora::create(['id_hora'=>'03','horas'=>'03']);
        \App\Models\Hora::create(['id_hora'=>'04','horas'=>'04']);
        \App\Models\Hora::create(['id_hora'=>'05','horas'=>'05']);
        \App\Models\Hora::create(['id_hora'=>'06','horas'=>'06']);
        \App\Models\Hora::create(['id_hora'=>'07','horas'=>'07']);
        \App\Models\Hora::create(['id_hora'=>'08','horas'=>'08']);
        \App\Models\Hora::create(['id_hora'=>'09','horas'=>'09']);
        \App\Models\Hora::create(['id_hora'=>'10','horas'=>'10']);
        \App\Models\Hora::create(['id_hora'=>'11','horas'=>'11']);
        \App\Models\Hora::create(['id_hora'=>'12','horas'=>'12']);
        \App\Models\Hora::create(['id_hora'=>'13','horas'=>'13']);
        \App\Models\Hora::create(['id_hora'=>'14','horas'=>'14']);
        \App\Models\Hora::create(['id_hora'=>'15','horas'=>'15']);
        \App\Models\Hora::create(['id_hora'=>'16','horas'=>'16']);
        \App\Models\Hora::create(['id_hora'=>'17','horas'=>'17']);
        \App\Models\Hora::create(['id_hora'=>'18','horas'=>'18']);
        \App\Models\Hora::create(['id_hora'=>'19','horas'=>'19']);
        \App\Models\Hora::create(['id_hora'=>'20','horas'=>'20']);
        \App\Models\Hora::create(['id_hora'=>'21','horas'=>'21']);
        \App\Models\Hora::create(['id_hora'=>'22','horas'=>'22']);
        \App\Models\Hora::create(['id_hora'=>'23','horas'=>'23']);

        \App\Models\Minuto::create(['id_minuto'=>'00','minutos'=>'00']);
        \App\Models\Minuto::create(['id_minuto'=>'01','minutos'=>'01']);
        \App\Models\Minuto::create(['id_minuto'=>'02','minutos'=>'02']);
        \App\Models\Minuto::create(['id_minuto'=>'03','minutos'=>'03']);
        \App\Models\Minuto::create(['id_minuto'=>'04','minutos'=>'04']);
        \App\Models\Minuto::create(['id_minuto'=>'05','minutos'=>'05']);
        \App\Models\Minuto::create(['id_minuto'=>'06','minutos'=>'06']);
        \App\Models\Minuto::create(['id_minuto'=>'07','minutos'=>'07']);
        \App\Models\Minuto::create(['id_minuto'=>'08','minutos'=>'08']);
        \App\Models\Minuto::create(['id_minuto'=>'09','minutos'=>'09']);
        \App\Models\Minuto::create(['id_minuto'=>'10','minutos'=>'10']);
        \App\Models\Minuto::create(['id_minuto'=>'11','minutos'=>'11']);
        \App\Models\Minuto::create(['id_minuto'=>'12','minutos'=>'12']);
        \App\Models\Minuto::create(['id_minuto'=>'13','minutos'=>'13']);
        \App\Models\Minuto::create(['id_minuto'=>'14','minutos'=>'14']);
        \App\Models\Minuto::create(['id_minuto'=>'15','minutos'=>'15']);
        \App\Models\Minuto::create(['id_minuto'=>'16','minutos'=>'16']);
        \App\Models\Minuto::create(['id_minuto'=>'17','minutos'=>'17']);
        \App\Models\Minuto::create(['id_minuto'=>'18','minutos'=>'18']);
        \App\Models\Minuto::create(['id_minuto'=>'19','minutos'=>'19']);
        \App\Models\Minuto::create(['id_minuto'=>'20','minutos'=>'20']);
        \App\Models\Minuto::create(['id_minuto'=>'21','minutos'=>'21']);
        \App\Models\Minuto::create(['id_minuto'=>'22','minutos'=>'22']);
        \App\Models\Minuto::create(['id_minuto'=>'23','minutos'=>'23']);
        \App\Models\Minuto::create(['id_minuto'=>'24','minutos'=>'24']);
        \App\Models\Minuto::create(['id_minuto'=>'25','minutos'=>'25']);
        \App\Models\Minuto::create(['id_minuto'=>'26','minutos'=>'26']);
        \App\Models\Minuto::create(['id_minuto'=>'27','minutos'=>'27']);
        \App\Models\Minuto::create(['id_minuto'=>'28','minutos'=>'28']);
        \App\Models\Minuto::create(['id_minuto'=>'29','minutos'=>'29']);
        \App\Models\Minuto::create(['id_minuto'=>'30','minutos'=>'30']);
        \App\Models\Minuto::create(['id_minuto'=>'31','minutos'=>'31']);
        \App\Models\Minuto::create(['id_minuto'=>'32','minutos'=>'32']);
        \App\Models\Minuto::create(['id_minuto'=>'33','minutos'=>'33']);
        \App\Models\Minuto::create(['id_minuto'=>'34','minutos'=>'34']);
        \App\Models\Minuto::create(['id_minuto'=>'35','minutos'=>'35']);
        \App\Models\Minuto::create(['id_minuto'=>'36','minutos'=>'36']);
        \App\Models\Minuto::create(['id_minuto'=>'37','minutos'=>'37']);
        \App\Models\Minuto::create(['id_minuto'=>'38','minutos'=>'38']);
        \App\Models\Minuto::create(['id_minuto'=>'39','minutos'=>'39']);
        \App\Models\Minuto::create(['id_minuto'=>'40','minutos'=>'40']);
        \App\Models\Minuto::create(['id_minuto'=>'41','minutos'=>'41']);
        \App\Models\Minuto::create(['id_minuto'=>'42','minutos'=>'42']);
        \App\Models\Minuto::create(['id_minuto'=>'43','minutos'=>'43']);
        \App\Models\Minuto::create(['id_minuto'=>'44','minutos'=>'44']);
        \App\Models\Minuto::create(['id_minuto'=>'45','minutos'=>'45']);
        \App\Models\Minuto::create(['id_minuto'=>'46','minutos'=>'46']);
        \App\Models\Minuto::create(['id_minuto'=>'47','minutos'=>'47']);
        \App\Models\Minuto::create(['id_minuto'=>'48','minutos'=>'48']);
        \App\Models\Minuto::create(['id_minuto'=>'49','minutos'=>'49']);
        \App\Models\Minuto::create(['id_minuto'=>'50','minutos'=>'50']);
        \App\Models\Minuto::create(['id_minuto'=>'51','minutos'=>'51']);
        \App\Models\Minuto::create(['id_minuto'=>'52','minutos'=>'52']);
        \App\Models\Minuto::create(['id_minuto'=>'53','minutos'=>'53']);
        \App\Models\Minuto::create(['id_minuto'=>'54','minutos'=>'54']);
        \App\Models\Minuto::create(['id_minuto'=>'55','minutos'=>'55']);
        \App\Models\Minuto::create(['id_minuto'=>'56','minutos'=>'56']);
        \App\Models\Minuto::create(['id_minuto'=>'57','minutos'=>'57']);
        \App\Models\Minuto::create(['id_minuto'=>'58','minutos'=>'58']);
        \App\Models\Minuto::create(['id_minuto'=>'59','minutos'=>'59']);

        \App\Models\Dia::create(['Dias'=>'Monday']);
        \App\Models\Dia::create(['Dias'=>'Tuesday']);
        \App\Models\Dia::create(['Dias'=>'Wednesday']);
        \App\Models\Dia::create(['Dias'=>'Thursday']);
        \App\Models\Dia::create(['Dias'=>'Friday']);
        \App\Models\Dia::create(['Dias'=>'Saturday']);
        \App\Models\Dia::create(['Dias'=>'Sunday']);

        \App\Models\User::create(['name'=>'Multifactor',
        'propietario_id'=>1,
        'username'=>'admin',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>'1',
        'estatus_id'=>'1',
        'telefono'=>'',
        'empresa'=>'',
        ]);

        \App\Models\User::create(['name'=>'Alejandro Velasquez',
        'propietario_id'=>1,
        'username'=>'alejandro',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>'3',
        'estatus_id'=>'1',
        'telefono'=>'04241906854',
        'empresa'=>'',
        ]);

        \App\Models\User::create(['name'=>'Armando Velasquez',
        'propietario_id'=>1,
        'username'=>'armando',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>'3',
        'estatus_id'=>'1',
        'telefono'=>'',
        'empresa'=>'Safer',
        ]);

        \App\Models\User::create(['name'=>'Mecaelect',
        'propietario_id'=>1,
        'username'=>'luis',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>'2',
        'estatus_id'=>'1',
        'telefono'=>'',
        'empresa'=>'Mecaelect',
        ]);

        \App\Models\User::create(['name'=>'Safer',
        'propietario_id'=>1,
        'username'=>'safer',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>'4',
        'estatus_id'=>'1',
        'telefono'=>'',
        'empresa'=>'Mecaelect',
        ]);
    }
}
