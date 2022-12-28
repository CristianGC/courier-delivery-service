<?php

namespace App\Http\Controllers;
use App\Models\CourierDelivery;

use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CourierDeliveryController extends Controller
{
    public function index()
    {
        $deliveries = CourierDelivery::all();

        return response()->json([
            'deliveries' => $deliveries,
        ]);
    }

    public function store(Request $request)
    {


        return $request->all();
        /*
        $delivery = CourierDelivery::create($request->all());


        return response()->json([
            'delivery' => $delivery,
        ]);
        */

    }

    public function show(CourierDelivery $delivery)
    {
        return response()->json([
            'delivery' => $delivery,
        ]);
    }

    public function update(Request $request, CourierDelivery $delivery)
    {
        $delivery->update($request->all());

        return response()->json([
            'delivery' => $delivery,
        ]);
    }

    public function destroy(CourierDelivery $delivery)
    {
        $delivery->delete();

        return response()->json(null, 204);
    }
}
