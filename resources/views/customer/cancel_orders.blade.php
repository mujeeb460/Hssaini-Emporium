@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Cancel Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">

                <x-customer-sidebar />

                <div class="col-lg-10">
                    <h4 style="text-align: center;">My Orders</h4>
                    <section class="container my-4">
                        @foreach ($my_cancel_orders as $order)
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Order #{{ $order->id }}</span>
                                    <span class="badge bg-warning">{{ $order->status }}</span>
                                </div>
                                <div class="card-body">
                                    @foreach ($order->orderDetails as $product)
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <img src="{{ asset('storage/uploads/' . $product->product->thumbnail) }}"
                                                    alt="Product 1" class="img-fluid">
                                            </div>
                                            <div class="col-md-10">
                                                <h3>{{ $product->title }}</h3>
                                                <p>Quantity: {{ $product->qty }}</p>
                                                <p>Price: RS {{ $product->price }} each | Total: RS
                                                    {{ $product->price * $product->qty }}</p>
                                                <p>Delivey address: {{ $order->address }}, {{ $order->city }},
                                                    {{ $order->phone }}</p>
                                                <p>Order date: RS {{ $order->created_at }}</p>
                                            </div>

                                            @if($order->status !== 'Canceled')
                                            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3" style="text-align: right;">
                                                <button type="button" class="site-btn" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>                                            
                                            </div>
                                            @endif
                                        </div>

                                       <!--  Alert Modal -->
                                        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel">Alert!</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to cancel order?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <form action="{{ route('customer.cancel_order',$order->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-danger">Yes, Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->



@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
