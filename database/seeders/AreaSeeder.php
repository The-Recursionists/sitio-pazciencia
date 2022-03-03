<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['title' => 'Nutrición']);
        Area::create(['title' => 'Legal']);
        Area::create(['title' => 'Relaciones Internacionales']);
        Area::create(['title' => 'Psicología']);
        Area::create(['title' => 'Comunicación']);
        Area::create(['title' => 'Pedagogía']);
        Area::create(['title' => 'Dirección y Planeamiento']);
    }
}
