<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoComprobante;
use Illuminate\Support\Str;

class TipoComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $codigo = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3) . mt_rand(1000, 9999);
            TipoComprobante::create([
                'codigo' => $codigo,
                'descripcion' => 'descripcion' . $i . '.jpg',
            ]);
        }
    }
}
