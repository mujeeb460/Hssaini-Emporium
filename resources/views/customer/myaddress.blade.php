@extends('layouts.frontend')
@section('title', 'Cart')
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
                    <h4 style="text-align: center;">My Address Book</h4>
                    <section class="container my-4">
                        <div style="text-align: right; margin-bottom: 10px;">
                            <button type="submit" class="btn btn-outline-dark"data-bs-toggle="modal"><a href="{{route('customer.myaddress.create')}}"> ADD</a></button>
                        </div>

                        @forelse ($addresses as $address)
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Address</span>
                                    <form action="{{ route('customer.myaddress.edit', $address->id) }}" method="GET">
                                        <button type="submit" class="badge bg-warning border-0">Edit</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>First Name: {{ $address->first_name }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Last Name: {{ $address->last_name}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Phone: {{ $address->phone }}</p>
                                            </div>
                                            <div class="col-md-4">
                                               <p>City: {{ $address->city }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Area: {{ $address->area }}</p>
                                            </div>
                                            <div class="col-md-4">
                                               <p>Shipping Address: {{ $address->shipping_address }}</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @empty
                            <p style="text-align: center;">No data available.</p>
                        @endforelse
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Bood Address Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                    <label for="first_name" class="col-form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="">
              </div>
              <div class="col-md-6">
                    <label for="last_name" class="col-form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="">
              </div>
              <div class="col-md-6">
                    <label for="first_name" class="col-form-label">Phone</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="">
              </div>
              <div class="col-md-6">
                    <label for="first_name" class="col-form-label">City</label>
                    <input type="text" name="first_name" class="form-control" id="first_name">
              </div>
              <div class="col-md-6">
                    <label for="first_name" class="col-form-label">Area</label>
                    <input type="text" name="first_name" class="form-control" id="first_name">
              </div>
              <div class="col-md-6">
                    <label for="first_name" class="col-form-label">Shipping Address</label>
                    <input type="text" name="first_name" class="form-control" id="first_name">
              </div>

            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>



@endsection
@section('script')

@endsection
