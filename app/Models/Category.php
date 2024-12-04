<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

        // Разрешаем массовое назначение для следующих полей
        protected $fillable = [
            'name',
            'image',
        ];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
