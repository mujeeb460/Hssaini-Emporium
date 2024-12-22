<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();
        return view('frontend.cart', compact('carts'));
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
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required',
        ]);

        // Find the cart record with the given product_id and user_id
        $cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::user()->id)
            ->firstOrNew();

        $cart->qty = $cart->exists ? $cart->qty + $request->qty : $request->qty;
        $cart->product_id = $request->product_id;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return redirect()->back()->with('success', 'Product successfully added into cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($request->id);
        $cart->qty = $request->qty;
        $cart->update();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = str_replace('delete', '', $id);
        Cart::find($id)->delete();
        return true;
    }

    public function addCart($id,$title)
    {
        return Redirect()->route('product', [$id , $title]);
    }


    
}
