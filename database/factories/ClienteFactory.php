<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellidoPaterno' => $this->faker->name,
			'apellidoMaterno' => $this->faker->name,
			'telefono' => $this->faker->name,
			'calle' => $this->faker->name,
			'colonia' => $this->faker->name,
			'cp' => $this->faker->name,
			'idHotel' => $this->faker->name,
			'regimenHotel' => $this->faker->name,
			'idSucursal' => $this->faker->name,
			'idVuelo' => $this->faker->name,
			'claseVuelo' => $this->faker->name,
        ];
    }
}
