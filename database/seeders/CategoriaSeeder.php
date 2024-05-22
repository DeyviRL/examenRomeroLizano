<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;
use Illuminate\Support\Str;
use App\Models\Estudiante;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Estudiante::create([
                'codigo' => 'EST'.$i, 
                'nombres' => 'Estudiante '.$i, 
                'apellidos' => 'Apellido'.$i, 
                'edad' => rand(15, 25), 
                'promedio' => rand(50, 100) / 10,
            ]);
        }
    }
}
