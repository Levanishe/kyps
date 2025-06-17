<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EventSetting;
use Illuminate\Support\Facades\View;
use Carbon\Carbon; // Убедитесь, что Carbon импортирован

class EventSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('user.layouts.layout', function ($view) {
            $settings = EventSetting::firstOrCreate([]);

            $isHalloweenActive = false;
            $isSnowActive = false;

            $today = Carbon::today(); // Получаем сегодняшнюю дату

            // Проверяем активность Хэллоуина
            if ($settings->is_halloween_enabled && // Тумблер включен
                $settings->halloween_start_date &&   // Дата начала существует
                $settings->halloween_end_date &&     // Дата окончания существует
                $today->between($settings->halloween_start_date, $settings->halloween_end_date->endOfDay())) { // И сегодняшняя дата находится в диапазоне
                $isHalloweenActive = true;
            }

            // Проверяем активность снега
            if ($settings->is_snow_enabled && // Тумблер включен
                $settings->snow_start_date &&    // Дата начала существует
                $settings->snow_end_date &&      // Дата окончания существует
                $today->between($settings->snow_start_date, $settings->snow_end_date->endOfDay())) { // И сегодняшняя дата находится в диапазоне
                $isSnowActive = true;
            }

            // Передаем все настройки, а также флаги активности
            $view->with([
                'eventSettings' => $settings,
                'isHalloweenActive' => $isHalloweenActive,
                'isSnowActive' => $isSnowActive,
            ]);
        });
    }
}