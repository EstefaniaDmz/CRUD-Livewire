<?php

namespace Database\Factories;

use App\Models\Vuelo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VueloFactory extends Factory
{
    protected $model = Vuelo::class;

    public function definition()
    {
        return [
			'fecha' => $this->faker->name,
			'hora' => $this->faker->name,
			'numeroPlazas' => $this->faker->name,
			'ciudadOrigen' => $this->faker->name,
			'estadoOrigen' => $this->faker->name,
			'paisOrigen' => $this->faker->name,
			'ciudadDestino' => $this->faker->name,
			'estadoDestino' => $this->faker->name,
			'paisDestino' => $this->faker->name,
        ];
    }
}
