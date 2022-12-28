<?php

namespace App\Http\Controllers;
use App\Models\CourierDelivery;

use Illuminate\Http\Request;

class CourierDeliveryController extends Controller
{
    //
    public function calculateCost(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $type = $request->input('type');

        $cost = CourierDelivery::calculateCost($origin, $destination, $type);

        return response()->json([
            'cost' => $cost
        ]);
    }
}
