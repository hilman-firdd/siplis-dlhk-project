<?php

namespace Database\Factories;

use App\Models\ProfileTPK;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileTPKFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileTPK::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            
            //
            'kode' => ('KL0001'),
            'nama' => $this->faker->name(),
            'luas' => $this->faker->randomFloat(1, 20, 30),
            'kedalaman' => $this->faker->randomFloat(1, 20, 30),
            'volume' => $this->faker->randomFloat(1, 20, 30),
            'debit' => $this->faker->randomFloat(1, 20, 30),
            'waktu' => $this->faker->randomDigit(1, 20, 30),
            'deskripsi' => $this->faker->text(100),
        ];
    }
}
