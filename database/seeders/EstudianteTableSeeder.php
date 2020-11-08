<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudiante;
use Carbon\Carbon;

class EstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Estudiante::create([
            
            'lastnames'          => 'Blanco Carpio',
            'names'           => 'Yorman Alexander',
            'cedula'       => 'V-27049202',
            'birth_date' => '2000-01-06',
            'place_birth'     => 'La victoria',
            'sex'     => 'Masculino',
            'email' => 'test@test.com',
            'address_origin'     => 'La victoria',
            'live_residence'     => 'No',
            'admission_university'     => 0,
            'carrer_or_pnf'     => 'PNF indormatica',
            'admission_period'     => '2017',
            'semestre_trayecto'     => '3er trayecto',
            'turn'     => 'Mañana',
            'change_carrer'     => 1,          
            'created_at'     => Carbon::now(),
        ]);
    }
}
