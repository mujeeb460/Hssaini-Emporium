@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')

<style>
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: start;
    }
    .star-rating input {
        display: none;
    }
    .star-rating label {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s;
    }
    /* Highlight stars on hover */
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f1c40f;
    }
    /* Keep selected star highlighted */
    .star-rating input:checked ~ label {
        color: #f1c40f;
    }
</style>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>My Reviews</span>
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
                        @foreach ($orders as $order)
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


                                            @if($order->status == 'Delivered')
                                            <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3" style="text-align: right;">
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#reviewModal{{$product->product_id}}" class="btn btn-outline-dark">Review</a>                                            
                                            </div>
                                            @endif
                                            
                                        </div>

                                       <!-- Review Modal -->
<div class="modal fade" id="reviewModal{{$product->product_id}}" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Leave a Review</h5>
                <button type="button" class="btn btn-danger close-modal" data-bs-dismiss="modal" aria-label="Close">Close</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.review.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="star-rating">
                            <input type="radio" name="rating[{{$product->product_id}}]" value="5" id="star5_{{$product->product_id}}"><label for="star5_{{$product->product_id}}">&#9733;</label>
                            <input type="radio" name="rating[{{$product->product_id}}]" value="4" id="star4_{{$product->product_id}}"><label for="star4_{{$product->product_id}}">&#9733;</label>
                            <input type="radio" name="rating[{{$product->product_id}}]" value="3" id="star3_{{$product->product_id}}"><label for="star3_{{$product->product_id}}">&#9733;</label>
                            <input type="radio" name="rating[{{$product->product_id}}]" value="2" id="star2_{{$product->product_id}}"><label for="star2_{{$product->product_id}}">&#9733;</label>
                            <input type="radio" name="rating[{{$product->product_id}}]" value="1" id="star1_{{$product->product_id}}"><label for="star1_{{$product->product_id}}">&#9733;</label>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Your Review</label>
                        <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Review</button>
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll(".star-rating input");

        stars.forEach(star => {
            star.addEventListener("change", function() {
                const checkedValue = document.querySelector(".star-rating input:checked");
                if (checkedValue) {
                    // Remove previous highlights
                    document.querySelectorAll(".star-rating label").forEach(label => {
                        label.style.color = "#ccc";
                    });

                    // Highlight selected stars
                    let starId = checkedValue.id;
                    let selectedStars = document.querySelectorAll(`label[for^="star"]`);
                    
                    selectedStars.forEach(label => {
                        if (label.getAttribute("for") <= starId) {
                            label.style.color = "#f1c40f";
                        }
                    });
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Select all close buttons in review modals
        document.querySelectorAll(".close-modal").forEach(button => {
            button.addEventListener("click", function () {
                // Find the closest modal
                let modal = this.closest(".modal");

                // Reset the form inside the modal
                let form = modal.querySelector("form");
                if (form) {
                    form.reset();
                }
            });
        });
    });
</script>
@endsection
