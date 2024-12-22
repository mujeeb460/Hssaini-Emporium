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
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach ($carts as $cart)
                                    <?php $total += $cart->product->price * $cart->qty; ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset('storage/uploads/' . $cart->product->thumbnail) }}"
                                                alt="" height="100">
                                            <h5>{{ $cart->product->title }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            RS {{ $cart->product->price }}
                                        </td>
                                        <input type="hidden" name="id[]" value="{{ $cart->id }}" class="id">
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="qty" min="1"
                                                        max="{{ $cart->product->stock }}" value="{{ $cart->qty }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            RS {{ $cart->product->price * $cart->qty }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close" data-cartid="{{ $cart->id }}"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form action="{{ Route('order.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            {{-- <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div> --}}
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select name="method" class="form-select w-100" required>
                                <option>Cash on delivery</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>RS {{ $total }}</span></li>
                                <li>Total <span>RS {{ $total }}</span></li>
                            </ul>
                            <button class="btn primary-btn w-100">PLACE ORDER</button>
                            {{-- <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a> --}}
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".pro-qty").on('click', '.qtybtn', function() {
                var qty = $(this).parent().find('input').val();
                var id = $(this).parents('tr').find('.id').val();
                $.ajax({
                    url: "{{ url('cart/update/') }}" + id,
                    type: 'put',
                    data: {
                        qty: qty,
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: (function(res) {
                        // alert(res);
                        // console.log(res);
                        if (res) {
                            location.reload();
                        }
                    }),
                    error: (function(err) {
                        console.log(err);
                    })
                });
            });

            $('.icon_close').click(function() {
                var id = $(this).data('cartid');
                $.ajax({
                    url: "{{ url('cart/delete/') }}" + id,
                    type: 'delete',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: (function(res) {
                        // alert(res);
                        if (res) {
                            location.reload();
                        }
                    }),
                    error: (function(err) {
                        console.log(err);
                    })
                });
            });
        });
    </script>
@endsection
