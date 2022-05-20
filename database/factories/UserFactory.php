<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        // return [
        //     'name' => $this->name('Iqbal Naufal'),
        //     'email' => $this->safeEmail('superadmin@gmail.com'),
        //     'email_verified_at' => now(),
        //     'password' => bcrypt(123456), // password
        //     'role' => $this->string('Superadmin'),
        //     'image' => $this->string('male-avatar.png'),
        //     'remember_token' => Str::random(10),
        // ];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt(123456), // password
            'role' => ('Superadmin'),
            'image' => ('male-avatar.png'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
