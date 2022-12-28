<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin', 'destination', 'type', 'cost', 'status'
    ];

    public function calculateCost()
    {
        // реализация расчета стоимости доставки
    }


}
