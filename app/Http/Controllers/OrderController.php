<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product; // Ensure Product model is imported
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $products = Product::all();
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'address' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'status' => 'string|in:pending,completed,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'address' => $request->address,
            'quantity' => $request->quantity,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
