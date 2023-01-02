<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Database\QueryException;
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
        try {
            $delivery = Delivery::create($request);

            return response()->json([
                'delivery' => $delivery,
            ]);

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json([
                    'message' => 'Duplicate value for origin or destination',
                ], 422);
            }
        }
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
