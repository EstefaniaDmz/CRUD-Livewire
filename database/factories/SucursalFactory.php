<?php

namespace Database\Factories;

use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SucursalFactory extends Factory
{
    protected $model = Sucursal::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'telefono' => $this->faker->name,
			'calle' => $this->faker->name,
			'colonia' => $this->faker->name,
			'cp' => $this->faker->name,
			'numeroPlazas' => $this->faker->name,
        ];
    }
}
