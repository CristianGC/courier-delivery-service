<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected array $fillable = [
        'delivery_id',
        'delivery_date',
        'name',
        'phone',
        'email'
    ];

/*
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function getCost()
    {
        return $this->delivery->cost;
    }

    public static function createOrder($courierDeliveryID, $origin, $destination, $type, $deliveryDate, $name, $phone, $email)
    {
        $order = Order::create([
            'delivery_id' => $courierDeliveryID,
            'delivery_date' => $deliveryDate,
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        ]);

        return $order;
    }
*/
}
