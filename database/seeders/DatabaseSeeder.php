<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\ProfileTPK;
use App\Models\SaranKeluhan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        ProfileTPK::factory(200)->create();
        Artikel::factory(200)->create();
        SaranKeluhan::factory(100)->create();
        // Gallery::factory(50)->create();
        Agenda::factory(50)->create();
    }
}

