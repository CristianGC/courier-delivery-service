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
/*
    public function create($origin, $destination, $type, $cost)
    {
        $delivery = new CourierDelivery([
            'origin' => $origin,
            'destination' => $destination,
            'type' => $type,
            'cost' => $cost,
        ]);

        $delivery->save();

        return $delivery;
    }
*/

    public function calculateCost($origin, $destination, $type)
    {
        // реализация расчета стоимости доставки
    }


}
