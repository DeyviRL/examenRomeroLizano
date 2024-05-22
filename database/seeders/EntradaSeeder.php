<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entrada;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las placas de la tabla vehiculos
        $placas = Vehiculo::pluck('placa')->toArray();

        // Generar entradas aleatorias para cada placa
        foreach ($placas as $placa) {
            Entrada::create([
                'placa' => $placa,
                'fecha' => now()->subMinutes(rand(1, 1440)), // Fecha aleatoria en los últimos 30 días
            ]);
        }
    }
}