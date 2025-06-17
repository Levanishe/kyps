<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Город',
                'image' => 'images/categories/Город.png',
            ],
            [
                'name' => 'Деревня',
                'image' => 'images/categories/Деревня.png',
            ],
            [
                'name' => 'Горы',
                'image' => 'images/categories/Горы.png',
            ],
            [
                'name' => 'Море',
                'image' => 'images/categories/Море.png',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
