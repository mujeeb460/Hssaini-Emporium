<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


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


        $user_id = Auth::user()->id ?? 0;

        $carts = Cart::where('user_id', $user_id)->get();

        if (!$carts) {
            return redirect()->back()->with('success', 'Cart is empty!');
        }

        if($request->payment_method == 'stripe')
        {
            $data = $request->all();
            $carts = Cart::with('product')->where('user_id', $user_id)->get();
            return view('frontend.checkout_payment', compact('carts','data'));

        }else{

            $order = new Order;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->method = $request->payment_method;
            $order->user_id = $user_id;
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

            Cart::where('user_id', $user_id)->delete();

            return redirect('orderComplete')->with('success', 'Order Placed Successfully!')->with('orderID', $order->id);
            
            //return redirect('myorder')->with('success', 'Order Placed Successfully!');
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


     public function orderComplete()
    {
        $user_id = Auth::user()->id ?? 0;

        if($user_id)
        {
            $user = User::where('id',$user_id)->first();
        }
        else
        {
            $userArray = [
                "id" => '0',
                "first_name" => "Customer",
                "last_name" => null,
                "email" => "Customer@gmail.com",
                "mobile" => "-",
                "address" => "-",
                "email_verified_at" => null,
                "two_factor_confirmed_at" => null,
                "current_team_id" => null,
                "profile_photo_path" => null,
                "provider" => null,
                "provider_id" => null,
                "created_at" => "2024-12-14T22:18:29.000000Z",
                "updated_at" => "2024-12-14T22:18:29.000000Z",
                "facebook_id" => null,
                "google_id" => null
            ];
            
            // Convert to object
            $user = (object) $userArray;
        }

        if (!$user) {
            return redirect()->route('login');
        }
       
        return view('frontend.order_complete',compact('user'));

       
    }


    public function cart_add(Request $request)
    {

        $user_id = auth()->id() ?? 0;
        $product_id = $request->product_id;
        $qty = $request->qty;
        $size = $request->size;
        $color = $request->color;

        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found.']);
        }

        if ($qty > $product->stock) {
            return response()->json(['status' => 'error', 'message' => 'Quantity exceeds stock available.']);
        }

        $cart = Cart::where('product_id', $product_id)
                    ->where('user_id', $user_id)
                    ->firstOrNew();

        $cart->qty = $qty;
        $cart->size = $size;
        $cart->color = $color;
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->save();

        // Count total cart items for the user
        $cartCount = Cart::where('user_id', $user_id)->count();
        $totalPrice = Cart::where('user_id', $user_id)
                ->with('product')
                ->get()
                ->sum(function ($item) {
                    return $item->product->price * $item->qty;
                });

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart!',
            'cart_count' => $cartCount,
            'total_price' => $totalPrice
        ]);
    }




}
