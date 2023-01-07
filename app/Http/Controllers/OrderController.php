<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nette\Schema\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(new OrderCollection(Order::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return OrderResource
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate(
                [
                    'delivery_id' => 'required|integer',
                    'delivery_date' => 'required|date',
                    'name' => 'required|string|max:255',
                    'phone' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                ],
                [
                    'delivery_id.required' => 'Delivery ID is required',
                    'delivery_id.integer' => 'Delivery ID must be an integer',
                    'delivery_date' => ['required', 'date', 'after_or_equal', 'message' => 'The delivery date must be a valid date and must be equal to or after the current date.'],
                    'name.required' => 'Name is required',
                    'name.string' => 'Name must be a string',
                    'name.max' => 'Name must be no longer than 255 characters',
                    'phone.required' => 'Phone is required',
                    'phone.string' => 'Phone must be a string',
                    'phone.max' => 'Phone must be no longer than 255 characters',
                    'email.required' => 'Email is required',
                    'email.email' => 'Email must be a valid email address',
                    'email.max' => 'Email must be no longer than 255 characters',
                ]
        );
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors(),
            ], 422);
        }

        $deliveryDate = $request->input("delivery_date");

        if ($request->isMethod("post")) {

        }

        $order = Order::create($validatedData);
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return OrderResource
     */
    public function show($id)
    {
        $order = Order::find($id);

        if ($order) {
            return new OrderResource($order);
        } else {
            return response()->json([
                "error" => "Order not found"
            ], 404);
        }
    }
}
