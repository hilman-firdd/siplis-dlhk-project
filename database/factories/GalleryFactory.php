<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'author' => (1),
            'id_file' => $this->faker->shuffle('FL0001'),
            'judul' => $this->faker->text(),
            'deskripsi' => $this->faker->paragraphs(),
            'file' => ('1632318430.png'),
            'link' => $this->faker->imageUrl(640, 480, 'animals', true),
            'liveyt' => ('<iframe width="560" height="315" src="https://www.youtube.com/embed/2UkpwLyH-pU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'),
        ];
    }
}
