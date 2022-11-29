<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'telefono' => $this->faker->name,
			'calle' => $this->faker->name,
			'colonia' => $this->faker->name,
			'cp' => $this->faker->name,
			'ciudad' => $this->faker->name,
			'estado' => $this->faker->name,
			'pais' => $this->faker->name,
			'numeroPlazas' => $this->faker->name,
        ];
    }
}
