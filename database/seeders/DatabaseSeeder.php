<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        //$this->call(EstudianteTableSeeder::class);
        $this->call(TrabajadorSocialSeeder::class);
    }
}
