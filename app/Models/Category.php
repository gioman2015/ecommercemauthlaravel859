<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_en',
        'category_name_esp',
        'category_slug_en',
        'category_slug_esp',
        'category_icon',
        'category_order',
        'slider_categoria_1',
        'slider_categoria_2',
        'slider_categoria_3',
    ];
}
