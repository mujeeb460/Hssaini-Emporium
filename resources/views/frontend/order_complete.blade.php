@extends('layouts.frontend')
@section('title','Cart')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shopping Cart</span>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <center>
                                    <i class="fa fa-check-circle __text-60px __color-0f9d58"></i>
                                </center>
                            </div>
                             @if (Session::has('success'))
                                <div class="alert alert-success text-center">

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                                    <p>{{ Session::get('success') }}</p>

                                </div>
                            @endif

                            <h3 class="font-black fw-bold text-center">Thank You For Shopping</h3>

                                <p class="text-center fs-12">Your Order Placed Successfully</p>
                                @if(session('orderID'))
                                    <p class="text-center fs-12">Your Order ID is: {{ session('orderID') }}</p>
                                @endif

                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <div class="shoping__cart__btns">
                                        <a href="/" class="btn btn-outline-dark">CONTINUE SHOPPING</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')
   
@endsection
