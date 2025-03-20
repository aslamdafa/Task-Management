@extends('layouts.app')

@section('title', 'Verifications')

@section('contents')
<div class="container">
    <h1>Verifications</h1>
    <form method="GET" action="{{ route('verifications.index') }}">
        <select name="status" class="form-control" onchange="this.form.submit()">
            <option value="">Select Status</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
    </form>

    <h2>Orders for Verification</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('verifications.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="verified_by" value="{{ auth()->user()->id }}">
                        <select name="status" class="form-control" required>
                            <option value="">Select Verification Status</option>
                            <option value="verified">Verified</option>
                            <option value="not_verified">Not Verified</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
