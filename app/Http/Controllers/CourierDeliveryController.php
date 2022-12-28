<?php

namespace App\Http\Controllers;
use App\Delivery;

use Illuminate\Http\Request;

class CourierDeliveryController extends Controller
{
    //
    public function calculateCost(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $type = $request->input('type');

        $cost = Delivery::calculateCost($origin, $destination, $type);

        return response()->json([
            'cost' => $cost
        ]);
    }
}
