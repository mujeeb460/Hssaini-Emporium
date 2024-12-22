@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')

<style type="text/css">
    .btn-success {
    background-color: #7fad39;
    border-color: #4CAF50;
    color: white;
}
.btn-success:hover {
    background-color: #7fad39;
    border-color: #45A049;
}
</style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>My Orders</span>
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
                    <section style="background-color: #eee;">
                          <div class="container py-3">
                            <div class="row">
                              <div class="col">
                                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                                  <h4 style="text-align: center;">Add New Address</h4>
                                </nav>
                              </div>
                            </div>
                            <form action="{{ route('customer.myaddress.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                              <div class="row">                                
                                  <div class="col-lg-12">
                                    <div class="card mb-4">
                                      <div class="card-body">
                                          <div class="row">
                                            <div class="col-sm-2">
                                              <p class="mb-0">First Name</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                                            </div>
                                            <div class="col-sm-2">
                                              <p class="mb-0">Last Name</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-2">
                                              <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                            </div>
                                            <div class="col-sm-2">
                                              <p class="mb-0">City</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-2">
                                              <p class="mb-0">Area</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="area" value="{{old('area')}}">
                                            </div>
                                            <div class="col-sm-2">
                                              <p class="mb-0">Shipping Address</p>
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" name="shipping_address" value="{{old('shipping_address')}}">
                                            </div>
                                          </div>
                                          <hr>
                                         
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center">
                                        <button type="submit" class="btn btn-outline-dark">Add</button>
                                      </div>
                                  </div>
                              </div>
                            </form>
                          </div>
                        </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')

@endsection
