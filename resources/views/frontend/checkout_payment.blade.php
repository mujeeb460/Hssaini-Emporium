@extends('layouts.frontend')
@section('title','Cart')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Payment</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Stripe Payment</span>
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
                
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach ($carts as $cart)
                                    <?php $total += $cart->product->price * $cart->qty; ?>
                                   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form role="form" 
                action="{{ route('stripe') }}" 
                method="post" 
                class="require-validation" 
                data-cc-on-file="false" 
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" 
                id="payment-form">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3 style="text-align: center;">Payment Details</h3>
                    </div>
                    <div class="col-lg-6">
                        <div class='form-group'>
                            <label>Name on Card</label>
                            <input type='text' class='form-control' name="name" placeholder="Name on Card" value="{{ auth()->user()->name ?? '' }}" required>
                        </div>
                        <div class='form-group'>
                            <label>Card Number</label>
                            <input type='text' class='form-control card-number' autocomplete='off' placeholder="Card Number" required>
                        </div>
                        <div class='form-group row'>
                            <div class="col-lg-4">
                                <label>CVC</label>
                                <input type='text' class='form-control card-cvc' placeholder='ex. 311' required>
                            </div>
                            <div class="col-lg-4">
                                <label>Expiration Month</label>
                                <input type='text' class='form-control card-expiry-month' placeholder='MM' required>
                            </div>
                            <div class="col-lg-4">
                                <label>Expiration Year</label>
                                <input type='text' class='form-control card-expiry-year' placeholder='YYYY' required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>RS {{ $total }}</span></li>
                                <li>Total <span>RS {{ $total }}</span></li>
                            </ul>
                        </div>
                        <input type="hidden" name="name" value="{{ $data['name'] ?? '' }}">
                        <input type="hidden" name="phone" value="{{ $data['phone'] ?? '' }}">
                        <input type="hidden" name="address" value="{{ $data['address'] ?? '' }}">
                        <input type="hidden" name="city" value="{{ $data['city'] ?? '' }}">
                        <input type="hidden" name="payment_method" value="{{ $data['payment_method'] ?? '' }}">
                        <div class="row justify-content-center mt-3">
                            <div class="col-sm-3 px-0 text-center mobile-padding">
                                <img class="order-summery-footer-image" src="{{asset('frontend/img/delivery_info.png')}}" alt="">
                                <div class="deal-title">Fast Delivery all across the country</div>
                            </div>
                            <div class="col-sm-3 px-0 text-center mobile-padding">
                                <img class="order-summery-footer-image" src="{{asset('frontend/img/safe_payment.png')}}" alt="">
                                <div class="deal-title">Safe Payment</div>
                            </div>
                            <div class="col-sm-3 px-0 text-center mobile-padding">
                                <img class="order-summery-footer-image" src="{{asset('frontend/img/return_policy.png')}}" alt="">
                                <div class="deal-title">7 Days Return Policy</div>
                            </div>
                            <div class="col-sm-3 px-0 text-center mobile-padding">
                                <img class="order-summery-footer-image" src="{{asset('frontend/img/authentic_product.png')}}" alt="">
                                <div class="deal-title">100% Authentic Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn primary-btn w-100">PAY NOW</button>
                    </div>
                </div>
            </form>

            
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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

        $(function() {

  

    /*------------------------------------------

    --------------------------------------------

    Stripe Payment Code

    --------------------------------------------

    --------------------------------------------*/

    

    var $form = $(".require-validation");

     

    $('form.require-validation').bind('submit', function(e) {

        var $form = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs = $form.find('.required').find(inputSelector),

        $errorMessage = $form.find('div.error'),

        valid = true;

        $errorMessage.addClass('hide');

    

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {

          var $input = $(el);

          if ($input.val() === '') {

            $input.parent().addClass('has-error');

            $errorMessage.removeClass('hide');

            e.preventDefault();

          }

        });

     

        if (!$form.data('cc-on-file')) {

          e.preventDefault();

          Stripe.setPublishableKey($form.data('stripe-publishable-key'));

          Stripe.createToken({

            number: $('.card-number').val(),

            cvc: $('.card-cvc').val(),

            exp_month: $('.card-expiry-month').val(),

            exp_year: $('.card-expiry-year').val()

          }, stripeResponseHandler);

        }

    

    });

      

    /*------------------------------------------

    --------------------------------------------

    Stripe Response Handler

    --------------------------------------------

    --------------------------------------------*/

    function stripeResponseHandler(status, response) {

        if (response.error) {

            $('.error')

                .removeClass('hide')

                .find('.alert')

                .text(response.error.message);

        } else {

            /* token contains id, last4, and card type */

            var token = response['id'];

                 

            $form.find('input[type=text]').empty();

            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

            $form.get(0).submit();

        }

    }

     

});


    </script>
@endsection
