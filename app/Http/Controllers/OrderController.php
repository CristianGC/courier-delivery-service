<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PostResource;
use App\Models\Order;
use App\Models\Post;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nette\Schema\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new OrderCollection(Order::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Нужно перевести в отдельную функцию
        try {
            $validatedData = $request->validate([
                'origin' => 'required|max:255',
                'destination' => 'required|max:255',
                'type' => 'required|max:255',
                'cost' => 'required|numeric',
            ]);
        } catch (ValidationException $validationException) {
            return response()->json([
                'message' => 'validatedData',
            ], 404);
        }

        //$courierDeliveryID, $origin, $destination, $type, $deliveryDate, $name, $phone, $email

        dump($request);

        //$oreder = Order::createOrder();

        //return new OrderResource($oreder);
        /*
        $delivery = CourierDelivery::f([
            'origin' => $origin,
            'destination' => $destination,
            'type' => $type
        ]);

        $delivery->calculateCost();
        $delivery->save();

        $order = Order::create([
            'delivery_id' => $delivery->id,
            'delivery_date' => $delivery_date,
            'delivery_id' => $courierDeliveryID,
            'delivery_date' => $deliveryDate,
            'name' => $name,
            'phone' => $phone,
            'email' => $email
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
