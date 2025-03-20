@extends('layouts.app')

@section('title', 'Edit Order')

@section('contents')
<div class="container">
    <h1>Edit Order</h1>
    <div class="alert alert-info" role="alert">
        <p>Make changes to the order details below and click "Update Order" to save your changes.</p>
    </div>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} - ${{ $product->price }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" required>{{ $order->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Update Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
