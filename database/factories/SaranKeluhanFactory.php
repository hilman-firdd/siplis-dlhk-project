<?php

namespace Database\Factories;

use App\Models\SaranKeluhan;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaranKeluhanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SaranKeluhan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'pesan' => $this->faker->text(400),
            'kategori' => $this->faker->randomElement(['Saran','Keluhan']),
        ];
    }
}
