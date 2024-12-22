<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;




class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        return view('admin.order.edit', compact('order'));
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
        $request->validate([
            'status' => 'required'
        ]);

        Order::find($id)->update(['status' => $request->status]);
        return redirect('admin/order')->with('success', 'Order status successfully changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pending_orders()
    {
        $orders = Order::where('status','Pending')->with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.pending_orders', compact('orders'));
    }

    public function processing_orders()
    {
        $orders = Order::where('status','Processing')->with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.processing_orders', compact('orders'));
    }

    public function shipped_orders()
    {
        $orders = Order::where('status','Shipped')->with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.shipped_orders', compact('orders'));
    }

    public function delivered_orders()
    {
        $orders = Order::where('status','Delivered')->with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.delivered_orders', compact('orders'));
    }

    public function canceled_orders()
    {
        $orders = Order::where('status','Canceled')->with('orderDetails')->orderby('id', 'DESC')->get();
        return view('admin.order.canceled_orders', compact('orders'));
    }


}
