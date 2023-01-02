<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryCollection;
use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new DeliveryCollection(Delivery::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DeliveryResource
     */
    public function store(Request $request)
    {
        try {
            $delivery = Delivery::create($request->only([
                'origin',
                'destination',
                'type',
                'cost'
            ]));

            return new DeliveryResource($delivery);

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json([
                    'message' => 'Duplicate value for origin or destination',
                ], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DeliveryResource
     */
    public function show($id)
    {
        $delivery = Delivery::find($id);

        if ($delivery) {
            return new DeliveryResource($delivery);
        } else {
            return response()->json([
                'error' => 'Delivery not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return DeliveryResource
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'origin' => 'required|max:255',
            'destination' => 'required|max:255',
            'type' => 'required|max:255',
            'cost' => 'required|numeric',
        ]);

        $delivery = Delivery::find($id);

        if ($delivery) {
            $delivery->update($validatedData);
            return new DeliveryResource($delivery);
        } else {
            return response()->json([
                'error' => 'Delivery not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
