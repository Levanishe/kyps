<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Category;

class Tours extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->keyBy('name'); 

        $tours = [
            [
                'name' => 'Тур по Тбилиси',
                'description' => 'Насладитесь красивыми видами и уникальной архитектурой столицы Грузии. Посетите старый город, крепость Нарикала и насладитесь местной кухней.',
                'route' => 'Тбилиси - Мцхета - Кахетия',
                'duration' => '5 дней',
                'dates' => '2025-05-01, 2025-06-15, 2025-07-20',
                'price' => 3000,
                'image' => 'images/tours/defauit/Тбилиси.png',
                'category_id' => $categories['Город']->id,
            ],
            [
                'name' => 'Приключенческий тур по Казбеги',
                'description' => 'Уникальный тур в горы Кавказа. Пешие прогулки, катание на лошадях и потрясающие виды на гору Казбек.',
                'route' => 'Тбилиси - Казбеги - Степанцминда',
                'duration' => '4 дня',
                'dates' => '2025-05-10, 2025-06-20',
                'price' => 2500,
                'image' => 'images/tours/defauit/Горы.png',
                'category_id' => $categories['Горы']->id,
            ],
            [
                'name' => 'Отдых на Черном море',
                'description' => 'Насладитесь теплым солнцем и пляжным отдыхом на Черном море. Отличные условия для купания и водных видов спорта.',
                'route' => 'Батуми - Кобулети',
                'duration' => '7 дней',
                'dates' => '2025-06-01, 2025-07-15',
                'price' => 4000,
                'image' => 'images/tours/defauit/Море.png',
                'category_id' => $categories['Море']->id,
            ],
            [
                'name' => 'Тур по деревням Грузии',
                'description' => 'Узнайте о традиционной грузинской культуре, посетив живописные деревни. Попробуйте домашнюю еду и познакомьтесь с местными жителями.',
                'route' => 'Тбилиси - Сигнахи - Мцхета',
                'duration' => '6 дней',
                'dates' => '2025-05-15, 2025-06-25',
                'price' => 3500,
                'image' => 'images/tours/defauit/Деревня.png',
                'category_id' => $categories['Деревня']->id,
            ],
            [
                'name' => 'Тур по Батуми',
                'description' => 'Исследуйте современный Батуми с его прекрасными пляжами, набережной и историческими достопримечательностями. Увидьте знаменитый Батуми Пьяцца и ботанический сад.',
                'route' => 'Батуми - Ботанический сад - Пьяцца',
                'duration' => '5 дней',
                'dates' => '2025-06-10, 2025-07-25',
                'price' => 3500,
                'image' => 'images/tours/defauit/Батуми.png',
                'category_id' => $categories['Город']->id,
            ],
            [
                'name' => 'Горный тур по Сванетии',
                'description' => 'Погрузитесь в красоту горной Сванетии. Пешие прогулки, восхождения и захватывающие виды ждут вас.',
                'route' => 'Тбилиси - Местия - Ушгули',
                'duration' => '8 дней',
                'dates' => '2025-07-01, 2025-08-10',
                'price' => 5000,
                'image' => 'images/tours/defauit/Горы.png',
                'category_id' => $categories['Горы']->id,
            ],
            [
                'name' => 'Туристическая часть Батуми',
                'description' => 'Исследуйте современный Батуми с его прекрасными пляжами, набережной и историческими достопримечательностями. Увидьте знаменитый Батуми Пьяцца и ботанический сад.',
                'route' => 'Батуми - Ботанический сад - Пьяцца',
                'duration' => '7 дней',
                'dates' => '2025-06-10, 2025-07-25',
                'price' => 4900,
                'image' => 'images/tours/defauit/Батуми курорт.png',
                'category_id' => $categories['Море']->id,
            ],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }
    }
}