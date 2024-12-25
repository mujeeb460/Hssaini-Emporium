<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {

        $carts = Cart::where('user_id', auth()->id())->get();

        if (!$carts)
        {
            return redirect()->back()->with('success', 'Cart is empty!');
        }

        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->qty;
        });


            $order = new Order;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->method = $request->payment_method;
            $order->user_id = auth()->id();
            $order->save();

            foreach ($carts as $cart) {
                $orderDetail = new OrderDetail;
                $orderDetail->title = $cart->product->title;
                $orderDetail->price = $cart->product->price;
                $orderDetail->qty = $cart->qty;
                $orderDetail->size = $cart->size;
                $orderDetail->color = $cart->color;
                $orderDetail->product_id = $cart->product_id;
                $orderDetail->order_id = $order->id;
                $orderDetail->save();
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create ([
                    "amount" => $total,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment for Order #" . $order->id, 
            ]);

            $orderID = 8979798;

            Cart::where('user_id', auth()->id())->delete();
            Session::flash('success', 'Payment successful!');
              
            return redirect('orderComplete')->with('success', 'Order Placed Successfully!')->with('orderID', $order->id);
    }


}
