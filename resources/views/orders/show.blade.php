@extends('layouts.app')

@section('title', 'Order Details')

@section('contents')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
            <p class="card-text"><strong>User ID:</strong> {{ $order->user_id }}</p>
            <p class="card-text"><strong>Product ID:</strong> {{ $order->product_id }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $order->quantity }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
        </div>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning mt-3">Edit Order</a>
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Delete Order</button>
    </form>
</div>
@endsection
