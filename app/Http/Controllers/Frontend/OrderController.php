<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "payment_method" => "required"
        ]);

        $carts = Cart::where('user_id', auth()->id())->get();

        if (!$carts) {
            return redirect()->back()->with('success', 'Cart is empty!');
        }

        if($request->payment_method == 'stripe')
        {
            $data = $request->all(); 
            $carts = Cart::with('product')->where('user_id', auth()->id())->get();
            return view('frontend.checkout_payment', compact('carts','data'));

        }elseif($request->payment_method == 'stripePay') {
            return "ok";
        
        }else{

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

            Cart::where('user_id', auth()->id())->delete();
            return redirect('myorder')->with('success', 'Order Placed Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function cancel_order($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $cancel_order = Order::where('id',$id)->where('user_id',$user->id)->update(['status' => 'Canceled']);
        if($cancel_order)
        {
            return redirect()->back()->with('success', 'Your order canceled!');
        }else{

            return redirect()->back()->with('failed', 'Ooops some thing wrong!');
        }

        
    }


    public function get_cancel_order()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $my_cancel_orders = Order::where('user_id',$user->id)->where('status','Canceled')->get();
       
        return view('customer.cancel_orders', compact('my_cancel_orders'));

       

        
    }


}
