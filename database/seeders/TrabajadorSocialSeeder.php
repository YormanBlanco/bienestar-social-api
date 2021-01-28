<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrabajadorSocial as Trabajador;
use Carbon\Carbon;

class TrabajadorSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trabajador = Trabajador::create([
            
            'lastnames'          => 'Rodriguez Infante',
            'names'           => 'Pedro Miguel',
            'cedula'       => 'V-15408961',
            'email' => 'test@test.com',
            'movil_phone'     => '0424-324789',
            'local_phone'     => '02413248769',
            'other_phone'     => null,
            'address'     => 'La matica',        
            'created_at'     => Carbon::now(),
        ]);
    }
}
