<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_id', 'delivery_date', 'name', 'phone', 'email'
    ];

    public function delivery()
    {
        return $this->belongsTo(CourierDelivery::class);
    }

    public function getCost()
    {
        return $this->delivery->cost;
    }

    public static function createOrder($origin, $destination, $type, $delivery_date, $name, $phone, $email)
    {
        $delivery = CourierDelivery::create([
            'origin' => $origin,
            'destination' => $destination,
            'type' => $type
        ]);

        $delivery->calculateCost();
        $delivery->save();

        $order = Order::create([
            'delivery_id' => $delivery->id,
            'delivery_date' => $delivery_date,
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        ]);

        return $order;
    }

    public static function getOrder($id)
    {
        return Order::with('delivery')->find($id);
    }

    public static function getOrders()
    {
        return Order::with('delivery')->get();
    }
}
