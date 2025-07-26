<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $products = [
            [
                'name' => 'CLAVO ACERADO 1/2',
                'buy_price' => 3.2,
                'sell_price' => 4.5,
                'stock' => 50,
                'stock_min' => 50,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 9,
                'barcode' => '0000000001234',
                'visible' => true,
            ],
            [
                'name' => 'CEMENTO SOL',
                'buy_price' => 20,
                'sell_price' => 35,
                'stock' => 120,
                'stock_min' => 100,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 3,
                'barcode' => '0000000001237',
                'visible' => true,
            ],
            [
                'name' => 'CEMENTO ANDINO',
                'buy_price' => 19,
                'sell_price' => 30,
                'stock' => 80,
                'stock_min' => 100,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 3,
                'barcode' => '0000000001236',
                'visible' => true,
            ],
            [
                'name' => 'BARRA DE CONSTRUCCIÓN SP 1/2" x 9MTS',
                'buy_price' => 38,
                'sell_price' => 42.5,
                'stock' => 50,
                'stock_min' => 50,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 1,
                'barcode' => '0000000001235',
                'visible' => true,
            ],
            [
                'name' => 'BARRA DE CONSTRUCCIÓN SP 6MM x 9MTS',
                'buy_price' => 15,
                'sell_price' => 30,
                'stock' => 50,
                'stock_min' => 50,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 1,
                'barcode' => '0000000001233',
                'visible' => true,
            ],
            [
                'name' => 'BARRA DE CONSTRUCCIÓN SP 3/4" x 9MTS',
                'buy_price' => 80,
                'sell_price' => 90,
                'stock' => 30,
                'stock_min' => 30,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 1,
                'barcode' => '0000000001232',
                'visible' => true,
            ],
            [
                'name' => 'BARRA DE CONSTRUCCIÓN SP 12MM x 9MTS',
                'buy_price' => 30,
                'sell_price' => 37,
                'stock' => 25,
                'stock_min' => 30,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 1,
                'barcode' => '0000000001231',
                'visible' => true,
            ],
            [
                'name' => 'ALAMBRE CORRUGADO 4.7MM x 8.80MTS',
                'buy_price' => 3,
                'sell_price' => 5.5,
                'stock' => 10,
                'stock_min' => 15,
                'supplier_id' => $faker->numberBetween(1, 50),
                'presentation_id' => 1,
                'barcode' => '0000000001230',
                'visible' => true,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
