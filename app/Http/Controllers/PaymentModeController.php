<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMode;

class PaymentModeController extends Controller
{
    /**
     * Display a listing of the payment modes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentModes = PaymentMode::all();
        return response()->json($paymentModes);
    }

    /**
     * Store a newly created payment mode in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment_name' => 'required|string|max:255',
        ]);

        $paymentMode = PaymentMode::create([
            'payment_name' => $validatedData['payment_name'],
            'delete' => false,
        ]);

        return response()->json(['message' => 'Payment Mode created successfully.']);
    }

    /**
     * Display the specified payment mode.
     *
     * @param  \App\Models\PaymentMode  $paymentMode
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMode $paymentMode)
    {
        return response()->json($paymentMode);
    }

    /**
     * Update the specified payment mode in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMode  $paymentMode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMode $paymentMode)
    {
        $validatedData = $request->validate([
            'payment_name' => 'sometimes|required|string|max:255',
            'delete' => 'sometimes|boolean',
        ]);

        $paymentMode->update($validatedData);

        return response()->json($paymentMode);
    }

    /**
     * Remove the specified payment mode from storage.
     *
     * @param  \App\Models\PaymentMode  $paymentMode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMode $paymentMode)
    {
        $paymentMode->delete();

        return response()->json(['message' => 'Payment mode deleted successfully']);
    }
}
