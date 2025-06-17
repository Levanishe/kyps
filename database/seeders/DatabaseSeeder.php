<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Users::class);
        $this->call(Categories::class);
        $this->call(Tours::class);
        $this->call(EventSettingsSeeder::class);
    }
}

//php artisan migrate --seed

//php artisan make:seed Name
//php artisan db:seed