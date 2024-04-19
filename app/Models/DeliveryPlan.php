<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'base_price',
        'charge',
        'isFixed',
        'fix_charge',
        'fix_zone',
        'max_zone',
    ];


    public function branches()
    {
        return $this->hasOne(Branch::class);
    }
}
