<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'image',
        'descriptionAr',
        'descriptionEn',
        'category_id',
        'sub_category_id',
        'count',
        'max_count',
        'isActive',
        'branch_id',
        'price',
        'discount',
    ];

    public function itemImage()
    {
        return $this->hasMany(ItemImage::class);
    }
}
