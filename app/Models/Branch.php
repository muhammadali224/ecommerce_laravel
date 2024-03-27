<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAr',
        'nameEn',
        'isOpen',
        'lang',
        'late',
        'phone1',
        'phone2',
        'facebookUrl',
        'instagramUrl',
    ];
    public function deliveryPlan()
    {
        return $this->belongsTo(DeliveryPlan::class);
    }
}
