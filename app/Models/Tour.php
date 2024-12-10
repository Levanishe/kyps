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
        'image',
        'route',
        'duration',
        'dates',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
