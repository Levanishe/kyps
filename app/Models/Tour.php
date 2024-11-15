<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    // Разрешаем массовое назначение для следующих полей
    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
