<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'ruc' => $this->generateUniqueRuc(),
            'address' => $this->faker->streetAddress(),
            'phone_number' => $this->faker->numerify('9########'),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->randomElement([
                'Proveedor de materiales de construcción',
                'Distribuidor mayorista',
                'Proveedor local',
                'Suministros industriales',
            ]),
        ];
    }

    protected function generateUniqueRuc(): string
    {
        $prefix = $this->faker->randomElement(['10', '20']);
        $digits = $this->faker->numerify('#########');
        return $prefix . $digits;
    }
}
