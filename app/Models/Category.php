<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_nameAr',
        'category_nameEn',
        'category_image',
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
