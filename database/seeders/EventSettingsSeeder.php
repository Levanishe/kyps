<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventSetting; // Импортируем модель EventSetting
use Carbon\Carbon; // Импортируем Carbon для работы с датами

class EventSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем или обновляем единственную запись EventSetting с id=1
        // Указываем даты для 2025 года, чтобы пример был актуален для ближайшего времени
        EventSetting::updateOrCreate(
            ['id' => 1], // Условие для поиска: ищем запись с id=1
            [
                'is_halloween_enabled' => false,
                // Примерные даты для Хэллоуина: с 15 октября по 5 ноября
                'halloween_start_date' => Carbon::parse('2025-10-15'),
                'halloween_end_date' => Carbon::parse('2025-11-05'),
                'is_snow_enabled' => false,
                // Примерные даты для снега: с 20 декабря по 10 января следующего года
                'snow_start_date' => Carbon::parse('2025-12-20'),
                'snow_end_date' => Carbon::parse('2026-01-10'),
            ]
        );
    }
}