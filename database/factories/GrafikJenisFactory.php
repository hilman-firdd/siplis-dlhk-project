<?php

namespace Database\Factories;

use App\Models\GrafikJenis;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrafikJenisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrafikJenis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'jg_nama' => $this->faker->array(['Batu Mutu','Outlet IPL','Inlet Kolam Stabilitasi','Outlet Kolam Anaerobik','Outlet Kolam Aerobik']),
        ];
    }
}
