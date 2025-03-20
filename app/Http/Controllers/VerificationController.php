<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\Order; // Ensure Order model is imported
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $statuses = Order::distinct()->pluck('status'); // Fetch distinct statuses from orders
        $verifications = Verification::with('order')->get();
        $orders = Order::all(); // Fetch all orders for verification


        return view('verifications.index', compact('verifications', 'statuses', 'orders')); // Pass orders to the view

    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'verified_by' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        Verification::create($request->all());
        return redirect()->route('verifications.index')->with('success', 'Verification created successfully.');
    }
}
