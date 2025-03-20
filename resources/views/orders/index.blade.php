@extends('layouts.app')

@section('title', 'Orders')

@section('contents')
<div class="container">
    <h1>Orders</h1>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Welcome to the Orders Page!</h4>
                        <p>Here you can manage your orders efficiently. Click the button below to create a new order.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light text-center section-padding">
        <div class="container">
            <h1 class="display-4">Belanja Mudah dan Hemat!</h1>
            <p class="lead">Toko Sumber Rezeki menyediakan kebutuhan Anda setiap hari.</p>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqgswSGFj1hVXoVgTkEvdrY4qVOyrHwBeSRyOgmQQ6KnB0xLIypDmN509f0HQ_9wH0T2Q&usqp=CAU" class="card-img-top product-img" alt="Telur" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">Telur Segar</h5>
                            <p class="card-text">Telur segar berkualitas tinggi.</p>
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm1nJG_rPVoxcGF598qMioeooFYTQsOm7li_cuTqnAE5XClhRdOWg_V0gFk1x_pEemfbc&usqp=CAU" class="card-img-top product-img" alt="Jajanan" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">Aneka Jajanan</h5>
                            <p class="card-text">Berbagai macam jajanan ringan.</p>
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 100%;">
                        <img src="https://awsimages.detik.net.id/community/media/visual/2017/03/08/08a36228-614b-4bd9-9b8a-9c5e32b10ea1.jpg?w=600&q=90" class="card-img-top product-img" alt="Peralatan Mandi" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">Peralatan Mandi</h5>
                            <p class="card-text">Peralatan mandi lengkap dan berkualitas.</p>
                            <a href="#" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-4">Create New Order</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th>Address</th>
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
                <td>{{ $order->address }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
