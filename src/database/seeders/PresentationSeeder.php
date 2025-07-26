<?php

namespace Database\Seeders;

use App\Models\Presentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $presentations = [
            [
                'name' => 'Unidad',
                'quantity' => 1,
                'unit' => 'Uni.',
            ],
            [
                'name' => 'Bolsa',
                'quantity' => 1,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Bolsa',
                'quantity' => 42.5,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Bolsa',
                'quantity' => 2,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Bolsa',
                'quantity' => 0.5,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Balde',
                'quantity' => 5,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Balde',
                'quantity' => 2.5,
                'unit' => 'Kg.',
            ],
            [
                'name' => 'Paquete',
                'quantity' => 1000,
                'unit' => 'Uni.',
            ],
            [
                'name' => 'Paquete',
                'quantity' => 500,
                'unit' => 'Uni.',
            ],
            [
                'name' => 'Rollo',
                'quantity' => 100,
                'unit' => 'Mts.',
            ],
        ];

        foreach ($presentations as $presentation) {
            Presentation::create($presentation);
        }
    }
}
