<?php

namespace Database\Factories;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artikel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'judul' => $this->faker->name(),
            'konten' => $this->faker->text(400),
            'author' => ('1'),
            'thumbnail' => ('avatar.png'),
            'kategori' => $this->faker->randomElement(['Berita','Kegiatan']),
            'status' => $this->faker->randomElement(['publish','pending','draft'])
        ];
    }
}

