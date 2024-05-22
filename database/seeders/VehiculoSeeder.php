<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Vehiculo::create([
                'placa' => 'ABC' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'modelo' => 'Modelo ' . $i,
                'propietario' => 'Propietario ' . $i,
            ]);
        }
    }
}