<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();

        return response()->json([
            'deliveries' => $deliveries,
        ]);
    }

    public function store(Request $request)
    {

        $delivery = Delivery::create($request->all());

        return response()->json([
            'delivery' => $delivery,
        ]);

    }

    public function show(Delivery $delivery)
    {
        return response()->json([
            'delivery' => $delivery,
        ]);
    }

    public function update(Request $request, Delivery $delivery)
    {
        $delivery->update($request->all());

        return response()->json([
            'delivery' => $delivery,
        ]);
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return response()->json(null, 204);
    }
}
