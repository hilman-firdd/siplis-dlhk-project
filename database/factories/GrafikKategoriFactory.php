<?php

namespace Database\Factories;

use App\Models\GrafikKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrafikKategoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrafikKategori::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'kg_nama' => $this->faker->Element(['TSS','NH3-N','BOD5','KADMIUM','COD/KOK']),
        ];
    }
}
