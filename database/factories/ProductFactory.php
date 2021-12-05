<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(),
            'marca' => $this->faker->name(),
            'detalle' => $this->faker->sentence(),
            'precio' => $this->faker->numberBetween($int1 = 1000, $int2 = 3000),
            'idEstado' => $this->faker->numberBetween($int1 = 1, $int2 = 2),
            'idCategoria' => $this->faker->numberBetween($int1 = 1, $int2 = 2),
        ];
    }
}
