<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSetting extends Model
{
    use HasFactory;

    protected $table = 'event_settings';

    protected $fillable = [
        'is_halloween_enabled',
        'halloween_start_date',
        'halloween_end_date',
        'is_snow_enabled',
        'snow_start_date',
        'snow_end_date',
    ];

    protected $casts = [
        'is_halloween_enabled' => 'boolean',
        'halloween_start_date' => 'date',
        'halloween_end_date' => 'date',
        'is_snow_enabled' => 'boolean',
        'snow_start_date' => 'date',
        'snow_end_date' => 'date',
    ];
}